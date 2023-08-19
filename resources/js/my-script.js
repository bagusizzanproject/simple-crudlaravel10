document.addEventListener("DOMContentLoaded", function() {
    let inputFoto = document.getElementById("foto");
    let displayFoto = document.getElementById("displayfoto");

    if (inputFoto) {
        inputFoto.addEventListener("change", previewGambar);

        function previewGambar() {
            const [file] = inputFoto.files;
            displayFoto.src = URL.createObjectURL(file);
        }
    }
});

// agar ketika gambar profil di klik, file upload juga langsung terbuka
// displayGambarProfile.addEventListener("click", () =>
//     inputGambarProfil.click()
// );