<?php

namespace App\Http\Livewire\Front;

use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class Index extends Component
{
    public $viewingPrivateFeed = false;

    public function updatedViewingPrivateFeed()
    {
    }

    public function mount()
    {
        SEOTools::setTitle('Conduit X Ricardo Sawir', false);
        SEOTools::setDescription('Real world application, implemented in Laravel Livewire by Ricardo Sawir.');
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
