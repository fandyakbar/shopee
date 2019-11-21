
<?php 
$koneksi = new mysqli("localhost","root","","mbd");

session_start();




 $ambil2=$koneksi->query("SELECT * FROM pembeli where username='$_GET[halaman]'");
 $pecah2=$ambil2->fetch_assoc();


		$id_barang=$_GET['halaman'];

$keranjang[$id_barang]=1;

if (isset($_SESSION['keranjang'][$id_barang])) {
	$_SESSION['keranjang'][$id_barang]+=1;
}
else{

	$_SESSION['keranjang'][$id_barang]=1;
	//generateRandomString();
}

//print_r($_SESSION);

 $ambil=$koneksi->query("SELECT * FROM pembeli where username='$_GET[id]'");
 $pecah=$ambil->fetch_assoc();

echo "<script> location='keranjang.php?id=$_GET[id]'</script>"


 ?>