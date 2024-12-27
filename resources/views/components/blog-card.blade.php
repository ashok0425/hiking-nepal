<div class="card" style="background-color: transparent">
    @if ($post->thumbnail || $post->cover)
        <img src="{{ $post->thumbnail ?? $post->cover }}" class="card-img-top" alt="{{ $post->title }}"
            style="height: 250px; object-fit: cover;" loading="lazy">
    @else
        <div class="card-img-top bg-secondary" style="height: 250px;"></div>
    @endif
    <div class="card-body px-0">
        <h3 class="card-title text-primary fs-4">{{ $post->title }}</h3>
        <div class="mb-2 text-muted">{{ $post->published_at->format('F d, Y') }}</div>
        <p class="card-text">{{ Str::limit(strip_tags($post->content), 150) }}</p>
        <a href="{{ route('dynamic-page', $post->slug) }}" class="stretched-link">Read More</a>
    </div>
</div>
