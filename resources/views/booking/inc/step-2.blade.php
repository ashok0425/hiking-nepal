<div class="brand-shadow p-5 mb-5 text-center">
    <h2 class="mb-5">Arrival Date <span class="text-danger">*</span></h2>

    <div class="mb-5 mx-auto" id="travellingAsContainer">
        <input type="hidden" name="travellingAs" id="travellingAsInput">
        <div class="d-flex flex-wrap gap-4 justify-content-center">
            <div class="traveller-type text-center cursor-pointer" data-value="solo">
                <div>
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_191_876)">
                            <path
                                d="M15 1.875C15 1.37772 14.8025 0.900806 14.4508 0.549175C14.0992 0.197544 13.6223 0 13.125 0C12.6277 0 12.1508 0.197544 11.7992 0.549175C11.4475 0.900806 11.25 1.37772 11.25 1.875V3.75H7.5C5.51088 3.75 3.60322 4.54018 2.1967 5.9467C0.790176 7.35322 0 9.26088 0 11.25L0 15H60V11.25C60 9.26088 59.2098 7.35322 57.8033 5.9467C56.3968 4.54018 54.4891 3.75 52.5 3.75H48.75V1.875C48.75 1.37772 48.5525 0.900806 48.2008 0.549175C47.8492 0.197544 47.3723 0 46.875 0C46.3777 0 45.9008 0.197544 45.5492 0.549175C45.1975 0.900806 45 1.37772 45 1.875V3.75H15V1.875ZM35.2575 38.4225C37.6012 38.4225 39.6975 36.6075 39.6975 33.9975C39.6975 30.8775 37.7212 29.385 35.3475 29.385C33.15 29.385 30.9675 30.8362 30.9675 33.9225C30.9675 36.9862 33.0037 38.4225 35.2575 38.4225Z"
                                fill="currentColor" />
                            <path
                                d="M60 52.5V18.75H0V52.5C0 54.4891 0.790176 56.3968 2.1967 57.8033C3.60322 59.2098 5.51088 60 7.5 60H52.5C54.4891 60 56.3968 59.2098 57.8033 57.8033C59.2098 56.3968 60 54.4891 60 52.5ZM35.01 47.9625C30.8475 47.9625 28.8 45.0863 28.6237 42.6863H31.185C31.3463 44.0738 32.6362 45.7612 35.1262 45.7612C38.2912 45.7612 40.005 42.5812 40.02 37.6462H39.9188C39.345 39.1987 37.53 40.6088 34.7325 40.6088C31.5375 40.6088 28.4475 38.3212 28.4475 33.9713C28.4475 29.7075 31.7138 27.1875 35.1863 27.1875C39.5813 27.1875 42.51 29.94 42.51 37.1925C42.51 43.9613 39.7275 47.9587 35.01 47.9587V47.9625ZM24.1725 27.5813V47.5763H21.6375V30.2963H21.5925C20.505 30.8813 18.2812 32.2463 16.875 33.21V30.6C18.4551 29.4973 20.0993 28.4893 21.7987 27.5813H24.1725Z"
                                fill="currentColor" />
                        </g>
                        <defs>
                            <clipPath id="clip0_191_876">
                                <rect width="60" height="60" fill="currentColor" />
                            </clipPath>
                        </defs>
                    </svg>

                    <div>I have exact travel dates</div>
                </div>
            </div>

            <div class="traveller-type text-center cursor-pointer" data-value="couple">
                <div>
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 47.5C5 51.75 8.25 55 12.5 55H47.5C51.75 55 55 51.75 55 47.5V27.5H5V47.5ZM47.5 10H42.5V7.5C42.5 6 41.5 5 40 5C38.5 5 37.5 6 37.5 7.5V10H22.5V7.5C22.5 6 21.5 5 20 5C18.5 5 17.5 6 17.5 7.5V10H12.5C8.25 10 5 13.25 5 17.5V22.5H55V17.5C55 13.25 51.75 10 47.5 10Z"
                            fill="#164479" />
                    </svg>

                    <div>I have approximate dates</div>
                </div>
            </div>

            <div class="traveller-type text-center cursor-pointer" data-value="family">
                <div>
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M50 30H55V45H50V30ZM50 50H55V55H50V50ZM30 5C16.25 5 5 16.25 5 30C5 43.75 16.25 55 30 55C35.75 55 40.75 53 45 50V25H54.5C52.25 13.5 42 5 30 5ZM40.5 40.5L27.5 32.5V17.5H31.25V30.5L42.5 37.25L40.5 40.5Z"
                            fill="#164479" />
                    </svg>

                    <div>I have approximate dates</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <div class="form-group">
                <label for="arrival_date">Arrival Date</label>
                <input type="date" class="form-control" id="arrival_date" name="arrival_date" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="departure_date">Departure Date</label>
                <input type="date" class="form-control" id="departure_date" name="departure_date" required>
            </div>
        </div>
    </div>

    <div class="d-flex gap-4 justify-content-center w-100">
        <button class="btn btn-secondary"><i class="fas fa-arrow-left"></i> BACK</button>
        <button class="btn btn-primary">NEXT <i class="fas fa-arrow-right"></i></button>
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
