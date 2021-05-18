<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Index extends Component
{
    public $viewingPrivateFeed = false;

    public function updatedViewingPrivateFeed()
    {
    }

    public function render()
    {
        return view('livewire.front.index', [
            'articles' => \App\Models\Article::with(['author'])
                ->get(),
            'tags' => \App\Models\Tag::all()
        ]);
    }
}
