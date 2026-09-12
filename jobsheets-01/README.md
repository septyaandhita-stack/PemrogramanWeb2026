6.5 Latihan Reflektif

Sebagai latihan mandiri, coba bandingkan sendiri form ini dengan form buku dan jawab pertanyaan berikut untuk menguji pemahaman:
1. Kenapa field "Alamat" dan "No. HP" tidak diberi required, sedangkan "Nama" dan "No. 
Anggota" diberi?
JAWAB: 
	Required artinya field wajib diisi. Field “Alamat” dan “No. Hp” tidak diberi required karena data tersebut bersifat opsional jadi tidak wajib diisi atau boleh dikosongkan. Sedangkan field ”Nama” dan ”No. Anggota” diberi required karena data tersebut wajib diisi untuk identitas anggota, jika tidak diisi browser akan memberi peringatan.
2. Apa yang akan terjadi (di browser) kalau kamu klik tombol "Simpan" tanpa mengisi field "Nama"? Coba buka filenya di browser dan praktikkan.
JAWAB: 
    Form tidak dapat dikirim dan browser akan memberi peringatan untuk mengisi field ”Nama” terlebih dahulu. Hal ini karena field “Nama” diberi atribut required, sehingga field tersebut wajib diisi.
3. Form ini juga belum punya action pada tag <form>-nya — apa dampaknya saat tombol "Simpan" ditekan
JAWAB: 
    Dampaknnya adalah data form tidak dikirim ke tujuan tertentu karena belum ada action pada tag <form>. Sehingga, data yang diisi belum dapat diproses atau belum dapat ditampilkan pada halaman Daftar Anggota.

7.4 Latihan

1. Lengkapi konsistensi menu — tambahkan tautan "Daftar Anggota" dan "Tambah Anggota" ke menu <nav> di index.html, buku/list.html, dan buku/tambah.html (lihat catatan di dokumentasi anggota/list.html §5.4).
JAWAB: 

    -- index.html --
    <nav>
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="buku.list"Daftar Buku</a></li>
                <li><a href="buku/tambah.html"Tambah Buku</a></li>
                <li><a href="anggota/list.html"Daftar Anggota</a></li>
                <li><a href="../anggota/tambah.html"Tambah Anggota</a></li>
            </ul>
        </nav>
    -- list.html -- buku
    <nav>
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="buku.list"Daftar Buku</a></li>
                <li><a href="buku/tambah.html"Tambah Buku</a></li>
                <li><a href="anggota/list.html"Daftar Anggota</a></li>
                <li><a href="../anggota/tambah.html"Tambah Anggota</a></li>
            </ul>
        </nav>
    -- tambah.html -- buku
    <nav>
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="buku.list"Daftar Buku</a></li>
                <li><a href="buku/tambah.html"Tambah Buku</a></li>
                <li><a href="anggota/list.html"Daftar Anggota</a></li>
                <li><a href="../anggota/tambah.html"Tambah Anggota</a></li>
            </ul>
        </nav>
2. Tambah 3 baris data buku baru di buku/list.html dengan meng-copy satu blok <tr>...</tr> lalu mengganti isinya.
JAWAB: 
    <tr>
                        <td>Negeri Para Bedebah</td>
                        <td>Tere Liye</td>
                        <td>2017</td>
                        <td>7</td>
                        <td>
                            <button type="button">Edit</button>
                            <button type="button">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Cantik Itu Luka</td>
                        <td>Eka Kurniawan</td>
                        <td>2002</td>
                        <td>3</td>
                        <td>
                            <button type="button">Edit</button>
                            <button type="button">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Pulang</td>
                        <td>Tere Liye</td>
                        <td>2015</td>
                        <td>6</td>
                        <td>
                            <button type="button">Edit</button>
                            <button type="button">Hapus</button>
                        </td>
                    </tr>
3. Tambah kolom baru di tabel anggota, misalnya "Jenis Kelamin", lengkap dengan <th> dan <td>-nya di setiap baris.
JAWAB: 
    <table>
                <thead>
                    <tr>
                        <th>No. Anggota</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A001</td>
                        <td>Siti Aminah</td>
                        <td>Malang</td>
                        <td>0812xxxx</td>
                        <td>Perempuan</td>
                        <td>
                            <button type="button">Edit</button>
                            <button type="button">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>A002</td>
                        <td>Budi Santoso</td>
                        <td>Batu</td>
                        <td>0813xxxx</td>
                        <td>Laki-laki</td>
                        <td>
                            <button type="button">Edit</button>
                            <button type="button">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
4. Tambah field baru di form tambah anggota, misalnya "Email" memakai <input type="email"> (type="email" otomatis memvalidasi format alamat email tanpa perlu JavaScript tambahan).
JAWAB: 
    <p>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email">
                </p>

LINK GITHUB: https://github.com/septyaandhita-stack/PemrogramanWeb2026 
