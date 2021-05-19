<?php

namespace App\Http\Livewire\App\Article;

use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{
    public \App\Models\Article $article;
    public $tag;
    public $article_tags = [];

    public function mount(\App\Models\Article $article)
    {
        $this->article = $article;
        $this->article_tags = $article->tags->map(function ($tag) {
            return $tag->id;
        });
    }

    protected $rules = [
        'article.title' => ['required', 'string'],
        'article.body' => ['required', 'string'],
        'article.description' => ['string'],
    ];

    public function render()
    {
        return view('livewire.app.article.edit', [
            'tags' => \App\Models\Tag::all()
        ]);
    }

    public function saveArticle()
    {
        $this->validate();

        $this->article->save();

        $this->article->tags()->sync($this->article_tags);

        session()->flash('flash.banner', 'Your article has been saved!');

        return redirect()->route('app.article.edit', ['article' => $this->article->id]);
    }

    public function deleteArticle()
    {
        $this->article->delete();

        return redirect()->route('front.index');
    }

    public function createTag()
    {
        $slug = Str::slug($this->tag);
        $tag = \App\Models\Tag::where('slug', '=', $slug)->first();
        if ($tag) {
            session()->flash('message-tag', 'Tag has existed.');
            return;
        }

        $this->validate(['tag' => ['required']]);

        if (!empty($this->tag)) {
            \App\Models\Tag::create(['name' => $this->tag]);

            $this->reset('tag');

            session()->flash('message-tag', 'Tag has been created');
        }
    }
}
