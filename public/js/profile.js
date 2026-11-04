document
    .getElementById("profileForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const form = event.target;
        const url = form.dataset.url;

        const formData = new FormData(form);

        for (let pair of formData.entries()) {
            console.log(pair[0] + ": " + pair[1]);
        }

        // loading UI
        document.getElementById("loadingSpinner").classList.remove("d-none");
        document.getElementById("buttonText").classList.add("d-none");
        document.getElementById("submitProfile").disabled = true;
        document.getElementById("loadingText").classList.remove("d-none");

        axios
            .post(url, formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    "X-HTTP-Method-Override": "PUT",
                },
            })
            .then((response) => {
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text:
                        response.data.message || "Profil berhasil diperbarui.",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    location.reload();
                });
            })
            .catch((error) => {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: error.response?.data?.message || "Terjadi kesalahan.",
                    showConfirmButton: false,
                    timer: 1500,
                });
            })
            .finally(() => {
                document
                    .getElementById("loadingSpinner")
                    .classList.add("d-none");
                document
                    .getElementById("buttonText")
                    .classList.remove("d-none");
                document.getElementById("loadingText").classList.add("d-none");
                document.getElementById("submitProfile").disabled = false;
            });
    });
