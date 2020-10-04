<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateRecipe extends Component
{
    public $name;



    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'min:6',
        ]);
    }
}
