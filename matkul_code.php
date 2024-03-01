<?php
$link= mysqli_connect('localhost','root','','latihan');

if(isset($_POST['simpan'])){
    $id = $_POST['idmatkul'];
    $nama = $_POST['namamatkul'];
    $sks = $_POST['sks'];
    $dosen=$_POST['dosen'];
    $ruangan=$_POST['ruangan'];
    $check_query = "SELECT * FROM matakuliah WHERE id_mk = '$id'";
    $check_result = mysqli_query($link, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Error: ID MK '$id' is already in use.";
        header("Location: edit-mk.php");
        exit(0);
    } else {
        mysqli_query($link, "INSERT INTO matakuliah (id_mk, nama_mk, sks, dosen, ruangan) VALUES ('$id', '$nama', '$sks', '$dosen','$ruangan')");
        echo "<meta http-equiv='refresh' content='0; url=index.php?crud'>";
    }
}
else if(isset($_POST['edit'])){
	$id = $_POST['idmatkul'];
	$nama = $_POST['namamatkul'];
    $sks =$_POST['sks'];
    $dosen=$_POST['dosen'];
    $ruangan=$_POST['ruangan'];
	mysqli_query($link,"UPDATE matakuliah  SET nama_mk='$nama', sks='$sks' , dosen ='$dosen' , ruangan = '$ruangan' WHERE id_mk='$id'");
	echo"<meta http-equiv='refresh' content='0; url=index.php?crud''>";
}
else if(isset($_GET['hapus'])){
    $id= $_GET['kode'];
    mysqli_query($link,"DELETE FROM matakuliah WHERE id_mk='$id'");
    echo"<meta http-equiv='refresh' content='0; url=index.php?crud''>";
}
?>