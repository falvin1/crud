
<?php
$link= mysqli_connect('localhost','root','','latihan');

if(isset($_POST['simpan'])){
    $nim= $_POST['nim'];
    $nama = $_POST['nama'];
    $telepon=$_POST['Telepon'];
    $jenisKelamin = isset($_POST['jenisKelamin']) ? $_POST['jenisKelamin'] : '';
    $profile=$_FILES['profile']['name'];
    $profile_tmp=$_FILES['profile']['tmp_name'];
    move_uploaded_file($profile_tm,'photo/'.$profile);
    mysqli_query($link,"INSERT INTO mahasiswa (nim,nama,Telepon,jenis_kelamin,profile) VALUES ('$nim','$nama','$telepon','$jenisKelamin','$profile') ");
    echo"<meta http-equiv='refresh' content='0; url=index.php?mhs''>";

}
else if(isset($_POST['edit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $telepon = $_POST['Telepon'];
    $jenisKelamin = isset($_POST['jenisKelamin']) ? $_POST['jenisKelamin'] : '';
    $profile = $_FILES['profile']['name'];

    if (!empty($profile)) {
       
        $folder = "photo/";
        $tmpFile = $_FILES['profile']['tmp_name'];
        move_uploaded_file($tmpFile, $folder . $profile);

        
        mysqli_query($link, "UPDATE mahasiswa SET nama='$nama', Telepon='$telepon', jenis_kelamin='$jenisKelamin', profile='$profile' WHERE nim='$nim'");
    } else {
       
        $result = mysqli_query($link, "SELECT profile FROM mahasiswa WHERE nim = '$nim'");
        $row = mysqli_fetch_assoc($result);
        $profile = $row['profile'];


        mysqli_query($link, "UPDATE mahasiswa SET nama='$nama', Telepon='$telepon', jenis_kelamin='$jenisKelamin' profile='$profile' WHERE nim='$nim'");
    }

    if($_SESSION['user'] != 'Administrator'){
        $_SESSION['user'] = $nama;
    }

    echo "<meta http-equiv='refresh' content='0; url=index.php?mhs'>";
}


else if(isset($_GET['hapus'])){
    $nim= $_GET['kode'];
    mysqli_query($link,"DELETE FROM mahasiswa WHERE nim='$nim'");
    echo"<meta http-equiv='refresh' content='0; url=index.php?mhs''>";
}
?>