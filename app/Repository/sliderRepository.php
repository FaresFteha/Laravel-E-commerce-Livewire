<?php

namespace App\Repository;

use App\Http\Traits\AttachFilesTrait;
use App\Models\category;
use App\Models\Slider;
use App\RepositoryInterface\slederIntrface;

class sliderRepository implements slederIntrface
{
    use AttachFilesTrait;

    public function index()
    {
        $sliders = Slider::all();
        return  view('pages.backend.slider.index', compact('sliders'));
    }
    public function create()
    {
        return  view('pages.backend.slider.create');
    }
    public function store($request)
    {
        $validateData = $request->validated();
        $Slider = new Slider();
        $Slider->title = $validateData['title'];
        $Slider->description = $validateData['description'];

        $Slider->status = $request->status == true ? '1' : '0';

        // Check if a file was uploaded with the form and update the `photo` property of the Client model accordingly 
        if ($request->hasFile('photo')) {
            //$this->deleteFile($Slider->photo); // Delete any previously uploaded photo
            $photo = $request->file('photo')->getClientOriginalName();
            $Slider->image = $photo;
            $this->uploadFile($request, 'photo', 'Slider-Attachments'); // Upload the latest photo to the server
        }

        $Slider->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('slider.index');
    }

    public function edit($id)
    {
        $Slider = Slider::findOrFail($id);
        return view('pages.backend.slider.edit', compact('Slider'));
    }
    public function update($request, $id)
    {

        $validateData = $request->validated();
        $Slider = Slider::findOrFail($id);
        $Slider->title = $validateData['title'];
        $Slider->description = $validateData['description'];

        $Slider->status = $request->status == true ? '1' : '0';

        // Check if a file was uploaded with the form and update the `photo` property of the Client model accordingly 
        if ($request->hasFile('photo')) {
            $this->deleteFile($Slider->image , 'Slider-Attachments'); // Delete any previously uploaded photo
            $photo = $request->file('photo')->getClientOriginalName();
            $Slider->image = $photo;
            $this->uploadFile($request, 'photo', 'Slider-Attachments'); // Upload the latest photo to the server
        }

        $Slider->save();
        toastr()->success('Data has been Updated successfully!');
        return redirect()->route('slider.index');
    }

    public function destroy($request)
    {
        $this->deleteFile($request->image , 'Slider-Attachments');
        Slider::destroy($request->id);
        toastr()->success('Data has been Deleted with Image successfully! ');
        return redirect()->route('slider.index');
    }
}
