<?php 
$koneksi = new mysqli("localhost","root","","mbd");
session_start();
?>
<!--random-->
<?php
  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
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
          .keranjang
          {
            display: grid; 
            grid-template-columns: 70% auto;
            height:150px ;
            background-color: white;
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

          .keranjang
          {
            
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
            <h1 class="title" style="color: white;">Shopee</h1>
            <h3 class="subtitle" style="color: white;">Belanja Online!</h3>
        </div>
    </div>

   <?php   $ambil=$koneksi->query("SELECT * FROM pembeli WHERE username='$_GET[id]'");  
          $pecah=$ambil->fetch_assoc();
    ?>
<!-- navbar -->
<div class="navbar">
  <a class="active" href="index.php?id=<?php echo $pecah['username']; ?>"><i class="fa fa-fw fa-home"></i> Catalog</a> 
  <a href="#"><i class="fa fa-fw fa-search"></i> Penjual</a> 
  <a href="keranjang.php?id=<?php echo $pecah['username']; ?>"><i class="fa fa-fw fa-envelope"></i> Keranjang</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Pesan</a> 
  <a href="logout.php"><i class="fa fa-fw fa-user"></i> <?php echo $pecah['username']?></a>
</div>

<div class="keranjang">
  <div class="barang">
    <center>
      <table> <thead> <tr> <th> </th></tr></thead></table><th>ID Pesanan : <?php  $uyey=generateRandomString(10);
                  echo $uyey; ?></th>
      <table class= "table is-striped is-narrow is-hoverable is-fullwidth" id="iuran" >
          <thead>
              <tr>
                  <th>Gambar Barang</th>
                  <th>Nama Barang</th>
                  <th>Detail Barang</th>
                  <th>Harga Barang</th>
                  <th>Jumlah</th>
                  
              </tr>
          </thead>
          <tbody>
       <?php  foreach ($_SESSION['keranjang'] as $id_barang => $jumlah) {?>
        <?php  $tak=$koneksi->query("SELECT * FROM barang Where id_barang='$id_barang'");
          $pisah=$tak->fetch_assoc();
        ?>
              <tr>
                  <td><  <img src="foto/<?php echo $pisah['foto']; ?>" width="120px" height="120px" alt=""></td>
                  <td><?php echo $pisah['nama_barang'];  ?></td>
                  <td><?php echo $pisah['variasi'];  ?></td>
                  <td><?php echo number_format($pisah['harga']);  ?></td>
                  <td><input type="number" name="banyak" id=""></td>
<?php  } ?>
      </table>
    </center>
  </div>
    
<!-- form -->
 <form method="post">

    <div class="form" style="padding-left: 70px;">
    <br><br>

          <div class="field">
            <label class="label">Jasa Kirim</label>
            <div class="control">
              <div class="select">
                <select>
                 <?php $ambil3=$koneksi->query("SELECT * FROM jasa_pengirim") ?>
                  <?php while($pecah3=$ambil3->fetch_assoc()){ ?>
                      <option class="form-control" value="<?php echo $pecah3['id_jasa']?>"><?php echo $pecah3['nama_jasa']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label">Metode Pembayaran</label>
            <div class="control">
              <div class="select">
                <select name="pembayaran">
                  <option value="Indomaret"> Indomaret</option>
                  <option value="Mandiri"> Mandiri</option>
                  <option value="BRI"> BRI</option>
                </select>
              </div>
            </div>
          </div>



          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link" name="save">Submit</button>
            </div>
            <div class="control">
              <button class="button is-link is-light">Cancel</button>
            </div>
          </div>

    </div>
    </div>
    </form>



</body>


<?php  
if (isset($_POST['save'])) {
  
         $koneksi->query("INSERT INTO pemesanan(no_pemesanan, id_jasa, username, waktu_payment, metode_payment, diskon) VALUES ('$uyey','J02','$_GET[id]','2019-09-09','$_POST[pembayaran]',3000)");
  
}
 ?>


</html>

