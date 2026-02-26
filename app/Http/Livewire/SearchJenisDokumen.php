<?php

namespace App\Http\Livewire;

use App\Models\JenisDokumen;
use Livewire\Component;

class SearchJenisDokumen extends Component
{
    public function getJenisDokumens()
    {
        return JenisDokumen::all();
    }
    public function render()
    {
        return view('livewire.search-jenis-dokumen');
    }
}
