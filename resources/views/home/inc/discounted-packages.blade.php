<section class="bg-light">
    <div class="container py-5 mb-5">

        <div class="mx-auto" style="max-width: 800px;">
            <div class="head-lines text-center mb-5">
                <div class="head-line-bg"></div>
                <h2 class="mb-0 bg-light head-line-head">Discounted Packages
                </h2>
            </div>
        </div>

        <div id="discountedPackages" class="splide mb-3" aria-label="Discounted Packages">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($regularPackages as $package)
                        <li class="splide__slide py-2">
                            <x-package-card :package="$package" />
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
