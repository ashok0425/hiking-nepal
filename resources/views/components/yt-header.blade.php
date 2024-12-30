@props(['title'])
<section id="hero-section" class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
    style="height: 530px;">

    <div class="video-container">

        @php
            $videos = [
                ['id' => 'gCRNEJxDJKM', 'start' => 15],
                ['id' => 'bY_gRApfoJk', 'start' => 15],
                ['id' => 'nZmO8B9rRik', 'start' => 35],
            ];

            $randomVideo = $videos[array_rand($videos)];
        @endphp

        <iframe
            src="https://www.youtube.com/embed/{{ $randomVideo['id'] }}?controls=0&autoplay=1&mute=1&playsinline=1&playlist={{ $randomVideo['id'] }}&loop=1&start={{ $randomVideo['start'] }}"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>

    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.6; z-index: 2;"></div>

    <div class="container position-relative" style="z-index: 3;">
        <h1 class="mb-0 text-white text-center display-3 pacifico-regular">{{ $title }}</h1>
    </div>
</section>
