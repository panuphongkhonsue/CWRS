<?php

namespace App\Http\Livewire;

use App\Models\Welfare;
use Livewire\Component;
use Livewire\WithPagination;

class ShowWelfare extends Component
{
    use WithPagination;
    public $type = 999;

    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        if ($this->type != 999) {
            return view('livewire.show-welfare', ['welfares' => Welfare::where('type', $this->type)->paginate(10)]);
        }

        return view('livewire.show-welfare', ['welfares' => Welfare::paginate(10)]);
    }

    public function reload($type)
    {
        $this->type = $type;
    } 
}
