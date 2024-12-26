<section class="py-5 my-5 overflow-hidden popularDestinationSlider">
    <div class="container">
        <div class="d-md-flex justify-content-between">
            <div class="mb-2 mb-md-5">
                <h2>The best place you must visit</h2>
                <p class="mb-0">A wonderful serenity to have in your bucket list</p>
            </div>
        </div>

        <div class="popularDestinationContainer">
            <div
                class="popularDestinationHead brand-shadow d-none d-md-flex justify-content-center align-items-center flex-shrink-0 ms-1">
                <div class="text-center">
                    <h4 class="text-primary">Popular <br> destination</h4>
                    <p>Sorting out the destination</p>
                </div>
            </div>

            @foreach ($places as $place)
                <x-place-card :place="$place" />
            @endforeach
        </div>

    </div>
</section>
