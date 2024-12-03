<section class="py-5 my-5 overflow-hidden popularDestinationSlider">
    <div class="container">
        <div class="d-md-flex justify-content-between">
            <div class="mb-2 mb-md-5">
                <h2 class="text-success">The best place you must visit</h2>
                <p class="mb-0">A wonderful serenity to have in ur bucket list</p>
            </div>

            <div class="d-flex gap-2 justify-content-end mb-4">
                <button id="popularDestinationPrevSlide" class="btn text-primary">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button id="popularDestinationNextSlide" class="btn text-primary">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <div class="popularDestinationSliderContainer">
            <div
                class="popularDestinationHead text-primary brand-shadow d-none d-md-flex justify-content-center align-items-center">
                <div class="text-center">
                    <h3>Popular destination</h3>
                    <p>A wonderful serenity has</p>
                </div>
            </div>

            <div id="popularDestination" class="splide" aria-label="Popular destination">
                <div class="splide__track">
                    <ul class="splide__list">
                        @for ($i = 0; $i < 10; $i++)
                            <li class="splide__slide">
                                <x-slide-one-card />
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
