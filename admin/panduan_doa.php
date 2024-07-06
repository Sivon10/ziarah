<h2>Panduan Doa</h2>
<hr color="black">

<table class="table table-bordered table-responsive-md">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Nama File</th>
            <th>Ekstensi</th>
            <th>Size</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        function koneksiDB()
        {

            $host = "localhost";
            $username = "root";
            $password = "";
            $db = "toko";

            $conn = mysqli_connect($host, $username, $password, $db);

            if (!$conn) {
                die("Koneksi Database Gagal : " . mysqli_connect_error());
            } else {
                return $conn;
            }
        }

        function selectAllData()
        {
            $query = "SELECT * FROM panduan";
            $result = mysqli_query(koneksiDB(), $query);
            return $result;
        }

        function insertData($data)
        {
            $query = "INSERT INTO panduan VALUES ('" . $data['kode_buku'] . "','" . $data['nama_buku'] . "','" . $data['title'] . "','" . $data['size'] . "','" . $data['ekstensi'] . "','" . $data['berkas'] . "') ";

            $result = mysqli_query(koneksiDB(), $query);

            if (!$result) {
                return 0;
            } else {
                return 1;
            }
        }

        $nomor_urut = 0;
        $result = selectAllData();
        $countData = mysqli_num_rows($result);

        if ($countData < 1) {
        ?>
            <tr>
                <td colspan="5" style="text-align: center; font-weight: bold; font-size: 12px; padding: 5px; color: red">TIDAK ADA DATA</td>
            </tr>

            <?php
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $nomor_urut = $nomor_urut + 1;
            ?>
                <tr>
                    <td><?php echo $nomor_urut; ?></td>
                    <td><?php echo $row['kode_buku']; ?></td>
                    <td><?php echo $row['nama_buku']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo strtoupper($row['ekstensi']) ?></td>
                    <td><?php echo number_format($row['size'] / (1024 * 1024), 2) ?>MB</td>
                    <td><a href="index.php?halaman=hapuspanduan&kode_buku=<?php echo $row['kode_buku']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Hapus</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<a href="index.php?halaman=tambahpanduan" class="btn btn-primary">Tambah Panduan Doa</a>