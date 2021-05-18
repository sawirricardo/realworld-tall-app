<?php

namespace App\Http\Livewire\Front\Tag;

use Livewire\Component;

class Show extends Component
{
    public \App\Models\Tag $tag;

    public function mount(\App\Models\Tag $tag)
    {
        $tag->load(['articles']);
        $this->tag = $tag;
    }

    public function render()
    {
        return view('livewire.front.tag.show');
    }
}
