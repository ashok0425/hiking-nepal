<div class="brand-shadow p-5 mb-5 text-center">
    <h2 class="mb-5">How are you travelling? <span class="text-danger">*</span></h2>

    <div class="mb-5 mx-auto" id="travellingAsContainer">
        <input type="hidden" name="travellingAs" id="travellingAsInput">
        <div class="d-flex flex-wrap gap-4 justify-content-center">
            <div class="traveller-type text-center cursor-pointer" data-value="solo">
                <div>
                    <i class="fas fa-user fa-2x mb-2"></i>
                    <div>Solo</div>
                </div>
            </div>

            <div class="traveller-type text-center cursor-pointer" data-value="couple">
                <div>
                    <i class="fas fa-user-friends fa-2x mb-2"></i>
                    <div>Couple</div>
                </div>
            </div>

            <div class="traveller-type text-center cursor-pointer" data-value="family">
                <div>
                    <i class="fas fa-users fa-2x mb-2"></i>
                    <div>Family</div>
                </div>
            </div>

            <div class="traveller-type text-center cursor-pointer" data-value="groups">
                <div>
                    <i class="fas fa-users fa-2x mb-2"></i>
                    <div>Groups</div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('travellingAsContainer');
            const travellerTypes = container.querySelectorAll('.traveller-type');
            const hiddenInput = document.getElementById('travellingAsInput');

            travellerTypes.forEach(type => {
                type.addEventListener('click', function() {
                    // Remove selected class from all
                    travellerTypes.forEach(t => t.classList.remove('selected'));

                    // Add selected class to clicked element
                    this.classList.add('selected');

                    // Update hidden input value
                    hiddenInput.value = this.dataset.value;
                });
            });
        });
    </script>

    <button class="btn btn-primary">NEXT <i class="fas fa-arrow-right"></i></button>
</div>
