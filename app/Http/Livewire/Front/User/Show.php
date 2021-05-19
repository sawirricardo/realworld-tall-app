<?php

namespace App\Http\Livewire\Front\User;

use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class Show extends Component
{
    public $user;
    public $articles;
    public $loggedInUser;

    public function mount(\App\Models\User $user)
    {
        $user->load(['articles']);
        $this->articles = $user->articles;
        $this->user = $user;
        $this->loggedInUser = \App\Models\User::find(auth()->id());

        SEOTools::setTitle($this->user['name'], false);
        SEOTools::setDescription($this->user['bio']);
    }

    public function render()
    {
        return view('livewire.front.user.show');
    }

    public function followAuthor()
    {
        $user = \App\Models\User::find(auth()->id());

        $user->toggleFollow($this->article->author);

        $this->article = \App\Models\Article::find($this->article->id);
    }
}
