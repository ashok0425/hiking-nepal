@props(['review'])

<div class="px-3 py-2">
    <div class="brand-shadow p-4 p-lg-5 review-card">
        <div class="mb-4 d-flex gap-3 align-items-center">
            @if ($review->user_photo)
                <img src="{{ $review->user_photo }}" alt="user avatar" width="95" height="95" class="rounded-circle">
            @else
                <div class="bg-light border rounded-circle d-flex align-items-center justify-content-center"
                    style="width: 95px; height: 95px; flex-shrink: 0;">
                    <i class="fas fa-user fa-3x text-secondary"></i>
                </div>
            @endif
            <div class="w-100">
                <div class="fw-bold">{{ $review->user_name }}</div>
                <div class="text-muted small">{{ $review->date->format('M d, Y') }}</div>
                <hr class="my-2">
                <div class="small">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <i class="fas fa-star text-warning"></i>
                        @else
                            <i class="far fa-star text-warning"></i>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
        <p class="mb-0">{{ \Illuminate\Support\Str::limit($review->comment, 250, '...') }}</p>
    </div>
</div>
