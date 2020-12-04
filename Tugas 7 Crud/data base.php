<?php
    include_once 'dbh.inc.php';
?>

<!doctype html>
<html>
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
        <?php
            $sql = "SELECT * FROM data;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            if ($resultCheck > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    echo $row['Nama'];
                }
            }
        ?>
    </body>
</html>