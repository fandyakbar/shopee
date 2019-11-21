<?php 
$koneksi = new mysqli("localhost","root","","mbd");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="cssIndex.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
                        .baris
                          {
                            display: grid; 
                            grid-template-columns: 10% auto;
                            height:150px ;
                            background-color: #FF4500;
                          }  

                          .navbar {
                  width: 100%;
                  background-color: #555;
                  overflow: auto;
                }

                .navbar a {
                  float: left;
                  padding: 12px;
                  color: white;
                  text-decoration: none;
                  font-size: 17px;
                }

                .navbar a:hover {
                  background-color: #000;
                }

                .active {
                  background-color: #4CAF50;
                }

                @media screen and (max-width: 500px) {
                  .navbar a {
                    float: none;
                    display: block;
                  }
                }
    </style>


</head>
<body>
<!-- kepala -->
    <div class="baris">
        <div>
            <img src="ico/shopee.png" class="img-circle" alt="Bird" width="150" height="150" class> 
        </div>
        <div><br><br>
            <h1 class="title" style="color: white;">Shopie</h1>
            <h3 class="subtitle" style="color: white;">Belanja Onlen!</h3>
        </div>
    </div>
    <?php   $ambil=$koneksi->query("SELECT * FROM pembeli WHERE username='$_GET[id]'");  
          $pecah=$ambil->fetch_assoc();
    ?>


<div class="navbar">
  <a class="active" href="index.php?id=<?php echo $pecah['username'];?>"><i class="fa fa-fw fa-home"></i> Catalog</a> 
  <a href="#"><i class="fa fa-fw fa-search"></i> Penjual</a> 
  <a href="keranjang.php?id=<?php echo $pecah['username']; ?>"><i class="fa fa-fw fa-envelope"></i> Keranjang</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Pesan</a> 
  <a href="logout.php"><i class="fa fa-fw fa-user"></i> <?php echo $pecah['username']?></a>
</div>

<!-- Slideshow container -->
        <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
          <center><div class="numbertext">1 / 3</div>
          <img src="ico/satu.jpg" style="width:100%;height:500px ;">
          <div class="text">Mari</div></center>
        </div>

        <div class="mySlides fade">
          <center><div class="numbertext">2 / 3</div>
          <img src="ico/dua.jpg" style="width:100%;height:500px ;">
          <div class="text">Belanja</div></center>
        </div>

        <div class="mySlides fade">
        <center><div class="numbertext">3 / 3</div>
          <img src="ico/tiga.jpg" style="width:100%;height:500px ;">
          <div class="text">Di Shopee</div></center>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>   
    

<!-- catalog -->
<div class="row">
        <?php 
        $ambil=$koneksi->query("SELECT * FROM barang");
          $ambil2=$koneksi->query("SELECT * FROM pembeli where username='$_GET[id]'");
          $pecah2=$ambil2->fetch_assoc();
        while ($pecah=$ambil->fetch_assoc()){
         ?>
        
                <div class="col-md-3">
                      <div class="thumbnail">
                      <h1 class="navbar"><i class="fa fa-fw"><?php echo $pecah['nama_barang']; ?></i></h1>
                      <img src="foto/<?php echo $pecah['foto']; ?>" alt="">
                      <div class="caption">
                      <h5><?php echo number_format($pecah['harga']); ?></h5>
                      <h5><?php echo $pecah['variasi']; ?></h5>
                      <a href="beli.php?halaman=<?php echo $pecah['id_barang'];?>&id=<?php echo $pecah2['username'];?>" class="button is-info"><i class=""></i><img src="ico/cart.png" style="width: 35px; height: 30px;" ></a> 
                      <div class="button is-danger" href="">Hehe</div>
                  
                      </div>
                      </div>
                </div>
      <?php 
      }
       ?>
       </div>



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
          setTimeout(showSlides, 1500); // Change image every 2 seconds
        }
</script>


</body>
</html>