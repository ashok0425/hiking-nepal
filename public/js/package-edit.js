ClassicEditor.create(document.querySelector("#overview-editor"), {
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

function addGalleryInput() {
    const container = document.querySelector(".gallery-inputs");
    const div = document.createElement("div");
    div.className = "mb-2";
    div.innerHTML = `
<div class="d-flex">
<input type="file" name="new_gallery[]" class="form-control" accept="image/*" onchange="previewImage(this)">
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
    const galleryInputs = document.querySelectorAll(".gallery-inputs .mb-2");
    const removeButtons = document.querySelectorAll(
        ".gallery-inputs .btn-danger",
    );
    removeButtons.forEach((button) => {
        button.style.display = "block";
    });
}

// Initialize event listeners
document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll('input[name="new_gallery[]"]')
        .forEach((input) => {
            input.addEventListener("change", function () {
                previewImage(this);
                updateGalleryRemoveButtons();
            });
        });
});

function addDepartureSection() {
    departureCount++;
    const container = document.getElementById("departures-container");
    const template = `
    <div class="departure-section border rounded p-3 mb-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0">Departure #${departureCount}</h6>
            <button type="button" class="btn btn-danger btn-sm" onclick="removeDepartureSection(this)">Remove</button>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>From Date</label>
                    <input type="date" name="departures[${departureCount - 1}][from_date]" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>To Date</label>
                    <input type="date" name="departures[${departureCount - 1}][to_date]" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="form-group mt-2">
            <label>Available Days</label>
            <div class="d-flex flex-wrap">
                ${[
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                    "Sunday",
                ]
                    .map(
                        (day) => `
                        <div class="form-check me-3">
                            <input class="form-check-input" type="checkbox"
                                    name="departures[${departureCount - 1}][days][]"
                                    value="${day.toLowerCase()}">
                            <label class="form-check-label mr-2">${day}</label>
                        </div>
                    `,
                    )
                    .join("")}
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
    departureCount--;

    // Update departure numbers
    document
        .querySelectorAll(".departure-section")
        .forEach((section, index) => {
            section.querySelector("h6").textContent = `Departure #${index + 1}`;
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
