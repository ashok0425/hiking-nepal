<footer class="mt-5">
    <div class="footer-container py-5 ">
        <div class="container" style="padding-top: 200px;">
            <div class="row g-3">
                <!-- Column 1: Contact Info -->
                <div class="col-md-6 col-lg-3">
                    <img src="{{ asset('images/logo-2.png') }}" alt="Hiking Nepal Logo" width="51" height="51"
                        class="mb-3">
                    <h6 class="text-success mb-3">Let’s Explore Places</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Keshar Mahal, Thamel, Kathmandu</a></li>
                        <li><a href="mailto:info@hikingnepal.com">info@hikingnepal.com</a></li>
                        <li><a href="tel:+97714701537">+977 1 4701537</a></li>
                        <li><a href="tel:+9779802342080">+977 9802342080</a></li>
                        <li><a href="mailto:info@hikingnepal.com">info@hikingnepal.com</a></li>
                        <li><a href="https://hikingnepal.com">hikingnepal.com</a></li>
                    </ul>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="col-md-6 col-lg-3">
                    <h6 class="text-success mb-3">QUICK LINKS</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('information') }}">Information</a></li>
                        <li><a href="{{ route('who-we-are') }}">Who We Are</a></li>
                        <li><a href="{{ route('what-we-offer') }}">What We Offer</a></li>
                        <li><a href="{{ route('our-team') }}">Our Team</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('book-a-call') }}">Book a Call</a></li>
                    </ul>
                </div>

                <!-- Column 3: Useful Links -->
                <div class="col-md-6 col-lg-3">
                    <h6 class="text-success mb-3">USEFUL LINKS</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('booking-terms') }}">Booking Terms & Conditions</a></li>
                        <li><a href="{{ route('legal-document') }}">Legal Document</a></li>
                        <li><a href="{{ route('deals') }}">Deals</a></li>
                        <li><a href="{{ route('book-trip') }}">Book Your Trip</a></li>
                    </ul>
                </div>

                <!-- Column 4: Newsletter -->
                <div class="col-md-6 col-lg-3">
                    <h6 class="text-success mb-3" id="newsletterForm">NEWSLETTER</h6>
                    <p class="small">Sign up for Deals and Discount. Get News, Notifications and Updates
                        about the recent Events and Offers.
                    </p>
                    <form method="POST" class="newsletter-form" action="{{ route('newsletter.subscribe') }}">
                        @csrf
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="First Name" name="first_name"
                                required>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email Address" name="email"
                                required>
                        </div>
                        <button class="btn btn-primary" type="submit">SUBSCRIBE</button>
                        @if (session('status') === 'subscribed')
                            <div class="alert alert-success mt-2">
                                Thank you for subscribing to our newsletter!
                            </div>
                        @endif
                    </form>

                    <!-- Payment Icons -->
                    <div class="payment-icons mt-3">
                        Payment:
                        <img src="{{ asset('images/visa.png') }}" alt="Visa" class="me-2" style="height: 20px;">
                        <img src="{{ asset('images/paypal.png') }}" alt="PayPal" class="me-2"
                            style="height: 20px;">
                        <img src="{{ asset('images/mastercard.png') }}" alt="Mastercard" class="me-2"
                            style="height: 20px;">
                        <img src="{{ asset('images/apple-pay.png') }}" alt="ApplePay" class="me-2"
                            style="height: 20px;">
                    </div>
                    <!-- Social Media Icons -->
                    <div class="social-icons mt-3">
                        <a href="https://www.facebook.com/hikingnepal" class="text-primary me-2" target="_blank"><i
                                class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com/hikingnepal" class="text-primary me-2" target="_blank"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/hiking.nepal" class="text-primary me-2" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/hiking-nepal" class="text-primary me-2"
                            target="_blank"><i class="fab fa-linkedin"></i></a>
                        {{-- <a href="https://www.youtube.com/hikingnepal" class="text-primary me-2" target="_blank"><i
                                class="fab fa-youtube"></i></a> --}}
                        <a href="https://api.whatsapp.com/send?phone=9779802342080" class="text-primary me-2"
                            target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="row mt-4">
                <div class="col-12">
                    <p class="text-secondary small mb-0">
                        Copyright &copy; {{ date('Y') }}. All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
