<?php

namespace App\Http\Livewire\Front\User;

use Artesaos\SEOTools\Facades\SEOTools;
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

        SEOTools::setTitle($this->user['name'], false);
        SEOTools::setDescription($this->user['bio']);
    }

    public function render()
    {
        return view('livewire.front.user.show');
    }
}
