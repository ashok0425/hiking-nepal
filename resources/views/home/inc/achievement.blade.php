<section class="py-0 py-md-5 my-5">
    <div class="container py-5 section-bg-container justify-content-center overflow-hidden">

        <img src="{{ asset('images/cover-img-2.jpg') }}" alt="cover image" class="section-bg-img start-0">

        <div class="row z-1 w-100">
            <div class="col-md-8 offset-md-4">
                <div class="brand-shadow text-center px-3 py-5 px-md-5 bg-white w-100">
                    <div class="head-lines mb-5">
                        <div class="head-line-bg"></div>
                        <h2 class="mb-3 bg-white head-line-head">Our Achievement In Number</h2>
                        <p>Join countless happy trekkers on breathtaking eco-friendly adventures!</p>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-3 col-6 text-center">
                            <img src="{{ asset('images/templ.gif') }}" class="mb-2" alt="temple" width="80"
                                height="80">
                            <div class="fs-3 fw-bold text-success counter" data-count="354">0</div>
                            <div>Destination</div>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <img src="{{ asset('images/plane.gif') }}" class="mb-2" alt="plane" width="80"
                                height="80">
                            <div class="fs-3 fw-bold text-success counter" data-count="1250">0</div>
                            <div>Tour</div>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <img src="{{ asset('images/earth.gif') }}" class="mb-2" alt="globe" width="60">
                            <div class="fs-3 fw-bold text-success counter" data-count="25">0</div>
                            <div>Country</div>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <img src="{{ asset('images/tourist.gif') }}" class="mb-2" alt="tourist" width="80"
                                height="80">
                            <div class="fs-3 fw-bold text-success counter" data-count="4600">0</div>
                            <div>Tourists</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Counter animation when element is in viewport
    const counterAnimation = () => {
        const counters = document.querySelectorAll('.counter');
        const speed = 500; // Animation speed

        const startCount = (el) => {
            const target = parseInt(el.getAttribute('data-count'));
            let count = 0;
            const inc = target / speed;

            const updateCount = () => {
                if (count < target) {
                    count = Math.ceil(count + inc);
                    el.innerText = count;
                    setTimeout(updateCount, 1);
                } else {
                    el.innerText = target;
                }
            }
            updateCount();
        }

        // Observer for triggering animation when in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCount(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        });

        counters.forEach(counter => observer.observe(counter));
    }

    document.addEventListener('DOMContentLoaded', counterAnimation);
</script>
