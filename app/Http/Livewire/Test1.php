<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test1 extends Component
{
    public $name = 'John Doe';
    public function render()
    {
        return view('livewire.test1');
    }
}
