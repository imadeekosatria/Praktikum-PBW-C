<?php
    include "includes/db.inc.php";
    //Untuk Tombol Simpan
    if (isset($_POST['simpan'])) {
      //Pengujian data di edit atau di simpan baru
      if ($_GET['hal'] == "edit") {
        //data akan di edit
        $edit = mysqli_query($conn, "UPDATE `mhs` SET nim='$_POST[tnim]', nama='$_POST[tnama]',alamat='$_POST[talamat]' WHERE nim = '$_GET[id]'");
        if ($edit) {//Jika Edit sukses
          echo "<script>
                    alert('Edit data sukses!'); 
                    document.location='data base admin.php';
                </script>";
        }else{//Jika Edit Gagal
          echo "<script>
                    alert('Edit data GAGAL!! ^_^'); 
                    document.location='data base admin.php';
                </script>";
        }
      }else {
        //data akan di simpan baru
        $simpan = mysqli_query($conn, "INSERT INTO `mhs`(`nim`, `nama`, `alamat`) VALUES ('$_POST[tnim]','$_POST[tnama]','$_POST[talamat]')");
        if ($simpan) {//Jika Simpan sukses
            echo "<script>
                    alert('Simpan data sukses!'); 
                    document.location='data base admin.php';
                  </script>";
        }else{//Jika simpan Gagal
            echo "<script>
                    alert('Simpan data GAGAL!! ^_^'); 
                    document.location='data base admin.php';
                    </script>";
        }
      }


      
    }

    //Pengujian tombol edit di klik
    if (isset($_GET['hal'])) {
      //Pengujian jika edit data
      if ($_GET['hal'] == "edit") {
          //tampilkan data yang di edit
          $tampil = mysqli_query($conn, "SELECT * FROM mhs WHERE nim = '$_GET[id]'");
          $data = mysqli_fetch_array($tampil);
          if ($data) {
            //jika data ditemukan, maka data di tampung ke dalam variabel
            $vnim = $data['nim'];
            $vnama = $data['nama'];
            $valamat = $data['alamat'];
          }
      }else if ($_GET['hal'] == "hapus"){
          $hapus = mysqli_query($conn, "DELETE FROM `mhs` WHERE nim = '$_GET[id]'");
          if ($hapus) {
             echo "<script>
                    alert('Hapus data sukses!'); 
                    document.location='data base admin.php';
                    </script>";
          }else{
            echo "<script>
                    alert('Hapus data GAGAL!! ^_^'); 
                    document.location='data base admin.php';
                    </script>";
        }
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/mycss.css">
        <title>Data Base</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link colink" href="login.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Data Base</a>
                </li>
                </ul>
                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>     
        </nav>
        <!--Batas Nav Bar-->

        <!--Main Content-->
        <div class="container">
            <h1 class="text-center text-white">Data Base</h1>
            <!--Awal Card Form-->
            <div class="card">
                <div class="card-header bg-primary text-white">
                  Input Data 
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                      <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" onkeypress="return onlyNumberKey(event)" value="<?=@$vnim?>" name="tnim" class="form-control" placeholder="Input NIM anda di sini" required>
                      </div>
                      <div class="form-group">
                        <label for="nim">Nama</label>
                        <input type="text" value="<?=@$vnama?>"name="tnama" class="form-control" placeholder="Input Nama anda di sini" required>
                      </div>
                      <div class="form-group">
                        <label for="nim">Alamat</label>
                        <textarea name="talamat" id="alt" class="form-control" placeholder="Input Alamat anda disini"><?=@$valamat?></textarea>
                      </div>

                      <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                      <button type="reset" class="btn btn-dark" name="reset">Reset</button>
                  </form>
                </div>
            </div>
            <!--Akhir Card Form-->

            <!--Awal Card Table-->
            <div class="card">
                <div class="card-header bg-secondary text-white">
                  Daftar Mahasiswa
                </div>
                <table class="table table-bordered table-striped">
                    <tr class="text-center">
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $no = 1;
                        $tampil = mysqli_query($conn, "SELECT * FROM mhs order by nim asc");
                        while ($data = mysqli_fetch_array($tampil)):

                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data['nim']?></td>
                        <td><?=$data['nama']?></td>
                        <td><?=$data['alamat']?></td>
                        <td class="text-center">
                          <a href="data base admin.php?hal=edit&id=<?=$data['nim']?>" class="btn btn-outline-primary">Edit</a>
                          <a href="data base admin.php?hal=hapus&id=<?=$data['nim']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini ?')" class="btn btn-outline-dark">Hapus</a>
                        </td>
                    </tr>
                        <?php endwhile; //Penutup While ?> 
                </table>
            </div>
            <!--Akhir Card Table-->
        </div>
        <script> 
              function onlyNumberKey(evt) { 
                  // Only ASCII charactar in that range allowed 
                  var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
                  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
                  return false; 
                  return true; 
              } 
        </script> 
        <script> 
              function detailssubmit() { 
                    alert("Your details were Submitted"); 
              } 
        </script> 
        <script type="text/javascript" src="CSS/bootstrap/js/bootstrap.js"></script>
        
    </body>
</html>


