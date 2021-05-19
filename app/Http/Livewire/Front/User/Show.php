<?php

namespace App\Http\Livewire\Front\User;

use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class Show extends Component
{
    public $user;
    public $articles;
    public $loggedInUser;
    public $viewingFavoriteArticles = false;

    public function updatedViewingFavoriteArticles()
    {
        if ($this->viewingFavoriteArticles) {
            $this->articles = $this->user->favorites(\App\Models\Article::class)->with(['author'])->get();
        }

        if (!$this->viewingFavoriteArticles) {
            $this->articles = \App\Models\Article::where('user_id', '=', $this->user->id)->with(['author'])->get();
        }
    }

    public function mount(\App\Models\User $user)
    {
        $this->articles = \App\Models\Article::where('user_id', '=', $this->user->id)->with(['author'])->get();
        $this->user = $user;
        $this->loggedInUser = \App\Models\User::find(auth()->id());

        SEOTools::setTitle($this->user['name'], false);
        SEOTools::setDescription($this->user['bio']);
    }

    public function render()
    {
        return view('livewire.front.user.show');
    }

    public function followUser()
    {
        $this->loggedInUser = \App\Models\User::find(auth()->id());

        $this->loggedInUser->toggleFollow($this->user);

        $this->user = \App\Models\User::find($this->user->id);
    }
}
