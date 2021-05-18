<div>
    <div class="article-page">

        <div class="banner">
            <div class="container">

                <h1>{{ $article->title }}</h1>

                <div class="article-meta">
                    <a href="{{ route('front.user.show',['user' => $article->author->username]) }}"><img
                            src="{{ $article->author->image }}" /></a>
                    <div class="info">
                        <a href="{{ route('front.user.show',['user' => $article->author->username]) }}"
                            class="author">{{ $article->author->name }}</a>
                        <span class="date">{{ $article->created_at }}</span>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="ion-plus-round"></i>
                        &nbsp;
                        Follow {{ $article->author->name }} <span
                            class="counter">({{ $article->author->followersCountReadable() }})</span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="ion-heart"></i>
                        &nbsp;
                        Favorite Post <span class="counter">({{ $article->favoritersCountReadable() }})</span>
                    </button>
                </div>

            </div>
        </div>

        <div class="container page">

            <div class="row article-content">
                <div class="col-md-12">
                    <p>
                        {{ $article->description }}
                    </p>
                    <h2 id="introducing-ionic">{{ $article->title }}</h2>
                    <p>{{ $article->body }}</p>
                </div>
            </div>

            <hr />

            <div class="article-actions">
                <div class="article-meta">
                    <a href="{{ route('front.user.show',['user' => $article->author->username]) }}"><img
                            src="{{ $article->author->image }}" /></a>
                    <div class="info">
                        <a href="{{ route('front.user.show',['user' => $article->author->username]) }}"
                            class="author">{{ $article->author->name }}</a>
                        <span class="date">{{ $article->created_at }}</span>
                    </div>

                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="ion-plus-round"></i>
                        &nbsp;
                        Follow {{ $article->author->name }} <span
                            class="counter">({{ $article->author->followersCountReadable() }})</span>
                    </button>
                    &nbsp;
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="ion-heart"></i>
                        &nbsp;
                        Favorite Post <span class="counter">({{ $article->favoritersCountReadable() }})</span>
                    </button>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 col-md-8 offset-md-2">

                    <form class="card comment-form">
                        <div class="card-block">
                            <textarea class="form-control" placeholder="Write a comment..." rows="3"></textarea>
                        </div>
                        <div class="card-footer">
                            <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
                            <button class="btn btn-sm btn-primary">
                                Post Comment
                            </button>
                        </div>
                    </form>

                    @forelse ($article->comments as $comment)
                    <div class="card">
                        <div class="card-block">
                            <p class="card-text">{{ $comment->body }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="" class="comment-author">
                                <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
                            </a>
                            &nbsp;
                            <a href="" class="comment-author">Jacob Schmidt</a>
                            <span class="date-posted">Dec 29th</span>
                        </div>
                    </div>
                    @empty

                    @endforelse

                    <div class="card">
                        <div class="card-block">
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="" class="comment-author">
                                <img src="http://i.imgur.com/Qr71crq.jpg" class="comment-author-img" />
                            </a>
                            &nbsp;
                            <a href="" class="comment-author">Jacob Schmidt</a>
                            <span class="date-posted">Dec 29th</span>
                            <span class="mod-options">
                                <i class="ion-edit"></i>
                                <i class="ion-trash-a"></i>
                            </span>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
