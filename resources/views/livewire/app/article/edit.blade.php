<div>
    <div>
        <div class="editor-page">
            <div class="container page">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-xs-12">
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
                            <fieldset class="form-group">
                                <input type="text" class="form-control" placeholder="Enter tags">
                                <div class="tag-list"></div>
                            </fieldset>

                            <button class="btn btn-lg pull-xs-right btn-primary" type="button" wire:click='saveArticle'>
                                Save Article
                            </button>

                            <button class="btn btn-lg pull-xs-right btn-danger" type="button"
                                wire:click='deleteArticle'>
                                Delete Article
                            </button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
