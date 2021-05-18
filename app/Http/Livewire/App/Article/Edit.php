<?php

namespace App\Http\Livewire\App\Article;

use Livewire\Component;

class Edit extends Component
{
    public \App\Models\Article $article;

    public function mount(\App\Models\Article $article)
    {
        $this->article = $article;
    }

    protected $rules = [
        'article.title' => ['required', 'string'],
        'article.body' => ['required', 'string'],
        'article.description' => ['string'],
    ];

    public function render()
    {
        return view('livewire.app.article.edit');
    }

    public function saveArticle()
    {
        $this->validate();

        $this->article->save();

        return redirect()->route('app.article.edit', ['article' => $this->article->id]);
    }

    public function deleteArticle()
    {
        $this->article->delete();

        return redirect()->route('front.index');
    }
}
