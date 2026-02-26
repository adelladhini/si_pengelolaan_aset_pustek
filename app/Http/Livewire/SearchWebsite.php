<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Website;

class SearchWebsite extends Component
{
    public function getWebsites()
    {
        return Website::all();
    }

    public function render()
    {
        return view('livewire.search-website');
    }

  
}
