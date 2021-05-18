<?php

namespace App\Http\Livewire\App\Article;

use Livewire\Component;

class Create extends Component
{
    public \App\Models\Article $article;

    public function mount()
    {
        $this->article = new \App\Models\Article();
    }

    protected $rules = [
        'title' => ['required', 'string'],
        'body' => ['required', 'string'],
        'description' => ['string'],
    ];

    public function render()
    {
        return view('livewire.app.article.create');
    }

    public function saveArticle()
    {
        $this->validate();

        $this->article->save();

        return redirect()->route('app.article.edit', ['article' => $this->article->id]);
    }
}
