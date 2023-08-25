<?php

namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\category;
use App\Models\Color;
use App\RepositoryInterface\colorIntrface;

class colorRepository implements colorIntrface
{
    use AttachFilesTrait;

    public function index()
    {
        $colors = Color::all();
        return  view('pages.backend.color.index', compact('colors'));
    }

    public function store($request)
    {
        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->status = $request->status == true ? '1' : '0';
        $color->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('color.index');
    }


    public function update($request , $id)
    {

     
        $color =  Color::findOrFail($id);
        $color->name = $request->name;
        $color->code = $request->code;
        $color->status = $request->status == true ? '1' : '0';
        $color->save();
        toastr()->success('Data has been Updated successfully!');
        return redirect()->route('color.index');
    }

    public function destroy($id)
    {
        Color::destroy($id);
        toastr()->success('Data has been Deleted successfully!');
        return redirect()->route('color.index');
    }
}
