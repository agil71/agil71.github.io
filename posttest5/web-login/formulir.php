<?php
// $host       = "localhost";
// $user       = "root";
// $pass       = "";
// $age        = "";
// $db         = "bio_anime";

// $conn    = mysqli_connect($host, $user, $pass, $age, $db);
// if (!$conn) { 
//     die("Tidak bisa terkoneksi ke database");
// }

require '../web-login/koneksi.php';

$nama        = "";
$judul_anime       = "";
$umur   = "";
$gender   = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from character_anime where id = '$id'";
    $q1         = mysqli_query($conn,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from character_anime where id = '$id'";
    $q1         = mysqli_query($conn, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama        = $r1['nama'];
    $judul_anime       = $r1['judul_anime'];
    $umur    = $r1['umur'];
    $gender   = $r1['gender'];

    if ($nama == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { 
    $nama        = $_POST['nama'];
    $judul_anime      = $_POST['judul_anime'];
    $umur     = $_POST['umur'];
    $gender   = $_POST['gender'];

    if ($nama && $judul_anime && $umur && $gender) {
        if ($op == 'edit') { 
            $sql1       = "update character_anime set nama = '$nama',judul_anime='$judul_anime',umur = '$umur',gender='$gender' where id = '$id'";
            $q1         = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { 
            $sql1   = "insert into character_anime(nama,judul_anime,umur,gender) values ('$nama','$judul_anime','$umur','$gender')";
            $q1     = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bio character anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=formulir.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=formulir.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul_anime" class="col-sm-2 col-form-label">judul_anime</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul_anime" name="judul_anime" value="<?php echo $judul_anime ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="umur" name="umur" value="<?php echo $umur ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="gender" id="gender">
                                <option value="">- Pilih gender -</option>
                                <option value="male" <?php if ($gender == "male") echo "selected" ?>>male</option>
                                <option value="female" <?php if ($gender == "female") echo "selected" ?>>female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                List Anime Character
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Anime Title</th>
                            <th scope="col">Age</th>
                            <th scope="col">gender</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from character_anime order by id desc";
                        $q2     = mysqli_query($conn, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $nama        = $r2['nama'];
                            $judul_anime       = $r2['judul_anime'];
                            $umur               = $r2['umur'];
                            $gender   = $r2['gender'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $judul_anime ?></td>
                                <td scope="row"><?php echo $umur ?></td>
                                <td scope="row"><?php echo $gender ?></td>
                                <td scope="row">
                                    <a href="formulir.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="formulir.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html>