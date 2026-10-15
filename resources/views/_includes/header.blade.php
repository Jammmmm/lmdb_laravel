<header class="site-header">
    <div class="container">
        <div class="header-content">
            <h1 class="site-logo">
                <a href="{{ route('home') }}">{{ __('app.site_name') }}</a>
            </h1>

            <nav class="main-nav">
                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <input type="text" name="q" placeholder="{{ __('app.search_placeholder_header') }}" value="{{ request('q') }}" class="search-input" required />
                    <button type="submit" class="search-button">{{ __('app.search_button') }}</button>
                </form>
            </nav>
        </div>
    </div>
</header>
