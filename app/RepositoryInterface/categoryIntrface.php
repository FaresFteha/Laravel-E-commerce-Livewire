<?php

namespace App\RepositoryInterface;

interface categoryIntrface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request);
}
