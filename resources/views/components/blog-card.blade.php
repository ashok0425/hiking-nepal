<div class="card" style="background-color: transparent">
    @if ($post->thumbnail)
        @if (str_starts_with($post->thumbnail, 'http'))
            <img src="{{ $post->thumbnail }}" class="card-img-top" alt="{{ $post->title }}"
                style="height: 250px; object-fit: cover;">
        @else
            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="card-img-top" alt="{{ $post->title }}"
                style="-height: 250px; object-fit: cover;">
        @endif
    @else
        <div class="card-img-top bg-secondary" style="height: 250px;"></div>
    @endif
    <div class="card-body px-0">
        <h3 class="card-title text-success fs-4">{{ $post->title }}</h3>
        <div class="mb-2 text-muted">{{ $post->published_at->format('F d, Y') }}</div>
        <p class="card-text">{{ Str::limit(strip_tags($post->content), 150) }}</p>
        <a href="{{ route('blog-page', $post->slug) }}" class="stretched-link">Read More</a>
    </div>
</div>
