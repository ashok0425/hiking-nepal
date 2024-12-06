<div class="brand-shadow p-3 p-sm-5 mb-5 text-center">
    <h2 class="mb-4 mb-sm-5">Budget range (Per Person) <span class="text-danger">*</span></h2>

    <div class="amount-steps d-flex justify-content-between small">
        <div class="steps-container">
            <span>$100</span>
            <span>$1k</span>
            <span>$2k</span>
            <span>$3k</span>
            <span>$4k</span>
            <span>$5k</span>
            <span>$6k</span>
            <span>$7k</span>
            <span>$8k</span>
            <span>$9k</span>
            <span>$10k</span>
        </div>
    </div>

    <div class="slider"></div>
    <div class="selected-range mt-3" style="color: #666;">
        <span id="range-values">$2000 - $4000</span>
    </div>

    <div class="d-flex gap-4 justify-content-center w-100 mt-4 mt-sm-5">
        <button class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</button>
        <button class="btn btn-primary">Next <i class="fas fa-arrow-right"></i></button>
    </div>
</div>

@push('scripts')
    <script src="https://unpkg.com/@spreadtheweb/multi-range-slider@1.0.2/dist/range-slider.main.min.js"></script>
    <script>
        const slider = new RangeSlider('.slider', {
            min: 100,
            max: 10000,
            step: 100,
            values: [2000, 4000],
            colors: {
                points: '#214B8C',
                rail: 'rgba(33, 75, 140, 0.2)',
                tracks: '#214B8C'
            },
            pointRadius: 8,
            railHeight: 3,
            trackHeight: 3
        });

        slider.onChange((values) => {
            document.getElementById('range-values').textContent =
                `$${values[0]} - $${values[1]}`;
        });
    </script>
@endpush

<style>
    .slider {
        margin: 20px auto;
        max-width: 800px;
        position: relative;
        width: 100%;
        padding: 0 10px;
    }

    .amount-steps {
        margin: 20px auto;
        max-width: 800px;
        width: 100%;
        padding: 0 10px;
        position: relative;
    }

    .steps-container {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    @media (max-width: 768px) {
        .amount-steps {
            font-size: 10px !important;
        }

        .amount-steps span {
            transform: rotate(-45deg);
            display: inline-block;
            white-space: nowrap;
        }
    }

    @media (max-width: 480px) {
        .amount-steps span:nth-child(even) {
            visibility: hidden;
        }
    }
</style>
