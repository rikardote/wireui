<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DemoComponent extends Component
{
    public $empleado_id;
    public $date;


    public function render()
    {
        return view('livewire.demo-component');
    }
    public function save(){
        dd($this->date);
    }
}
