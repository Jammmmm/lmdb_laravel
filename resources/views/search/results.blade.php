@extends('layouts.app')

@section('title', __('app.search_results_title'))

@section('content')
<div class="container">
    <div class="search-results">
        <div class="search-header">
            <h1>{!! __('app.search_results_for', ['query' => $query]) !!}</h1>
        </div>

        @if($movies->isNotEmpty())
            <div class="results-section">
                <h2>{{ __('app.movies_count', ['count' => $movies->count()]) }}</h2>
                <div class="movies-grid">
                    @foreach($movies as $movie)
                        <article class="movie-card">
                            @if($movie->movieImage)
                                <div class="card-image">
                                    <img src="{{ $movie->movieImage }}" alt="{{ $movie->title }}" />
                                </div>
                            @endif

                            <h3>
                                <a href="{{ route('movie.show', $movie->movieid) }}">{{ $movie->title }}</a>
                            </h3>

                            @if($movie->rating)
                                <div class="movie-rating">★ {{ number_format($movie->rating->rank, 1) }}</div>
                            @endif

                            @if($movie->genres->isNotEmpty())
                                <div class="movie-genres">{{ $movie->genres->pluck('genre')->take(3)->implode(', ') }}</div>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        @if($actors->isNotEmpty())
            <div class="results-section">
                <h2>{{ __('app.actors_count', ['count' => $actors->count()]) }}</h2>
                <div class="actors-grid">
                    @foreach($actors as $actor)
                        <article class="actor-card">
                            @if($actor->actorImage)
                                <div class="card-image">
                                    <img src="{{ $actor->actorImage }}" alt="{{ $actor->name }}" />
                                </div>
                            @endif

                            <h3>
                                <a href="{{ route('person.show', ['type' => 'actor', 'id' => $actor->actorid]) }}">
                                    {{ \App\Helpers\Libs\NameHelper::formatName($actor->name) }}
                                </a>
                            </h3>

                            @if($actor->movies->isNotEmpty())
                                <div class="actor-movies">
                                    <strong>{{ __('app.known_for') }}</strong>
                                    @foreach($actor->movies->take(3) as $movie)
                                        <a href="{{ route('movie.show', $movie->movieid) }}">{{ $movie->title }}</a>@if(!$loop->last), @endif
                                    @endforeach
                                </div>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        @if($movies->isEmpty() && $actors->isEmpty() && trim($query) !== '')
            <div class="results-section">
                <p class="no-results">{{ __('app.no_results', ['query' => $query]) }}</p>
            </div>
        @endif

        @if(trim($query) === '')
            <div class="results-section">
                <p class="no-results">{{ __('app.enter_search_term') }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
