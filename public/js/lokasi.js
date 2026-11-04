// Inisialisasi peta
var map = L.map("map", {
    center: [-3.5, 120], // pusat Indonesia
    zoom: 5,
    zoomControl: true,
    attributionControl: true, // wajib tampil sesuai ketentuan Google Maps
});

const mapContainer = document.getElementById("map");
const googleApiKey = mapContainer.dataset.googleApiKey;

// Gunakan tile Google Maps (Map Tiles API) dengan gaya minimalis tanpa label
fetch(`https://tile.googleapis.com/v1/createSession?key=${googleApiKey}`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
        mapType: "roadmap",
        language: "id-ID",
        region: "ID",
        styles: [
            { elementType: "labels", stylers: [{ visibility: "off" }] },
            { elementType: "geometry", stylers: [{ color: "#f5f5f3" }] },
            {
                featureType: "administrative.country",
                elementType: "geometry.stroke",
                stylers: [{ color: "#c4c9cf" }],
            },
            { featureType: "road", stylers: [{ visibility: "off" }] },
            { featureType: "poi", stylers: [{ visibility: "off" }] },
            { featureType: "transit", stylers: [{ visibility: "off" }] },
            {
                featureType: "water",
                elementType: "geometry",
                stylers: [{ color: "#d4dadc" }],
            },
        ],
    }),
})
    .then((res) => {
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        return res.json();
    })
    .then(({ session }) => {
        L.tileLayer(
            `https://tile.googleapis.com/v1/2dtiles/{z}/{x}/{y}?session=${session}&key=${googleApiKey}`,
            {
                attribution: "&copy; Google",
                maxZoom: 19,
            },
        ).addTo(map);
    })
    .catch((error) => console.error("Gagal memuat Google Map Tiles:", error));

// Cek apakah perangkat adalah mobile
const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

// Simpan popup aktif agar bisa ditutup saat buka yang baru
let activePopup = null;

const rawLocations = JSON.parse(mapContainer.dataset.location);

const locations = rawLocations.map((item) => ({
    name: item.wilayah,
    coords: [parseFloat(item.latitude), parseFloat(item.longitude)],
}));

// Tambahkan marker per lokasi
locations.forEach((loc) => {
    const marker = L.circleMarker(loc.coords, {
        radius: 8,
        color: "#E7C00F",
        fillColor: "#00307A",
        fillOpacity: 0.9,
        weight: 1.6,
    }).addTo(map);

    const popup = L.popup({
        closeButton: false, // Hapus tombol X
        autoClose: false,
        closeOnClick: false,
        offset: [0, -8],
    }).setContent(`<strong>${loc.name}</strong>`);

    // MOBILE → buka saat diklik
    if (isMobile) {
        marker.on("click", () => {
            if (activePopup) {
                map.closePopup(activePopup);
            }
            marker.bindPopup(popup).openPopup();
            activePopup = popup;
        });
    } else {
        // DESKTOP → buka saat hover
        marker.on("mouseover", () => {
            marker.bindPopup(popup).openPopup();
        });
        marker.on("mouseout", () => {
            marker.closePopup();
        });
    }
});

const formTambah = document.getElementById("tambah-lokasi");
const loadingSpinner = document.getElementById("loadingSpinner");
const buttonText = document.getElementById("buttonText");
const loadingText = document.getElementById("loadingText");
const btnSubmit = document.getElementById("btn-submit");

if (formTambah) {
    formTambah.addEventListener("submit", function (e) {
        e.preventDefault();

        loadingSpinner.classList.remove("d-none");
        buttonText.classList.add("d-none");
        loadingText.classList.remove("d-none");
        btnSubmit.disabled = true;

        const formData = new FormData(formTambah);
        const url = formTambah.dataset.url;

        axios
            .post(url, formData)
            .then((response) => {
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text:
                        response.data.message || "Lokasi berhasil ditambahkan.",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    location.reload();
                });
            })
            .catch((error) => {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: error.response?.data?.message || "Terjadi kesalahan.",
                });

                console.log(error);
            })
            .finally(() => {
                loadingSpinner.classList.add("d-none");
                buttonText.classList.remove("d-none");
                loadingText.classList.add("d-none");
                btnSubmit.disabled = false;
            });
    });
}

const editLokasi = document.getElementById("edit-lokasi");
const btnEditSubmit = document.getElementById("btn-edit-submit");

const loadingSpinnerEdit = document.getElementById("loadingSpinnerEdit");
const buttonTextEdit = document.getElementById("buttonTextEdit");
const loadingTextEdit = document.getElementById("loadingTextEdit");

document.querySelectorAll(".btn-edit").forEach((btn) => {
    btn.addEventListener("click", () => {
        document.getElementById("wilayahRNEEdit").value = btn.dataset.wilayah;
        document.getElementById("latitudeRNEEdit").value = btn.dataset.latitude;
        document.getElementById("longitudeRNEEdit").value =
            btn.dataset.longitude;

        editLokasi.dataset.url = btn.dataset.url;
    });
});

if (editLokasi) {
    editLokasi.addEventListener("submit", function (e) {
        e.preventDefault();

        loadingSpinnerEdit.classList.remove("d-none");
        buttonTextEdit.classList.add("d-none");
        loadingTextEdit.classList.remove("d-none");
        btnEditSubmit.disabled = true;

        const formData = new FormData(editLokasi);
        const url = editLokasi.dataset.url;

        axios
            .post(url, formData)
            .then((response) => {
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: response.data.message || "Lokasi berhasil diubah.",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    location.reload();
                });
            })
            .catch((error) => {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: error.response?.data?.message || "Terjadi kesalahan.",
                });

                console.log(error);
            })
            .finally(() => {
                loadingSpinnerEdit.classList.add("d-none");
                buttonTextEdit.classList.remove("d-none");
                loadingTextEdit.classList.add("d-none");
                btnEditSubmit.disabled = false;
            });
    });
}

document.querySelectorAll(".form-hapus").forEach((form) => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const btn = form.querySelector(".btn-hapus");
        const spinner = form.querySelector(".spinner");
        const text = form.querySelector(".text");

        const formData = new FormData(form);
        formData.append("_method", "DELETE");

        const url = form.dataset.url;

        // loading ON
        spinner.classList.remove("d-none");
        text.classList.add("d-none");
        btn.disabled = true;

        axios
            .post(url, formData)
            .then((res) => {
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: res.data.message || "Berhasil dihapus",
                    timer: 1500,
                    showConfirmButton: false,
                }).then(() => location.reload());
            })
            .catch((err) => {
                Swal.fire("Gagal", "Terjadi kesalahan", "error");
                // console.log(err);
            })
            .finally(() => {
                spinner.classList.add("d-none");
                text.classList.remove("d-none");
                btn.disabled = false;
            });
    });
});
