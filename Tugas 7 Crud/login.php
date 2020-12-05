<?php
    require "header.php";
?>

<main>
<title>Login</title>
<section class = "Form my-4 mx-5">
        <div class = "container">
            <div class = "row no-gutters">
                <div class = "col-lg-5">
                    <div class="slideshow-container">

                        <div class="mySlides fade">
                          <div class="numbertext">1 / 3</div>
                          <img src="img/mina 1.jpg" style="width:100%" class="img-fluid">
                        </div>
                        
                        <div class="mySlides fade">
                          <div class="numbertext">2 / 3</div>
                          <img src="img/mina 2.jpg" style="width:100%" class="img-fluid">
                        </div>
                        
                        <div class="mySlides fade">
                          <div class="numbertext">3 / 3</div>
                          <img src="img/mina 3.jpg" style="width:100%" class="img-fluid">
                        </div>
                        
                        </div>
                        <br>
                        
                        <div style="text-align:center">
                          <span class="dot"></span> 
                          <span class="dot"></span> 
                          <span class="dot"></span> 
                        </div>
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3" style="color: rgb(255, 46, 185);">Login</h1>
                    <h4 style="color: rgb(255, 46, 185)">Sign into your account</h4>
                    <form action="includes/login.inc.php" method="post"> 
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" name="username" placeholder="username" class="form-control my-3 p-4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" name="password" placeholder="*******" class="form-control my-3 p-4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <label for="usertype">Saya adalah </label>
                                <div class="mb-3">
                                    <select name="usertype" class="custom-select" required>
                                      <option value="">Choose...</option>
                                      <option value="user">Pegawai</option>
                                      <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" name="login-submit" class="btn1 mt-3 mb-5">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </section>

    
    <script>
        var slideIndex = 0;
        showSlides();
        
        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
</main>