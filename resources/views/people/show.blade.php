@extends('layouts.app')

@section('title', __('app.person_title_suffix', ['name' => $person->name]))

@section('content')
<div class="container">
    <div class="person-detail">
        <div class="person-header">
            @if($personImage)
                <div class="person-image">
                    <img src="{{ $personImage }}" alt="{{ $person->name }}" />
                </div>
            @endif

            <div class="person-header-content">
                <h1 class="person-name">{{ \App\Helpers\Libs\NameHelper::formatName($person->name) }}</h1>
                <p class="person-role">{{ __('app.' . $type) }}</p>
            </div>
        </div>

        @if($biography)
            <div class="movie-section">
                <h2>{{ __('app.biography') }}</h2>
                <div class="plot-text">{!! nl2br(e($biography->biotext)) !!}</div>
            </div>
        @endif

        <div class="movie-section">
            <h2>{{ __('app.filmography') }}</h2>

            @if($movies->isNotEmpty())
                <ul class="filmography-list">
                    @foreach($movies as $movie)
                        <li class="filmography-item">
                            @if($movie->movieImage)
                                <div class="filmography-image">
                                    <img src="{{ $movie->movieImage }}" alt="{{ $movie->title }}" />
                                </div>
                            @endif

                            <div class="filmography-details">
                                <div class="film-title">
                                    <a href="{{ route('movie.show', $movie->movieid) }}">{{ $movie->title }}</a>
                                    @if($movie->rating)
                                        <span class="movie-rating">★ {{ number_format($movie->rating->rank, 1) }}</span>
                                    @endif
                                </div>

                                @if($type === 'actor' && $movie->pivot->as_character)
                                    <div class="film-character">
                                        {{ $movie->pivot->as_character }}
                                    </div>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="no-results">{{ __('app.no_filmography') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
