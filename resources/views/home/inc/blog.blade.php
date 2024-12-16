<section class="bg-light py-md-5">
    <div class="container py-5 my-5">

        <div class="mx-auto" style="max-width: 800px;">
            <div class="head-lines text-center mb-5">
                <div class="head-line-bg"></div>
                <h2 class="mb-0 bg-light head-line-head">LATEST BLOG
                </h2>
            </div>
        </div>

        <div class="row mb-4">
            @foreach (\App\Models\Post::getRecentPosts()->take(3) as $post)
                <div class="col-lg-4 col-md-6">
                    <x-blog-card :post="$post" />
                </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route('blog') }}" class="btn btn-primary">More Details</a>
        </div>
    </div>
</section>
