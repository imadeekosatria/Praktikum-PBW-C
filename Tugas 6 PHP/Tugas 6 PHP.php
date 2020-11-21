<!DOCTYPE html>
<html lang="id-ID">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="CSS/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="CSS/mycss.css">
        <title>Tugas 6 PHP</title>
    </head>
    <body>
        <div class="container">
            <div class="text-center">
                <img src="images/back.jpg" class="rounded" alt="back">
                <h1 style="text-align: center;">Nilai Akhir Mahasiswa</h1>
            </div><br>
            <div class="row">
                <div class="col-sm-8">
                    <h5>Input Data Anda</h5><br>
                    <?php
                        // var kosong
                        $namaErr = $nimErr = $genderErr = $tugasErr = $utsErr = $uasErr = "";
                        $nama = $nim = $gender = $tugas = $uts = $uas = "";
                        $nilai = 0;
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["nama"])) {
                                $namaErr = "Nama dibutuhkan";
                            } else {
                                $nama = test_input($_POST["nama"]);
                                // untuk check nama
                                if (!preg_match("/^[a-zA-Z-' ]*$/",$nama)) {
                                    $nameErr = "Hanya huruf dan spasi yang diizinkan";
                                }
                            }
  
                            if (empty($_POST["nim"])) {
                                $nimErr = "NIM dibuhkan";
                            } else{
                               $nim = $_POST["nim"];
                            }
                            
                            if (empty($_POST["gender"])) {
                                $genderErr = "Jenis Kelamin Harap Diisi";
                            } else {
                                $gender = test_input($_POST["gender"]);
                            }

                            if (empty($_POST["tugas"])){
                                $tugasErr = "Masukkan Nilai Tugas";
                            } else{
                                $tugas = $_POST["tugas"];
                                $nilai += ($tugas)/3;
                            }

                            if (empty($_POST["uts"])){
                                $utsErr = "Masukkan Nilai UTS";
                            } else{
                                $uts = $_POST["uts"];
                                $nilai += ($uts)/3;
                            }

                            if (empty($_POST["uas"])){
                                $uasErr = "Masukkan Nilai UAS";
                            } else{
                                $uas = $_POST["uas"];
                                $nilai += ($uas)/3;
                            }
                        }

                        function test_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }
                    ?>
                    <p><span class="wajib">* wajib diisi</span></p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="form-group col-md-6 row">
                                <input class="form-control" type="text" name="nama" value="<?php echo $nama;?>"><br>
                                <span class="wajib">* <?php echo $namaErr;?></span>
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="form-group col-md-6 row">
                                <input class="form-control" type="number" name="nim" value="<?php echo $nim;?>"><br>
                                <span class="wajib">* <?php echo $nimErr;?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class ="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" <?php if (isset($gender) && $gender=="Wanita") echo "checked";?> value="Pria">Pria
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" <?php if (isset($gender) && $gender=="Pria") echo "checked";?> value="Wanita">Wanita 
                                <span class="wajib">* <?php echo $genderErr;?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="tugas">Nilai Tugas</label>
                            <div class="form-group col-md-6 row">
                                <input class="form-control" type="number" name="tugas" value="<?php echo $tugas;?>"><br>
                                <span class="wajib">* <?php echo $tugasErr;?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="uts">Nilai UTS</label>
                            <div class="form-group col-md-6 row">
                                <input class="form-control" type="number" name="uts" value="<?php echo $uts;?>"><br>
                                <span class="wajib">* <?php echo $utsErr;?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="uas">Nilai UAS</label>
                            <div class="form-group col-md-6 row">
                                <input class="form-control" type="number" name="uas" value="<?php echo $uas;?>"><br>
                                <span class="wajib">* <?php echo $uasErr;?></span>
                            </div>
                        </div>
                        <input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Submit">  
                    </form>
                </div>
                <div class="col-sm-4">
                    <h5>Nilai Akhir Anda</h5>
                    <?php
                        $grade = "";
                        if ($nilai!=0){
                            echo $nilai = number_format($nilai,2);
                            echo "<br>";
                            if ($nilai >= 80){
                                $grade = "A";
                                echo "Anda lulus dengan predikat A";
                            }elseif ($nilai >= 70){
                                $grade = "B";
                                echo "Anda lulus dengan predikat B";
                            }elseif ($nilai >= 60){
                                $grade = "C";
                                echo "Anda lulus dengan predikat C";
                            }else{
                                $grade = "Anda tidak lulus";
                                echo "<br>";
                                echo "Nilai ambang batas kelulusan adalah 60";
                            }
                        }
                    ?>
                    <br><br>
                    <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DWSwoxNySMdrh" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
        </div>
    </body>
</html>