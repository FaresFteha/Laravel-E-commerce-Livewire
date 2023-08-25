<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //
    public function index(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($q) use ($request) {
            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todayDate) {
            return $q->whereDate('created_at', $todayDate);
        })
            ->when($request->status != null, function ($q) use ($request) {
                return $q->where('status_message', $request->status);
            })
            ->paginate(10);
        return view('pages.backend.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        if ($order) {
            return view('pages.backend.order.show', compact('order'));
        } else {
            toastr()->error('Something Went Wrong!');
        }
    }

    public function updateStatus(Request $request, int $OrderId)
    {
        $order = Order::findOrFail($OrderId);
        if ($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            toastr()->success('Updated Status Success');
            return redirect()->back();
        } else {
            toastr()->error('Something Went Wrong!');
        }
    }

    public function download(int $OrderId)
    {
        $order = Order::findOrFail($OrderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('pages.backend.order.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('Y-m-d');
        return $pdf->download('invoice-' . $order->id . '-' . $todayDate . '.pdf');
    }
    public function invocicePdf(int $OrderId)
    {
        $order = Order::findOrFail($OrderId);
        return view('pages.backend.order.invoice.generate-invoice', compact('order'));
    }

    public function invociceMail(int $OrderId)
    {
        try {
            //code...
            $order = Order::findOrFail($OrderId);
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            toastr()->success('Invoice Mail has been sent to' . $order->email);
            return redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            toastr()->error($e->getMessage());
        }
    }
}
