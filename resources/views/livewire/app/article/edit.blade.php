<div>
    <div>
        <div class="editor-page">
            <div class="container page">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-xs-12">
                        @if (session()->has('flash.banner'))
                        <div class="alert alert-success">
                            {{ session('flash.banner') }}
                        </div>
                        @endif
                        <form>
                            <fieldset class="form-group">
                                <input wire:model='article.title' type="text" class="form-control form-control-lg"
                                    placeholder="Article Title">
                            </fieldset>
                            <fieldset class="form-group">
                                <input wire:model='article.description' type="text" class="form-control"
                                    placeholder="What's this article about?">
                            </fieldset>
                            <fieldset class="form-group">
                                <textarea wire:model='article.body' class="form-control" rows="8"
                                    placeholder="Write your article (in markdown)"></textarea>
                            </fieldset>
                            <div class="row">
                                @forelse ($tags as $tag)
                                <div wire:key='{{ $tag->id }}' class="col-xs-4 col-md-2">
                                    <fieldset class="form-group">
                                        <label for="tag_{{ $tag->slug }}">
                                            <input id="tag_{{ $tag->slug }}" class="form-checkbox" type="checkbox"
                                                name="tag" value="{{ $tag->id }}" wire:model='article_tags' />
                                            {{ $tag->name }}
                                        </label>
                                    </fieldset>
                                </div>
                                @empty

                                @endforelse
                            </div>
                            <fieldset class="form-group">
                                @if (session()->has('message-tag'))
                                <div class="alert alert-success">
                                    {{ session('message-tag') }}
                                </div>
                                @endif
                                <input type="text" class="form-control" placeholder="Enter new tags" wire:model='tag'>
                                <button type="button" wire:click="createTag">Create Tag</button>
                            </fieldset>
                            {{-- <fieldset class="form-group">
                                <input type="text" class="form-control" placeholder="Enter new tags">
                                <div class="tag-list">
                                    @forelse ($tags as $tag)
                                    <div>{{ $tag->name }}
                    </div>
                    @empty

                    @endforelse
                </div>
                </fieldset> --}}

                <button class="btn btn-lg pull-xs-right btn-primary" type="button" wire:click='saveArticle'>
                    Save Article
                </button>

                <button class="btn btn-lg pull-xs-right btn-danger" type="button" wire:click='deleteArticle'>
                    Delete Article
                </button>

                <a class="btn btn-lg pull-xs-right btn-secondary"
                    href="{{ route('front.article.show',['article'=>$article->slug]) }}">
                    View Article
                </a>

                </form>
            </div>

        </div>
    </div>
</div>
</div>
</div>
