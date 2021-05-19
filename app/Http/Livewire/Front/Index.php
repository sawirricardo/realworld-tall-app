<?php

namespace App\Http\Livewire\Front;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Index extends Component
{
    public $viewingPrivateFeed = false;

    public function mount()
    {
        SEOTools::setTitle('Conduit X Ricardo Sawir', false);
        SEOTools::setDescription('Real world application, implemented in Laravel Livewire by Ricardo Sawir.');
    }

    public function render()
    {
        return view('livewire.front.index', [
            'articles' => \App\Models\Article::with(['author'])
                ->when($this->viewingPrivateFeed, function (Builder $query) {
                    $user = User::find(auth()->id());

                    $followings = $user->followings()->get();

                    return $query->whereIn('id', $followings->map(function (\App\Models\User $user) {
                        return $user->id;
                    }));
                })
                ->orderBy('created_at', 'DESC')
                ->get(),

            'tags' => \App\Models\Tag::all()
        ]);
    }
}
