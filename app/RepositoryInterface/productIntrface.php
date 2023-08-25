<?php

namespace App\RepositoryInterface;

interface productIntrface
{
    public function index();
    public function create();
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($product_id , $request);
    public function deleteImageProduct($id);
    public function destroy($id);
    public function updateProductColorQuantity($request , $prod_color_id);
    public function deleteProductColorQuantity( $prod_color_id);

}
