<?php

namespace App\Http\Livewire\BackEnd\Category;

use Livewire\Component;
use App\Models\category;
use Livewire\WithPagination;
use App\Http\Traits\AttachFilesTrait;

class Index extends Component
{
    use WithPagination, AttachFilesTrait;
    protected $paginationTheme = 'bootstrap';

    public $category_id;
    public $category_photo;

    //get if in click modal
    public function deleteCategory($category_id, $category_photo)
    {
        $this->category_id = $category_id;
        $this->category_photo = $category_photo;
    }

    public function destroy()
    {


        try {
            $this->deleteFile($this->category_photo, 'Category-Attachments');

            $category = category::find($this->category_id);

            if ($category) {
                $category->delete();
                //$this->dispatchBrowserEvent('close-modal');
                toastr()->success('Data has been Updated successfully!');
            } else {
                toastr()->success('Category not found, handle accordingly');
            }
        } catch (\Exception $e) {
            // Handle exceptions (e.g., log, display error message, etc.)
        }
    }

    public function render()
    {
        $categories = category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.back-end.category.index', ['categories' => $categories]);
    }
}
