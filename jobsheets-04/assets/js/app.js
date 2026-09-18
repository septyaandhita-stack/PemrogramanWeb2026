function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");

    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}


function initHapusConfirm() {
    document.querySelectorAll(".btn-hapus").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const row = btn.closest("tr");
            const nama = row
                ? row.querySelector("td")?.textContent
                : "data ini";

            const yakin = confirm("Yakin ingin menghapus " + nama + "?");

            if (yakin && row) {
                row.remove();
            }
        });
    });
}


function initTableFilter() {
    const input = document.getElementById("search-input");
    const table = document.querySelector("table");

    if (!input || !table) return;

    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();

        table.querySelectorAll("tbody tr").forEach(function (row) {
            const teks = row.textContent.toLowerCase();

            row.style.display = teks.includes(keyword) ? "" : "none";
        });
    });
}


function initValidasiForm() {
    const form = document.getElementById("form-tambah");

    if (!form) return;

    form.addEventListener("submit", function (e) {
        let valid = true;

        const judul = form.querySelector(
            "[name='judul'], [name='nama']"
        );

        if (judul && judul.value.trim() === "") {
            tampilkanError(judul, "Field ini wajib diisi.");
            valid = false;
        }

        if (!valid) {
            e.preventDefault();
        }
    });
}


function tampilkanError(input, pesan) {
    hapusError(input);

    const span = document.createElement("span");
    span.className = "error";
    span.textContent = pesan;

    input.insertAdjacentElement("afterend", span);
}


function hapusError(input) {
    const next = input.nextElementSibling;

    if (next && next.classList.contains("error")) {
        next.remove();
    }
}


document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initHapusConfirm();
    initTableFilter();
    initValidasiForm();
});