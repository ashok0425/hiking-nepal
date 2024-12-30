ClassicEditor.create(document.querySelector("#overview-editor"), {
    simpleUpload: {
        uploadUrl: "{{ route('admin.ck-upload', ['_token' => csrf_token()]) }}",
    },
}).catch((error) => {
    console.error(error);
});

ClassicEditor.create(document.querySelector("#itinerary-editor"), {
    simpleUpload: {
        uploadUrl: "{{ route('admin.ck-upload', ['_token' => csrf_token()]) }}",
    },
}).catch((error) => {
    console.error(error);
});

document
    .getElementById("destination-select")
    .addEventListener("change", function () {
        const destinationId = this.value;
        const placeSelect = document.getElementById("place-select");

        // Clear current options
        placeSelect.innerHTML = '<option value="">Select Place</option>';

        if (destinationId && placesByDestination[destinationId]) {
            placesByDestination[destinationId].forEach((place) => {
                const option = document.createElement("option");
                option.value = place.id;
                option.textContent = place.name;
                placeSelect.appendChild(option);
            });
        }
    });

function previewImage(input) {
    if (input.files && input.files[0]) {
        const container = input.closest(".mb-2");
        const preview = container.querySelector(".preview-image");

        if (preview) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
}

function addGalleryInput(isEdit = false) {
    const container = document.querySelector(".gallery-inputs");
    const div = document.createElement("div");
    div.className = "mb-2";

    const galleryInputName = isEdit ? "new_gallery[]" : "gallery[]";

    div.innerHTML = `
    <div class="d-flex">
        <input type="file" name="${galleryInputName}" class="form-control" accept="image/*" onchange="previewImage(this)">
        <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeGalleryInput(this)">Remove</button>
    </div>
    <img class="preview-image mt-2" style="max-width: 100px; display: none;">
`;
    container.appendChild(div);
    updateGalleryRemoveButtons();
}

function removeGalleryInput(button) {
    button.closest(".mb-2").remove();
    updateGalleryRemoveButtons();
}

function updateGalleryRemoveButtons() {
    const removeButtons = document.querySelectorAll(
        ".gallery-inputs .btn-danger",
    );
    removeButtons.forEach((button) => {
        button.style.display = "block";
    });
}

// Initialize event listeners
document.addEventListener("DOMContentLoaded", function () {
    // Check if we're in edit mode
    const isEdit =
        document.querySelector('input[name="new_gallery[]"]') !== null;

    const galleryInputSelector = isEdit
        ? 'input[name="new_gallery[]"]'
        : 'input[name="gallery[]"]';

    document.querySelectorAll(galleryInputSelector).forEach((input) => {
        input.addEventListener("change", function () {
            previewImage(this);
            updateGalleryRemoveButtons();
        });
    });
});

function updateEndDate(startDateInput) {
    const tourDuration =
        parseInt(document.querySelector('input[name="tour_duration"]').value) ||
        0;
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(startDate);
    endDate.setDate(startDate.getDate() + tourDuration);

    const endDateInput = startDateInput
        .closest(".row")
        .querySelector('input[name*="to_date"]');
    endDateInput.value = endDate.toISOString().split("T")[0];
}

function addDepartureSection() {
    departureCount = document.querySelectorAll(".departure-section").length + 1;
    const container = document.getElementById("departures-container");
    const template = `
    <div class="departure-section mb-2">
        <div class="row">
            <div class="col-md-5">
                <input type="date" name="departures[${departureCount - 1}][from_date]" class="form-control" required onchange="updateEndDate(this)">
            </div>
            <div class="col-md-5">
                <input type="date" name="departures[${departureCount - 1}][to_date]" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm w-100" onclick="removeDepartureSection(this)">Remove</button>
            </div>
        </div>
    </div>
`;
    container.insertAdjacentHTML("beforeend", template);

    // Show remove buttons if there's more than one departure
    updateRemoveButtons();
}

function removeDepartureSection(button) {
    button.closest(".departure-section").remove();

    // Update departure numbers
    document
        .querySelectorAll(".departure-section")
        .forEach((section, index) => {
            updateInputNames(section, index);
        });

    // Update remove buttons visibility
    updateRemoveButtons();
}

function updateRemoveButtons() {
    const removeButtons = document.querySelectorAll(
        ".departure-section .btn-danger",
    );
    removeButtons.forEach((button) => {
        button.style.display =
            document.querySelectorAll(".departure-section").length > 1
                ? "block"
                : "none";
    });
}

function updateInputNames(section, index) {
    section.querySelectorAll('input[name*="departures"]').forEach((input) => {
        const name = input.getAttribute("name");
        input.setAttribute(
            "name",
            name.replace(/departures\[\d+\]/, `departures[${index}]`),
        );
    });
}
