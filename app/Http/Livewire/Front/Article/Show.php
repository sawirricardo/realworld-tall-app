<?php

namespace App\Http\Livewire\Front\Article;

use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class Show extends Component
{
    public $article;
    public $user;
    public $comment = '';

    protected $rules = [
        'comment' => ['required', 'string']
    ];

    public function mount(\App\Models\Article $article)
    {
        $article->load(['author', 'comments']);

        $this->article = $article;
        if (auth()->check()) {
            $this->user = \App\Models\User::find(auth()->user()->getAuthIdentifier())->toArray();
        }

        SEOTools::setTitle("{$article->title} | Conduit X Ricardo Sawir", false);
        SEOTools::setDescription($article->description);
    }

    public function render()
    {
        return view('livewire.front.article.show');
    }

    public function saveComment()
    {
        $this->validate();

        $commenter = \App\Models\User::find(auth()->user()->getAuthIdentifier());

        $comment = new \App\Models\Comment();
        $comment->article_id = $this->article->id;
        $comment->user_id = $commenter->id;
        $comment->body = $this->comment;
        $comment->save();

        $this->article = \App\Models\Article::find($this->article->id);
        $this->comment = '';
    }
}
