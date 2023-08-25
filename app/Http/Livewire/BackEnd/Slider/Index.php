<?php

namespace App\Http\Livewire\BackEnd\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.back-end.slider.index' , ['sliders' => $sliders]);
    }
}
