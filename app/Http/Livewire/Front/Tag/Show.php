<?php

namespace App\Http\Livewire\Front\Tag;

use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class Show extends Component
{
    public \App\Models\Tag $tag;

    public function mount(\App\Models\Tag $tag)
    {
        $tag->load(['articles']);
        $this->tag = $tag;

        SEOTools::setTitle("{$tag->name} | Conduit X Ricardo Sawir", false);
        SEOTools::setDescription($tag->name);
    }

    public function render()
    {
        return view('livewire.front.tag.show', [
            'tags' => \App\Models\Tag::all()
        ]);
    }
}
