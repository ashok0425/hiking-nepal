@php
    $partnerLogos = \App\Models\PartnerLogo::where('is_active', true)->orderBy('sort_order')->get();
@endphp

@if($partnerLogos->count())
<section class="partners-section mt-5 py-4 bg-white">
    <div class="splide" id="partnersCarousel" aria-label="Our Partners">
        <div class="splide__track">
            <ul class="splide__list align-items-center">
                @foreach($partnerLogos as $logo)
                    <li class="splide__slide d-flex justify-content-center align-items-center">
                        <img src="{{ $logo->logo_url }}" alt="{{ $logo->name }}" style="height:80px; max-width:120px; object-fit:contain;">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (document.getElementById('partnersCarousel')) {
            new Splide('#partnersCarousel', {
                type: 'loop',
                autoplay: true,
                interval: 2000,
                speed: 1000,
                perPage: 6,
                perMove: 1,
                gap: '2rem',
                pagination: false,
                arrows: false,
                pauseOnHover: false,
                breakpoints: {
                    992: { perPage: 4 },
                    768: { perPage: 3 },
                    576: { perPage: 2 },
                }
            }).mount();
        }
    });
</script>
@endpush
@endif
