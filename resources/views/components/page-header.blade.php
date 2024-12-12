<div>
    <section class="hero2">

        @if (empty($img))
            <img data-src="{{ getImageurl('frontend/assets/hero4.webp') }}" class="lazy" alt="cover image" width="2000"
                height="300">
        @else
            <img data-src="{{ $img }}" alt="cover image" class="lazy" width="2000" height="300">
        @endif
        <div class="container">
            <div class="hero-text">
                <h1>{{ $title }}</h1>
                <p>
                    <a href="{{ route('/') }}">Home </a> >
                    @if (!empty($before))
                        <a href="{{ $beforeroute }}">{{ $before }}</a> >
                    @endif
                    <a href="{{ $route }}">{{ $title }}</a>
                </p>
            </div>
        </div>
    </section>
</div>
