<?php

namespace App\RepositoryInterface;

interface colorIntrface
{
    public function index();
    public function store($request);
    public function update($request, $id);
    public function destroy($id);
}
