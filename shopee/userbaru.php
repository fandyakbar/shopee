 <?php  
$koneksi = new mysqli("localhost","root","","mbd");


  ?>
    <body>
      <form method="post">
        Nama : <input type="text" name="nama"/><br />
        Telepon : <input type="text" name="telepon" /><br />
        Alamat : <input type="text" name="alamat" /><br />
        Password : <input type="password" name="password" /><br />
        <input type="submit" value="Submit" name="submit" />
        <a href="halaman-login.php">Balik</a>
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
    </body>