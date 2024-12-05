<section class="py-md-5 my-5">
    <div class="container py-5">
        <div class="mx-auto" style="max-width: 800px;">
            <div class="head-lines text-center mb-5">
                <div class="head-line-bg"></div>
                <h2 class="mb-0 bg-white head-line-head">FOLLOW US ON INSTAGRAM
                </h2>
            </div>
        </div>

        <div class="row mb-4 g-3">
            @for ($i = 0; $i < 3; $i++)
                <div class="col-lg-4 col-md-6">
                    <img src="{{ asset('images/insta.png') }}" class="img-fluid" />
                </div>
            @endfor

        </div>
    </div>

</section>
