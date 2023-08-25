<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Mail\PlaceOrderMailable;
use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Checkout extends Component
{
    public $carts, $totalProductAmount = 0;


    public $fullname, $email, $phone, $pincode, $address,
        $payment_mode = null, $payment_id = null;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value)
    {
        $this->payment_id = $value;
        $this->payment_mode = 'Paid by Paypal';
        $codOrder = $this->placeOrder();
        if ($codOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            try {
                //code...
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                return redirect()->back();
            } catch (\Exception $e) {
                //throw $th;
                toastr()->error($e->getMessage());
            }
            
            session()->flash('message', 'Order online Successfuly.');

            toastr()->success('Order Palced (Cash on Delivery) successfuly!');
            return redirect()->to('thank-you');
        } else {
            toastr()->error('Something Went Wrong!');
        }
    }

    public function validationForAll()
    {
        $this->validate();
    }

    protected function rules()
    {
        return [
            'fullname' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function restData()
    {
        $this->fullname = null;
        $this->email = null;
        $this->phone = null;
        $this->pincode = null;
        $this->address = null;
    }

    public function placeOrder()
    {
        $this->validate();

        $Order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'tech-' . Str::random(10),
            'fullname' =>  $this->fullname,
            'email' =>  $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' =>  $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);
        foreach ($this->carts as $cartItem) {
            $OrderItem = OrderItem::create([

                'order_id' => $Order->id,
                'product_id'  => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' =>  $cartItem->product->selling_price,
            ]);
            if ($cartItem->product_color_id != null) {
                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            } else {
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }
        
        return $Order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();

            try {
                //code...
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                return redirect()->back();
            } catch (\Exception $e) {
                //throw $th;
                toastr()->error($e->getMessage());
            }
            session()->flash('message', 'Order Placed Successfuly.');

            toastr()->success('Order Palced (Cash on Delivery) successfuly!');
            return redirect()->to('thank-you');
        } else {
            toastr()->error('Something Went Wrong!');
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount +=  $cartItem->product->selling_price * $cartItem->quantity + 30;
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->fullname = Auth::user()->name;
        $this->phone = Auth::user()->userDetail->phone;
        $this->email = Auth::user()->email;
        $this->pincode = Auth::user()->userDetail->pincode;
        $this->address = Auth::user()->userDetail->address;

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.cart.checkout', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
