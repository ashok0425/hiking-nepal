@props(['review'])

<div class="p-3">
    <div class="brand-shadow p-4 p-lg-5">
        <div class="mb-4 d-flex gap-3 align-items-center">
            <img src="{{ $review->user_photo ?? asset('images/avatar.png') }}" alt="user avatar" width="95"
                height="95" class="rounded-circle">
            <div class="w-100">
                <div class="fw-bold">{{ $review->user_name }}</div>
                <div class="text-muted small">{{ $review->created_at->format('M d, Y') }}</div>
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
        <p class="mb-0">{{ $review->comment }}</p>
    </div>
</div>
