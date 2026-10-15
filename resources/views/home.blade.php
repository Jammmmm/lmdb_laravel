@extends('layouts.app')

@section('title', __('app.home_title'))

@section('content')
<div class="container">
    <section class="hero">
        <h1>{{ __('app.welcome_heading') }}</h1>
        <p>{!! __('app.welcome_tagline') !!}</p>

        <form action="{{ route('search') }}" method="GET" class="search-form">
            <input type="text" name="q" placeholder="{{ __('app.search_placeholder') }}" class="search-input" required />
            <button type="submit" class="search-button">{{ __('app.search_button') }}</button>
        </form>
    </section>

    <section>
        <h2 class="section-title">{{ __('app.random_movies') }}</h2>
        <div class="movies-grid">
            @forelse($movies as $movie)
                <article class="movie-card">
                    @php
                        $movieImage = \App\Helpers\Libs\ImageHelper::getMovieImage($movie->movieid);
                    @endphp
                    @if($movieImage)
                        <div class="card-image">
                            <img src="{{ $movieImage }}" alt="{{ $movie->title }}">
                        </div>
                    @endif

                    <h3>
                        <a href="{{ route('movie.show', $movie->movieid) }}">
                            {{ $movie->title }}
                        </a>
                    </h3>

                    @if($movie->rating)
                        <div class="movie-rating">
                            ★ {{ number_format($movie->rating->rank, 1) }}
                        </div>
                    @endif

                    @if($movie->genres->isNotEmpty())
                        <div class="movie-genres">
                            {{ $movie->genres->pluck('genre')->take(3)->implode(', ') }}
                        </div>
                    @endif
                </article>
            @empty
                <p>{{ __('app.no_movies_available') }}</p>
            @endforelse
        </div>
    </section>

    <section>
        <h2 class="section-title">{{ __('app.random_actors') }}</h2>
        <div class="actors-grid">
            @forelse($actors as $actor)
                <article class="actor-card">
                    @php
                        $actorImage = \App\Helpers\Libs\ImageHelper::getPersonImage($actor->actorid);
                    @endphp
                    @if($actorImage)
                        <div class="card-image">
                            <img src="{{ $actorImage }}" alt="{{ $actor->name }}">
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
            @empty
                <p>{{ __('app.no_actors_available') }}</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
