<?php

namespace App\Http\Livewire\BackEnd\Color;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $colors = Color::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.back-end.color.index', ['colors' => $colors]);
    }
}
