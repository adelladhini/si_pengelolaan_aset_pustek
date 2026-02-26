<?php

namespace App\Http\Livewire;

use App\Models\WebsiteMenu;
use Livewire\Component;

class SearchWebsiteMenu extends Component
{
    public function getWebsiteMenus()
    {
        return WebsiteMenu::where('status', 1)->with('menu')->get();;
    }

    public function render()
    {
        return view('livewire.search-website-menu');
    }

  
}
