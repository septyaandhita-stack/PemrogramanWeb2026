1. Viewport & Header Responsif (index.html, buku/*, anggota/*)Seluruh dokumen HTML dilengkapi dengan penanda viewport pada tag <head> agar rasio tampilan layar perangkat disesuaikan secara 1:1:  HTML<meta name="viewport" content="width=device-width, initial-scale=1">
Pada bagian <header>, disusun heading judul aplikasi, checkbox/label untuk hamburger menu, serta tautan navigasi (<nav>):  HTML<header>
    <h1>SIMPUS-Mini</h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">
    <label for="nav-toggle" class="nav-toggle-label">&#9776;</label>
    <nav>
        <ul>
            <li><a href="../index.html">Beranda</a></li>
            ...
        </ul>
    </nav>
</header>

2. Layout Kartu Statistik (index.html)Halaman beranda memanfaatkan tag <section> dan <article> untuk menampilkan ringkasan data statistik (Total Buku, Total Anggota, Sedang Dipinjam). Pada file style.css, bagian ini diatur menggunakan CSS Grid:  CSSmain section:nth-of-type(2) {
    
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

3. Tabel Responsif (buku/list.html & anggota/list.html)Untuk mencegah tabel merusak layout (overflow) pada layar ponsel yang sempit, tabel dibungkus menggunakan pembungkus berkas CSS .table-responsive:  HTML<div class="table-responsive">
    <table> ... </table>
</div>
Style pada style.css:  CSS.table-responsive {
    overflow-x: auto;
}

4. Implementasi Breakpoint Media Queries (style.css)Penyesuaian tata letak dilakukan pada dua breakpoint utama:  Breakpoint Tablet ($\le 768\text{px}$):Grid kartu statistik berubah dari 3 kolom menjadi 2 kolom.  CSS@media (max-width: 768px) 
{
    main section:nth-of-type(2) {
        grid-template-columns: repeat(2, 1fr);
    }
}

5. Breakpoint Mobile ($\le 480\text{px}$):Tombol hamburger disajikan (display: block).  Elemen <nav> disembunyikan secara default dan hanya ditampilkan saat checkbox di centang (:checked).  Kartu statistik berubah menjadi 1 kolom penuh.  Form input melebar 100% mengisi lebar layar.  CSS@media (max-width: 480px) 

@media (max-width: 480px) {
    header {
        position: relative;
    }

    .nav-toggle-label {
        display: block;
    }

    header nav {
        display: none;
        width: 100%;
        order: 3;
        margin-top: 1rem;
    }

    .nav-toggle:checked ~ nav {
        display: block;
    }

    header nav ul {
        flex-direction: column;
        gap: 0.75rem;
    }

    main section:nth-of-type(2) {
        grid-template-columns: 1fr;
    }

    form input,
    form select {
        max-width: 100%;
    }

ANALISIS PENERAPAN PRAKTIKUME
1. fisiensi Tanpa Framework / JavaScript:Teknik checkbox hack membuktikan bahwa navigasi responsif tipe drawer/collapsible menu dapat dibuat murni menggunakan kombinasi elemen HTML <input type="checkbox">, <label>, dan selektor sibling CSS (~) tanpa ketergantungan script JavaScript tambahan.  
2. Kenyamanan Pengguna (UX) pada Perangkat Mobile:Dengan adanya utilitas .table-responsive, data tabel tidak memotong area layar utama, melainkan memberikan batas gulir mendatar (horizontal scrollbar) khusus area tabel.  