<section class="bg-light py-0 py-md-5">
    <div class="container py-5 mt-5">

        <div class="mx-auto" style="max-width: 800px;">
            <div class="head-lines text-center mb-5">
                <div class="head-line-bg"></div>
                <h2 class="mb-0 bg-light head-line-head">Most Popular Packages
                </h2>
            </div>
        </div>

        <div id="popularPackages" class="splide mb-3" aria-label="Most Popular Packages">
            <div class="splide__track">
                <ul class="splide__list">
                    @for ($i = 0; $i < 5; $i++)
                        <li class="splide__slide py-2">
                            <x-package-card />
                        </li>
                    @endfor
                </ul>
            </div>
        </div>

        <div class="d-flex gap-2 justify-content-end mb-4">
            <button id="popularPackagesPrevSlide" class="btn text-primary">
                <i class="fas fa-arrow-left"></i>
            </button>
            <button id="popularPackagesNextSlide" class="btn text-primary">
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>
