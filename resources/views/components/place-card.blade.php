@props(['place'])

<a href="{{ route('deals', ['destination' => $place->destination->slug, 'place' => $place->slug]) }}">
    <div class="d-card">
        <img src="{{ $place->cover ?? asset('images/dest-1.jpg') }}" alt="{{ $place->name }} image"
            class="img-fluid hover-scale">

        <div class="d-card-body">
            <div class="d-card-heading">{{ $place->name }}</div>
            <div class="d-card-meta">{{ $place->packages_count }} Trips</div>
        </div>
    </div>
</a>
