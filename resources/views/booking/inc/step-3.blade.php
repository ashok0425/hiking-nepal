<div class="brand-shadow p-3 p-md-5 mb-5 step-3">
    <h2 class="mb-4 mb-md-5 text-center">Choose your destination * <span class="text-danger">*</span></h2>

    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3 mb-4 mb-md-5">
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="peru" name="destination[]" value="Peru">
                <label class="form-check-label" for="peru">Peru</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="nepal" name="destination[]" value="Nepal">
                <label class="form-check-label" for="nepal">Nepal</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="bhutan" name="destination[]" value="Bhutan">
                <label class="form-check-label" for="bhutan">Bhutan</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="india" name="destination[]" value="India">
                <label class="form-check-label" for="india">India</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="japan" name="destination[]" value="Japan">
                <label class="form-check-label" for="japan">Japan</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="myanmar" name="destination[]" value="Myanmar">
                <label class="form-check-label" for="myanmar">Myanmar</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="china" name="destination[]" value="China">
                <label class="form-check-label" for="china">China</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="thailand" name="destination[]" value="Thailand">
                <label class="form-check-label" for="thailand">Thailand</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tibet" name="destination[]" value="Tibet">
                <label class="form-check-label" for="tibet">Tibet</label>
            </div>
        </div>
    </div>

    <div
        class="d-flex flex-column flex-md-row gap-3 justify-content-between align-items-start align-items-md-center mb-4">
        <div class="fw-bold w-100">Choose the trips you are interested in</div>
        <form action="" method="GET" class="mb-3 mb-md-5  w-md-auto">
            <div class="input-group" style="max-width: 300px;">
                <span class="input-group-text text-primary" id="basic-addon1">
                    <i class="fas fa-search"></i>
                </span>
                <input class="form-control ps-0 border-start-0" type="text" placeholder="Search Blog" required>
            </div>
        </form>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 mb-3">
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="annapurna" name="trek[]" value="Annapurna">
                <label class="form-check-label text-break" for="annapurna">Annapurna base camp trek</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="bhutan_nepal" name="trek[]"
                    value="Bhutan_Nepal">
                <label class="form-check-label text-break" for="bhutan_nepal">Bhutan and Nepal Trek</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="dolpo" name="trek[]" value="Dolpo">
                <label class="form-check-label text-break" for="dolpo">Lower Dolpo Trek</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="bunjee" name="trek[]" value="Bunjee">
                <label class="form-check-label text-break" for="bunjee">Pokhara Bunjee Jumping</label>
            </div>
        </div>
    </div>

    <div class="collapse" id="moreTreks">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="nepal_tibet" name="trek[]"
                        value="Nepal_Tibet">
                    <label class="form-check-label text-break" for="nepal_tibet">Nepal and Tibet Tour</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="upper_mustang" name="trek[]"
                        value="Upper_Mustang">
                    <label class="form-check-label text-break" for="upper_mustang">Upper Mustang Trek</label>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mb-4 mb-md-5">
        <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#moreTreks"
            aria-expanded="false" aria-controls="moreTreks">
            <span class="show-more">Show More <i class="fas fa-chevron-down"></i></span>
            <span class="show-less d-none">Show Less <i class="fas fa-chevron-up"></i></span>
        </button>
    </div>

    <script>
        document.querySelector('[data-bs-toggle="collapse"]').addEventListener('click', function() {
            const showMore = this.querySelector('.show-more');
            const showLess = this.querySelector('.show-less');
            showMore.classList.toggle('d-none');
            showLess.classList.toggle('d-none');
        });
    </script>

    <div class="d-flex gap-4 justify-content-center w-100">
        <button class="btn btn-secondary"><i class="fas fa-arrow-left"></i> BACK</button>
        <button class="btn btn-primary">NEXT <i class="fas fa-arrow-right"></i></button>
    </div>
</div>
