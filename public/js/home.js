document.addEventListener("DOMContentLoaded", function () {
    var popularPackages = new Splide("#popularPackages", {
        type: "loop",
        perPage: 3,
        perMove: 1,
        gap: "2rem",
        pagination: false,
        breakpoints: {
            992: {
                perPage: 2,
            },
            768: {
                perPage: 1,
            },
        },
    });
    popularPackages.mount();

    var discountedPackages = new Splide("#discountedPackages", {
        type: "loop",
        perPage: 3,
        perMove: 1,
        gap: "2rem",
        pagination: false,
        breakpoints: {
            992: {
                perPage: 2,
            },
            768: {
                perPage: 1,
            },
        },
    });

    discountedPackages.mount();

    var testimonials = new Splide("#testimonials", {
        type: "loop",
        perPage: 3,
        perMove: 1,
        gap: "2rem",
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
            },
        },
    });
    testimonials.mount();
});
