<?php
    include "dbh.inc.php";
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['usertype'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $user = validate($_POST['username']);
        $pwd = validate($_POST['password']);
        $type = validate($_POST['usertype']);

        if (empty($user) && empty($pwd)) {
            header("Location: ../index.php?error=username & password required");
            exit();
        }else if(empty($user)){
            header("Location: ../index.php?error=user name is required");
            exit();
        }elseif (empty($pwd)) {
            header("Location: ../index.php?error=password is required");
            exit();
        }
        else{
            $sql = "SELECT * FROM user WHERE username='$user' AND password='$pwd'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $user && $row['password'] === $pwd && $row['typeuser'] === $type) {
                    if ($row['typeuser'] === 'admin') {
                        session_start();
                        $_SESSION['username'] = $row=['username'];
                        $_SESSION['typeuser'] = $row=['typeuser'];
                        $_SESSION['id'] = $row=['id'];
                        header("Location: ../data base admin.php");
                        exit(); 
                    }elseif($row['typeuser'] === 'user'){
                        session_start();
                        $_SESSION['username'] = $row=['username'];
                        $_SESSION['typeuser'] = $row=['typeuser'];
                        $_SESSION['id'] = $row=['id'];
                        header("Location: ../data base user.php");
                        exit();
                    }else{
                        header("Location: ../index.php?error=wrong usertype");
                        exit();
                    }
                }
            }else{
                header("Location: ../index.php?error=incorrect username and password");
                exit();
            }
        }
    }else{
        header("Location: ../index.php?error=no user");
        exit();
    }
?>