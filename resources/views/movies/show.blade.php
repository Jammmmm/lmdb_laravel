@extends('layouts.app')

@section('title', __('app.movie_title_suffix', ['title' => $movie->title]))

@section('content')
<div class="container">
    <div class="movie-detail">
        <div class="movie-header">
            @if($movieImage)
                <div class="movie-image">
                    <img src="{{ $movieImage }}" alt="{{ $movie->title }}" />
                </div>
            @endif

            <div class="movie-header-content">
                <h1 class="movie-title">{{ $movie->title }}</h1>

                <div class="movie-meta">
                    @if($movie->rating)
                        <div class="meta-item">
                            <span class="movie-rating">★ {{ number_format($movie->rating->rank, 1) }}</span>
                            <span class="meta-label">({{ __('app.votes', ['count' => number_format($movie->rating->votes)]) }})</span>
                        </div>
                    @endif

                    @if($movie->genres->isNotEmpty())
                        <div class="meta-item">
                            <div class="genre-list">
                                @foreach($movie->genres as $genre)
                                    <span class="genre-tag">{{ $genre->genre }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                @if($movie->tagline)
                    <p class="tagline">"{{ $movie->tagline->taglinetext }}"</p>
                @endif
            </div>
        </div>

        @if($movie->plot)
            <div class="movie-section">
                <h2>{{ __('app.plot') }}</h2>
                <p class="plot-text">{!! nl2br(e($movie->plot->plottext)) !!}</p>
            </div>
        @endif

        @if($movie->directors->isNotEmpty())
            <div class="movie-section">
                <h2>{{ $movie->directors->count() > 1 ? __('app.directors') : __('app.director') }}</h2>
                <div class="crew-list">
                    @foreach($movie->directors as $director)
                        <div class="crew-member">
                            <a href="{{ route('person.show', ['type' => 'director', 'id' => $director->directorid]) }}">
                                {{ \App\Helpers\Libs\NameHelper::formatName($director->name) }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($movie->actors->isNotEmpty())
            <div class="movie-section">
                <h2>{{ __('app.cast') }}</h2>
                <div class="cast-grid">
                    @foreach($movie->actors as $actor)
                        <div class="cast-member">
                            @if($actor->actorImage)
                                <div class="cast-member-image">
                                    <img src="{{ $actor->actorImage }}" alt="{{ $actor->name }}" />
                                </div>
                            @endif
                            <div class="cast-member-info">
                                <div class="cast-member-name">
                                    <a href="{{ route('person.show', ['type' => 'actor', 'id' => $actor->actorid]) }}">
                                        {{ \App\Helpers\Libs\NameHelper::formatName($actor->name) }}
                                    </a>
                                </div>
                                @if($actor->pivot->as_character)
                                    <div class="cast-member-character">
                                        {{ $actor->display_character }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($movie->producers->isNotEmpty())
            <div class="movie-section">
                <h2>{{ $movie->producers->count() > 1 ? __('app.producers') : __('app.producer') }}</h2>
                <div class="crew-list">
                    @foreach($movie->producers as $producer)
                        <div class="crew-member">
                            <a href="{{ route('person.show', ['type' => 'producer', 'id' => $producer->producerid]) }}">
                                {{ \App\Helpers\Libs\NameHelper::formatName($producer->name) }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($movie->trivia)
            <div class="movie-section">
                <h2>{{ __('app.trivia') }}</h2>
                <div class="trivia-text">{!! nl2br(e($movie->trivia->triviatext)) !!}</div>
            </div>
        @endif

        @if($movie->quotes)
            <div class="movie-section">
                <h2>{{ __('app.memorable_quotes') }}</h2>
                <div class="quote-text">{!! nl2br(e($movie->quotes->quotetext)) !!}</div>
            </div>
        @endif
    </div>
</div>
@endsection
