<section class="py-md-5 my-5">
    <div class="container py-5">
        <div class="mx-auto" style="max-width: 800px;">
            <div class="head-lines text-center mb-5">
                <div class="head-line-bg"></div>
                <h2 class="mb-0 bg-light head-line-head">FOLLOW US ON <span class="insta-font ms-3">Instagram</span>
                </h2>
            </div>
        </div>

        <div class="row mb-4 g-3">
            @foreach ($socialEmbeds as $socialEmbed)
                <div class="col-lg-4 col-md-6">
                    {!! $socialEmbed->body !!}
                </div>
            @endforeach
        </div>
    </div>

</section>
