<?php

namespace App\Http\Livewire\Front;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Index extends Component
{
    public $viewingPrivateFeed = false;
    public $articles;

    public function mount()
    {
        SEOTools::setTitle('Conduit X Ricardo Sawir', false);
        SEOTools::setDescription('Real world application, implemented in Laravel Livewire by Ricardo Sawir.');

        $this->articles = \App\Models\Article::with(['author'])->orderBy('created_at', 'DESC')
            ->get();
    }

    public function updatedViewingPrivateFeed()
    {
        if ($this->viewingPrivateFeed) {
            $user = \App\Models\User::find(auth()->id());

            $followings = $user->followings()->get();

            $this->articles = \App\Models\Article::with(['author'])->whereIn('user_id', $followings->map(function (\App\Models\User $user) {
                return $user->id;
            }))->get();
        }

        if (!$this->viewingPrivateFeed) {
            $this->articles = \App\Models\Article::with(['author'])->orderBy('created_at', 'DESC')->get();
        }
    }

    public function render()
    {
        return view('livewire.front.index', [
            'tags' => \App\Models\Tag::all()
        ]);
    }
}
