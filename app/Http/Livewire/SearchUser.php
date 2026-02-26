<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SearchUser extends Component
{
    public function getUsers()
    {
        return User::all();
    }

    public function render()
    {
        return view('livewire.search-user');
    }


}
