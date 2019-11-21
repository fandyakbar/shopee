<?php 
session_start();
$koneksi = new mysqli("localhost","root","","mbd");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>Shopee</title>

    <style >
          .baris
          {
            display: grid; 
            grid-template-columns: 40% auto;
            height:900px ;
          }  
    </style>
</head>
<body>
<div class="baris" style="lenght:200px">
    <div class="foto-shopee" style="background-color: #FF4500; color: white; padding: 5px">

    </div>

    <div class="login" style="border: 2px;
  border-color: #555;">


            <form class="form-container" method="post">
        Nama : <input type="text" name="nama"/><br />
        Telepon : <input type="text" name="telepon" /><br />
        Alamat : <input type="text" name="alamat" /><br />
        Password : <input type="password" name="password" /><br />
        <input class="button is-danger" type="submit" value="Submit" name="submit" />
        <a class="button is-info" href="halaman-login.php">Balik</a>
      </form>


    <?php
    
    if(isset($_POST['submit'])){
      $name  = $_POST['nama'];
      $alm  = $_POST['telepon'];
      $telp  = $_POST['alamat'];
      $password=$_POST['password'];
      $koneksi->query("INSERT INTO pembeli(username, nomor_hp, alamat, password) VALUES ('$name', '$alm','$telp','$password')");

      echo "Berhasil";
    }
    ?>
</div>


<script>
        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        }
</script>

</body>
</html>