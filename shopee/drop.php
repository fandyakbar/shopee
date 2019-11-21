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
            <img src="shopee.png" class="img-circle" alt="Bird" width="150" height="150" class> 
        </div>
        <div><br><br>
            <h1 class="title" style="color: white;">Shopee</h1>
            <h3 class="subtitle" style="color: white;">Belanja Online!</h3>
        </div>
    </div>

<div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Catalog</a> 
  <a href="#"><i class="fa fa-fw fa-search"></i> Toko</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Pesan</a> 
  <a href="#"><i class="fa fa-fw fa-user"></i> Logout</a>
</div>



</body>
</html>