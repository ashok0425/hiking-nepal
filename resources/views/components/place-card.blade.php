@props(['place'])

<a href="#">
    <div class="d-card">
        <img src="{{ $place->cover ?? asset('images/dest-1.jpg') }}" alt="{{ $place->name }} image" class="img-fluid">

        <div class="d-card-body">
            <div class="d-card-heading">{{ $place->name }}</div>
            <div class="d-card-meta">{{ $place->packages_count }} Trips</div>
        </div>
    </div>
</a>
