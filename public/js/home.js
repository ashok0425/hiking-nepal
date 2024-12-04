
document.addEventListener('DOMContentLoaded', function () {
    var popularDestination = new Splide('#popularDestination', {
        type: 'loop',
        perMove: 1,
        autoWidth: true,
        gap: '1rem',
        pagination: false,
        arrows: false
    });

    document.querySelector('#popularDestinationPrevSlide').addEventListener('click', () => {
        popularDestination.go('<');
    });

    document.querySelector('#popularDestinationNextSlide').addEventListener('click', () => {
        popularDestination.go('>');
    });

    popularDestination.mount();

    var popularPackages = new Splide('#popularPackages', {
        type: 'loop',
        perPage: 3,
        perMove: 1,
        gap: '2rem',
        pagination: false,
        arrows: false,
        breakpoints: {
            992: {
                perPage: 2,
            },
            768: {
                perPage: 1,
            }
        }
    });
    document.querySelector('#popularPackagesPrevSlide').addEventListener('click', () => {
        popularPackages.go('<');
    });

    document.querySelector('#popularPackagesNextSlide').addEventListener('click', () => {
        popularPackages.go('>');
    });
    popularPackages.mount();

    var discountedPackages = new Splide('#discountedPackages', {
        type: 'loop',
        perPage: 3,
        perMove: 1,
        gap: '2rem',
        pagination: false,
        breakpoints: {
            992: {
                perPage: 2,
            },
            768: {
                perPage: 1,
            }
        }
    });
    document.querySelector('#discountedPackagesPrevSlide').addEventListener('click', () => {
        discountedPackages.go('<');
    });

    document.querySelector('#discountedPackagesNextSlide').addEventListener('click', () => {
        discountedPackages.go('>');
    });

    discountedPackages.mount();

    var testimonials = new Splide('#testimonials', {
        type: 'loop',
        perPage: 3,
        perMove: 1,
        gap: '2rem',
        pagination: false,
        breakpoints: {
            1024: {
                perPage: 2,
            },
            768: {
                perPage: 2,
            },
            767: {
                perPage: 1,
            }
        }
    });
    testimonials.mount();
});
