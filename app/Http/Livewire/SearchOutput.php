<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Output;

class SearchOutput extends Component
{
    public function getOutputs()
    {
        return Output::all();
    }

    public function render()
    {
        return view('livewire.search-output');
    }


}
