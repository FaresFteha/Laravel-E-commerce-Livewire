<?php

namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\category;
use App\RepositoryInterface\categoryIntrface;

class categoryRepository implements categoryIntrface
{
    use AttachFilesTrait;

    public function index()
    {
        return  view('pages.backend.category.index');
    }
    public function create()
    {
       
        return  view('pages.backend.category.create');
    }
    public function store($request)
    {
        $validateData = $request->validated();
        $category = new category();
        $category->name = $validateData['name'];
        $category->slug = $validateData['slug'];
        $category->description = $validateData['description'];

        $category->meta_title = $validateData['meta_title'];
        $category->meta_keywoed = $validateData['meta_keywoed'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';

        // Check if a file was uploaded with the form and update the `photo` property of the Client model accordingly 
        if ($request->hasFile('photo')) {
            //$this->deleteFile($category->photo); // Delete any previously uploaded photo
            $photo = $request->file('photo')->getClientOriginalName();
            $category->photo = $photo;
            $this->uploadFile($request, 'photo', 'Category-Attachments'); // Upload the latest photo to the server
        }

        $category->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('pages.backend.category.edit', compact('category'));
    }
    public function update($request)
    {

        $category = category::findorFail($request->id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;

        $category->meta_title = $request->meta_title;
        $category->meta_keywoed = $request->meta_keywoed;
        $category->meta_description = $request->meta_description;
        $category->status = $request->status == true ? '1' : '0';

        // Check if a file was uploaded with the form and update the `photo` property of the Client model accordingly 
        if ($request->hasFile('photo')) {
            $this->deleteFile($category->photo, 'Category-Attachments'); // Delete any previously uploaded photo
            $photo = $request->file('photo')->getClientOriginalName();
            $category->photo = $photo;
            $this->uploadFile($request, 'photo', 'Category-Attachments'); // Upload the latest photo to the server
        }

        $category->save();
        toastr()->success('Data has been Updated successfully!');
        return redirect()->route('category.index');
    }

    public function delete($request)
    {
    }
}
