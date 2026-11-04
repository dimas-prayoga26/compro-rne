const modalEdit = document.getElementById("modalFormEdit");

modalEdit.addEventListener("show.bs.modal", function (event) {
    const btn = event.relatedTarget;

    document.getElementById("tanggal_awalEdit").value =
        btn.dataset.tanggal_awal;

    document.getElementById("tanggal_akhirEdit").value =
        btn.dataset.tanggal_akhir;

    document.getElementById("jenisBBMEdit").value = btn.dataset.jenis;

    document.getElementById("harga_1Edit").value = btn.dataset.harga_1;
    document.getElementById("harga_2Edit").value = btn.dataset.harga_2;
    document.getElementById("harga_3Edit").value = btn.dataset.harga_3;
    document.getElementById("harga_4Edit").value = btn.dataset.harga_4;

    document.getElementById("formHargaEdit").dataset.url = btn.dataset.url;
});

// ================= ADD =================
const formAdd = document.getElementById("formHarga");
const loadingSpinner = document.getElementById("loadingSpinner");
const buttonText = document.getElementById("buttonText");
const loadingText = document.getElementById("loadingText");
const btnSubmit = document.getElementById("btnSubmitHarga");

formAdd?.addEventListener("submit", function (e) {
    e.preventDefault();

    // loading UI
    loadingSpinner.classList.remove("d-none");
    buttonText.classList.add("d-none");
    btnSubmit.disabled = true;
    loadingText.classList.remove("d-none");

    const url = formAdd.dataset.url;
    const formData = new FormData(formAdd);

    axios
        .post(url, formData)
        .then((response) => {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: response.data.message || "Harga berhasil ditambahkan.",
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
        })
        .finally(() => {
            // loading UI
            loadingSpinner.classList.add("d-none");
            buttonText.classList.remove("d-none");
            btnSubmit.disabled = false;
            loadingText.classList.add("d-none");
        });
});

// ================= EDIT =================
const formEdit = document.getElementById("formHargaEdit");
const loadingSpinnerEdit = document.getElementById("loadingSpinnerEdit");
const buttonTextEdit = document.getElementById("buttonTextEdit");
const loadingTextEdit = document.getElementById("loadingTextEdit");
const btnSubmitEdit = document.getElementById("btnSubmitEdit");

formEdit?.addEventListener("submit", function (e) {
    e.preventDefault();

    loadingSpinnerEdit.classList.remove("d-none");
    buttonTextEdit.classList.add("d-none");
    btnSubmitEdit.disabled = true;
    loadingTextEdit.classList.remove("d-none");

    const url = formEdit.dataset.url;
    const formData = new FormData(formEdit);

    // WAJIB untuk Laravel
    formData.append("_method", "PUT");

    axios
        .post(url, formData)
        .then((response) => {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: response.data.message || "Harga berhasil diupdate.",
                timer: 1500,
                showConfirmButton: false,
            }).then(() => location.reload());
        })
        .catch((error) => {
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: error.response?.data?.message || "Terjadi kesalahan.",
            });
        })
        .finally(() => {
            loadingSpinnerEdit.classList.add("d-none");
            buttonTextEdit.classList.remove("d-none");
            btnSubmitEdit.disabled = false;
            loadingTextEdit.classList.add("d-none");
        });
});

// ================= DELETE =================
document.querySelectorAll(".form-delete").forEach((form) => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const url = form.dataset.url;
        const formData = new FormData(form);
        formData.append("_method", "DELETE");

        // loading ON
        const spinner = form.querySelector(".spinner");
        const text = form.querySelector(".text");
        spinner.classList.remove("d-none");
        text.classList.add("d-none");
        form.querySelector(".btn-hapus-harga").disabled = true;

        axios
            .post(url, formData)
            .then((response) => {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: response.data.message || "Harga berhasil dihapus.",
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
            })
            .finally(() => {
                // loading OFF
                spinner.classList.add("d-none");
                text.classList.remove("d-none");
                form.querySelector(".btn-hapus-harga").disabled = false;
            });
    });
});
