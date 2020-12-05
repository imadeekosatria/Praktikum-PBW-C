<?php
    require "header.php";
?>

<main>
    <title>Index</title>
    <?php
        if (isset($_SESSION['typeuser'] )){
            echo '<p class="p1">You are logged in!</p>';
        }
        else{
            echo '<p class="p1">You are logged out!</p>';
        }
    ?>    
</main>

