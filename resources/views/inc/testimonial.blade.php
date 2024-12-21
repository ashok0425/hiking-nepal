<section class="py-md-5 my-5">
    <div class="container py-5">
        <div class="mx-auto" style="max-width: 800px;">
            <div class="head-lines text-center mb-5">
                <div class="head-line-bg"></div>
                <h2 class="mb-0 bg-white head-line-head">Testimonial</h2>
            </div>
        </div>

        <div id="testimonials" class="splide" aria-label="Testimonial">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($reviews as $review)
                        <li class="splide__slide">
                            <x-testimonial-card :review="$review" />
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
