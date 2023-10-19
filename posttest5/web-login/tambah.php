<?php
require '../web-login/koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $judul_anime = $_POST['judul_anime'];
    $umur = $_POST['umur'];
    $genre = $_POST['genre'];

    $img = $_FILES['gambar']['name'];
    $explode = explode(',',$img);
    $ekstensi = strtolower(end($explode));
    $gambar_baru = "$nama.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if(move_uploaded_file($tmp,'../assets'.$gambar_baru)){
        $result = mysqli_query($conn, "INSERT INTO character_anime (id, nama, judul_anime, umur, genre, gambar)
        VALUES('','$nama','$judul_anime','$umur','$genre','$gambar_baru')");

        if($result){
            echo "<script>
            alert('Data berhasil ditambahkan');
            window.location='dashboard.php'</script>";
        }else{
            echo "<script>
            alert('Data gagal ditambahkan');
            window.location='dashboard.php'</script>";
        }
    }else{
        echo "<script>
        alert('Gambar gagal diupload')";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Tambah Data</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="textfield">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="textfield">
                <label for="fakultas">Fakultas</label>
                <input type="text" name="fakultas" class="textfield">
                <label for="prodi">Program studi</label>
                <input type="text" name="prodi" class="textfield">
                <label for="gambar">Upload Gambar</label>
                <input type="file" name="gambar" class="textfield">
                <input type="submit" name="tambah" value="Tambah Data" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>