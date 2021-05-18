<?php

namespace App\Http\Livewire\Front\User;

use Livewire\Component;

class Show extends Component
{
    public $user;
    public $articles;

    public function mount(\App\Models\User $user)
    {
        $user->load(['articles']);
        $this->articles = $user->articles;
        $this->user = $user->toArray();
    }

    public function render()
    {
        return view('livewire.front.user.show');
    }
}
