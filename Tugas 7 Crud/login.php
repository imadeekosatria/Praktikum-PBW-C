<?php
    require "header.php";
?>

<main>
<title>Login</title>
<section class = "Form my-4 mx-5">
        <div class = "container">
            <div class = "row no-gutters">
                <div class = "col-lg-5">
                    <!--Slide Show -->
                    <div id="mycarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#mycarousel" data-slide-to="1"></li>
                        <li data-target="#mycarousel" data-slide-to="2"></li>
                        </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="2000">
                                    <img src="img/mina 1.jpg" class="img-fluid" alt="mina 1">
                                </div>
                                <div class="carousel-item" data-interval="2000">
                                    <img src="img/mina 2.jpg" class="img-fluid" alt="mina 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/mina 3.jpg" class="img-fluid" alt="mina 3">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
     </section>
</main>