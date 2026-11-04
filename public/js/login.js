document
    .querySelector("#loginForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const form = event.target;
        const url = form.dataset.url;

        const formData = new FormData(form);

        document.getElementById("loadingSpinner").classList.remove("d-none");
        document.getElementById("buttonText").classList.add("d-none");
        document.getElementById("submitLogin").disabled = true;
        document.getElementById("loadingText").classList.remove("d-none");

        axios
            .post(url, formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        ?.getAttribute("content"),
                },
            })
            .then((response) => {
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: response.data.message || "Login berhasil.",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    window.location.href = "/admin/profile";
                });
            })
            .catch((error) => {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: error.response?.data?.message || "Login gagal.",
                });
            })
            .finally(() => {
                document
                    .getElementById("loadingSpinner")
                    .classList.add("d-none");
                document
                    .getElementById("buttonText")
                    .classList.remove("d-none");
                document.getElementById("submitLogin").disabled = false;
                document.getElementById("loadingText").classList.add("d-none");
            });
    });
