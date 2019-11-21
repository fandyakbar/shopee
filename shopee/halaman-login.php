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
    <title>Login-Shopee</title>

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


            <form class="form-container" method="post" style="float: center">
            <h1>Login</h1>


            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Emailnya dong" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Password Tolong" name="psw" required>
            <button type="submit" name="admin" class="button is-success">Login</button>
            <a href="tambah-user.php"class="button is-info"> Daftar </a> 
             </form>
            <?php 
                                    if(isset($_POST['admin'])){

                                      $ambil= $koneksi->query("SELECT * FROM pembeli WHERE username='$_POST[email]' AND password='$_POST[psw]'");
                                      $pecah=$ambil->fetch_assoc();
                                        $pasmantap=$ambil->num_rows;
                                      if($pasmantap==1){
                                        $_SESSION['login']= $ambil->fetch_assoc();
                                        echo "<div class='alert alert-info'>Login Aman</div>";
                                        echo "<meta http-equiv='refresh' content='1;url=index.php?id=$pecah[username]'>";
                                      }
                                      else{
                                          echo "<div class='alert alert-danger'>Login Bermasalah</div>";

                                      }
                                    }
                                     ?>
           

    </div>
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