<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\ProductImage;
use App\RepositoryInterface\productIntrface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(productIntrface $product)
    {
        $this->product = $product;
    }
    public function index()
    {
        //
        return $this->product->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->product->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        return $this->product->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->product->show($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return $this->product->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $product_id)
    {
        return $this->product->update($request,  $product_id);
    }

    public function deleteImageProduct($id)
    {
        return $this->product->deleteImageProduct($id);
    }
    public function destroy($id)
    {
        //
        return $this->product->destroy($id);
    }

    public function updateProductColorQuantity(Request $request, $prod_color_id)
    {
        //
        return $this->product->updateProductColorQuantity($request, $prod_color_id);
    }
    
    public function deleteProductColorQuantity($prod_color_id)
    {
        return $this->product->deleteProductColorQuantity($prod_color_id);
    }
}
