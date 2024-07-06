<?Php

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

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$namaFile = $_FILES['berkas']['name'];
$x = explode('.', $namaFile);
$ekstensiFile = strtolower(end($x));
$ukuranFile    = $_FILES['berkas']['size'];
$file_tmp = $_FILES['berkas']['tmp_name'];

// Lokasi Penempatan file
$dirUpload = "../foto_produk/";
$linkBerkas = $dirUpload . $namaFile;

// Menyimpan file
$terupload = move_uploaded_file($file_tmp, $linkBerkas);

$dataArr = array(
    'kode_buku' => $kode,
    'nama_buku' => $nama,
    'title' => $namaFile,
    'size' => $ukuranFile,
    'ekstensi' => $ekstensiFile,
    'berkas' => $linkBerkas,
);

if ($terupload && (insertData($dataArr) == 1)) {
    echo "<br><div class='alert alert-info'>Data tersimpan</div>";
    header("Location:index.php?halaman=panduan_doa");
    exit();
} else {
    echo "Upload Gagal!";
    header("Location:index.php?halaman=tambahpanduan");
    exit();
}
