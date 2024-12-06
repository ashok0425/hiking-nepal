<div class="brand-shadow p-5 mb-5 text-center">
    <h2 class="mb-5">Budget range (Per Person) <span class="text-danger">*</span></h2>

    <div class="slider"></div>

    <div class="d-flex gap-4 justify-content-center w-100">
        <button class="btn btn-secondary"><i class="fas fa-arrow-left"></i> BACK</button>
        <button class="btn btn-primary">NEXT <i class="fas fa-arrow-right"></i></button>
    </div>
</div>

@push('scripts')
    <script src="https://unpkg.com/@spreadtheweb/multi-range-slider@1.0.2/dist/range-slider.main.min.js"></script>
    <script>
        let slider = new RangeSlider('.slider')
    </script>
@endpush
