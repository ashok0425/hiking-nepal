document.addEventListener("DOMContentLoaded", function () {
    // Handle mobile dropdown toggles
    const packageDropdowns = document.querySelectorAll(
        ".package-dropdown-toggle",
    );

    packageDropdowns.forEach((dropdown) => {
        dropdown.addEventListener("click", function (e) {
            // Only apply this behavior on mobile
            if (window.innerWidth <= 991) {
                e.preventDefault();
                e.stopPropagation(); // Prevent event from bubbling up

                const parent = this.closest(".package-dropend");

                // Close sibling dropdowns at the same level
                const siblings = parent.parentElement.querySelectorAll(
                    ".package-dropend.show",
                );
                siblings.forEach((sibling) => {
                    if (sibling !== parent) {
                        sibling.classList.remove("show");
                    }
                });

                // Toggle current dropdown
                parent.classList.toggle("show");
            }
        });
    });

    // Prevent dropdown menu from closing when clicking inside it
    const dropdownMenus = document.querySelectorAll(
        ".destination-menu, .package-submenu",
    );
    dropdownMenus.forEach((menu) => {
        menu.addEventListener("click", function (e) {
            if (window.innerWidth <= 991) {
                e.stopPropagation(); // Prevent clicks inside dropdown from closing the menu
            }
        });
    });

    // Close only submenus when clicking outside, but not the main destination menu
    document.addEventListener("click", function (e) {
        if (window.innerWidth <= 991) {
            if (!e.target.closest(".package-dropend")) {
                const openDropdowns = document.querySelectorAll(
                    ".package-dropend.show",
                );
                openDropdowns.forEach((item) => {
                    item.classList.remove("show");
                });
            }
        }
    });
});

function handleDestinationClick(event, url) {
    // Check if the screen width is greater than 991px (desktop)
    if (window.innerWidth > 991) {
        // Prevent the dropdown toggle
        event.preventDefault();
        // Navigate to the destination
        window.location.href = url;
    }
    // On mobile (<=991px), let the default dropdown behavior happen
}
