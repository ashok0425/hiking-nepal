@props(['destination'])

<a href="{{ route('dynamic-page', ['slug' => $destination['slug']]) }}">
    <div class="d-card">
        <img src="{{ $destination['cover'] ?? asset('images/dest-1.jpg') }}" alt="{{ $destination['name'] }} image"
            class="img-fluid hover-scale">

        <div class="d-card-body">
            <div class="d-card-heading">{{ $destination['name'] }}</div>
            <div class="d-card-meta">{{ $destination['packages_count'] }}
                {{ $destination['packages_count'] == 1 ? 'Trip' : 'Trips' }}</div>
        </div>
    </div>
</a>
