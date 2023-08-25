<?php

namespace App\Http\Livewire\BackEnd\Brand;

use App\Models\brand;
use App\Models\category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status , $category_id;

    public $brand_id;
    protected function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
            'category_id' => 'required',
            
        ];
    }

    public function restData()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->category_id = null;
    }
    public function store()
    {
        $this->validate();

        brand::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'category_id' => $this->category_id,
            'status' =>  $this->status == true ? '1' : '0',
        ]);
        toastr()->success('Data has been saved successfully!');
        $this->dispatchBrowserEvent('close-modal');
        $this->restData();
    }
    public function closeModal()
    {
        $this->restData();
    }

    public function openModal()
    {
        $this->restData();
    }

    public function editbrand($brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->category_id= $brand->category_id;
        $this->status = $brand->status;
    }

    public function update()
    {
        $this->validate();

        brand::findorfail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'category_id' => $this->category_id,
            'status' =>  $this->status == true ? '1' : '0',
        ]);

        toastr()->success('Data has been updated successfully!');
        $this->dispatchBrowserEvent('close-modal');
        $this->restData();
    }

    public function removID($brand_id)
    {

        $this->brand_id = $brand_id;
    }

    public function destory()
    {
        brand::findorfail($this->brand_id)->delete();
        toastr()->success('Data has been deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $categories = category::where('status', '1')->get();
        $brands = brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.back-end.brand.index', ['brands' => $brands, 'categories' => $categories])
            ->extends('layouts.backend.master')
            ->section('contnet');
    }
}
