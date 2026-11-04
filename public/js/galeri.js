// ================= DETAIL =================
document.querySelectorAll(".btn-detail").forEach((btn) => {
    btn.addEventListener("click", () => {
        document.getElementById("detailTitle").innerText = btn.dataset.title;
        document.getElementById("detailDesc").innerHTML = btn.dataset.desc;
        document.getElementById("detailImage").src = btn.dataset.image;
    });
});

// ================= EDIT =================
document.querySelectorAll(".btn-edit").forEach((btn) => {
    btn.addEventListener("click", () => {
        document.getElementById("editId").value = btn.dataset.id;
        document.getElementById("editTitle").value = btn.dataset.title;
        document.getElementById("editDesc").value = btn.dataset.desc;

        document.getElementById("formEdit").dataset.url = btn.dataset.url;
    });
});

// ================= ADD =================
const formAdd = document.getElementById("formAdd");
const loadingSpinner = document.getElementById("loadingSpinner");
const buttonText = document.getElementById("buttonText");
const loadingText = document.getElementById("loadingText");
const btnSubmit = document.getElementById("btnAddGaleri");

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
                text: response.data.message || "Galeri berhasil ditambahkan.",
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
const formEdit = document.getElementById("formEdit");
const loadingSpinnerEdit = document.getElementById("loadingSpinnerEdit");
const buttonTextEdit = document.getElementById("buttonTextEdit");
const loadingTextEdit = document.getElementById("loadingTextEdit");
const btnSubmitEdit = document.getElementById("btnEditGaleri");

formEdit?.addEventListener("submit", function (e) {
    e.preventDefault();

    // loading UI
    loadingSpinnerEdit.classList.remove("d-none");
    buttonTextEdit.classList.add("d-none");
    btnSubmitEdit.disabled = true;
    loadingTextEdit.classList.remove("d-none");

    const id = document.getElementById("editId").value;
    const url = formEdit.dataset.url;

    const formData = new FormData(formEdit);

    axios
        .post(url, formData)
        .then((response) => {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: response.data.message || "Galeri berhasil ditambahkan.",
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
        form.querySelector(".btn-delete").disabled = true;

        axios
            .post(url, formData)
            .then((response) => {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text:
                        response.data.message || "Galeri berhasil ditambahkan.",
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
                form.querySelector(".btn-delete").disabled = false;
            });
    });
});
