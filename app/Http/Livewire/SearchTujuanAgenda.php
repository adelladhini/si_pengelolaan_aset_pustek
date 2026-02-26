<?php

namespace App\Http\Livewire;

use App\Models\TujuanAgenda;
use Livewire\Component;

class SearchTujuanAgenda extends Component
{
    public function getTujuanAgendas()
    {
        return TujuanAgenda::all();
    }
    public function render()
    {
        return view('livewire.search-tujuan-agenda');
    }
}
