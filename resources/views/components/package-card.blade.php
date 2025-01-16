@props(['package'])

<div class="card brand-shadow h-100 card-img-hover-scale">
    <div class="overflow-hidden">
        <img src="{{ !empty($package->galleryImages()) ? $package->galleryImages()[0] : asset('images/card-img.webp') }}"
            class="card-img-top "
            style="height: 300px; background-color: #f8f9fa; object-fit: cover; object-position: center center;"
            alt="{{ $package->title }}" loading="lazy">
    </div>

    <div class="card-body">
        <h5 class="card-title text-primary mb-1">{{ $package->title }}</h5>
        <div class="mb-2">{{ $package?->place?->name }}, {{ $package->destination?->name }}</div>
        <div class="d-flex justify-content-between mb-2">
            <div><i class="fa-solid fa-clock text-primary me-1"></i> {{ strtoupper($package->tour_duration) }}</div>
            <div class="d-inline-flex align-items-center gap-2">
                @if ($package->hasDiscount())
                    <del class="text-danger">${{ number_format($package->sale_price_per_person) }}</del>
                    <span class="text-success fs-5 fw-bold">${{ number_format($package->discounted_price) }}</span>
                @else
                    <span class="text-success fs-5 fw-bold">${{ number_format($package->sale_price_per_person) }}</span>
                @endif
            </div>
        </div>
        <p class="card-text">{!! Str::limit(strip_tags($package->overview), 100) !!}</p>
        <a href="{{ route('tours', $package->slug) }}" class="btn btn-primary stretched-link">More Details</a>
    </div>
</div>
