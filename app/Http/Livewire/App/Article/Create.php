<?php

namespace App\Http\Livewire\App\Article;

use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public \App\Models\Article $article;
    public $tag;
    public $article_tags = [];

    public function mount()
    {
        $this->article = new \App\Models\Article();

        SEOTools::setTitle('Create new article', false);
        SEOTools::setDescription('New article created here.');
    }

    protected $rules = [
        'article.title' => ['required', 'string'],
        'article.body' => ['required', 'string'],
        'article.description' => ['string'],
    ];

    public function render()
    {
        return view('livewire.app.article.create', [
            'tags' => \App\Models\Tag::all()
        ]);
    }

    public function saveArticle()
    {
        $this->validate();

        $this->article->user_id = auth()->id();

        $this->article->save();

        $this->article->tags()->sync($this->article_tags);

        session()->flash('flash.banner', 'Your article has been published!');

        return redirect()->route('app.article.edit', ['article' => $this->article->id]);
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
