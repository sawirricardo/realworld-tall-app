<div>
    <div class="profile-page">

        <div class="user-info">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-md-10 offset-md-1">
                        <img src="{{ $user['image'] }}" class="user-img" />
                        <h4>{{ $user['name'] }}</h4>
                        <p>
                            {{ $user['bio'] }}
                        </p>
                        @guest
                        <a href="{{ route('app.login') }}" class="btn btn-sm btn-outline-secondary action-btn">
                            <i class="ion-plus-round"></i>
                            &nbsp;
                            Follow {{ $user['name'] }}
                        </a>
                        @endguest

                        @auth
                        @if (auth()->id() !== $user['id'])
                        <button class="btn btn-sm btn-outline-secondary action-btn">
                            <i class="ion-plus-round"></i>
                            &nbsp;
                            Follow {{ $user['name'] }}
                        </button>
                        @endif
                        @endauth
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-md-10 offset-md-1">
                    <div class="articles-toggle">
                        <ul class="nav nav-pills outline-active">
                            <li class="nav-item">
                                <a class="nav-link active" href="">My Articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Favorited Articles</a>
                            </li>
                        </ul>
                    </div>

                    @forelse ($articles as $article)
                    <div class="article-preview">
                        <div class="article-meta">
                            <a href="{{ route('front.user.show',['user'=>$article->author->username]) }}"><img
                                    src="{{ $article->author->image }}" /></a>
                            <div class="info">
                                <a href="{{ route('front.user.show',['user'=>$article->author->username]) }}"
                                    class="author">{{ $article->author->name }}</a>
                                <span class="date">{{ $article->created_at }}</span>
                            </div>

                            @guest
                            <a href="{{ route('app.login') }}" class="btn btn-outline-primary btn-sm pull-xs-right">
                                <i class="ion-heart"></i> {{ $article->favoritersCountReadable() }}
                            </a>
                            @endguest

                            @auth
                            @if (auth()->id() !== $article->author->id)
                            <button class="btn btn-outline-primary btn-sm pull-xs-right">
                                <i class="ion-heart"></i> {{ $article->favoritersCountReadable() }}
                            </button>
                            @endif
                            @endauth
                        </div>
                        <a href="{{ route('front.article.show',['article'=>$article->slug]) }}" class="preview-link">
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->description }}</p>
                            <span>Read more...</span>
                        </a>
                    </div>
                    @empty

                    @endforelse
                    {{-- <div class="article-preview">
                        <div class="article-meta">
                            <a href=""><img src="http://i.imgur.com/N4VcUeJ.jpg" /></a>
                            <div class="info">
                                <a href="" class="author">Albert Pai</a>
                                <span class="date">January 20th</span>
                            </div>
                            <button class="btn btn-outline-primary btn-sm pull-xs-right">
                                <i class="ion-heart"></i> 32
                            </button>
                        </div>
                        <a href="" class="preview-link">
                            <h1>The song you won't ever stop singing. No matter how hard you try.</h1>
                            <p>This is the description for the post.</p>
                            <span>Read more...</span>
                            <ul class="tag-list">
                                <li class="tag-default tag-pill tag-outline">Music</li>
                                <li class="tag-default tag-pill tag-outline">Song</li>
                            </ul>
                        </a>
                    </div> --}}


                </div>

            </div>
        </div>

    </div>
</div>
