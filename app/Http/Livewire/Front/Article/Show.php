<?php

namespace App\Http\Livewire\Front\Article;

use Livewire\Component;

class Show extends Component
{
    public $article;

    public function mount(\App\Models\Article $article)
    {
        $article->load(['author', 'comments']);

        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.front.article.show');
    }
}
