<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class SearchMenu extends Component
{
    public function getMenus()
    {
        return Menu::all();
    }

    public function render()
    {
        return view('livewire.search-menu');
    }

  
}
