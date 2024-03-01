<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php

require 'matkul_code.php';


$sql = "SELECT * FROM matakuliah order by nama_mk";
?>

<section class='table__body'>
<div class='tabular--wrapper'>
<?php
if($_SESSION['user']==='Administrator'){
    echo"
    <div class='card-header'>
    <h4>Study Details
    <a href='create-mk.php' class='btn btn-primary float-end'><span class='word'><i class='fa-solid fa-circle-plus'></i></span></a>
    </h4>
    </div>";
}
echo"
<div class='table-container'>
    <table>
        <thead>
            <th>ID_MK</th>
            <th>Nama_MK</th>
            <th>SKS</th>
            <th>Dosen</th>
            <th>Ruangan</th>";
            if($_SESSION['user']==='Administrator'){
                echo'
            <th>Operator<th>';
            }
        echo"
        </thead> ";
if($result = mysqli_query($link,$sql)){
    while($data=mysqli_fetch_row($result)){
        echo"
        <tr><td>$data[0]</td>
        <td>$data[1]</td>
        <td>$data[2]</td>
        <td>$data[3]</td>
        <td>$data[4]</td>";
        
    if( $_SESSION['user']=='Administrator'){
        echo"
        <td><a href='edit-mk.php?crud&ubah&kode=$data[0]' class='btn btn-success btn-sm' ><ion-icon name='create'></ion-icon></a><span> </span><a class='btn btn-danger btn-sm' href='index.php?crud&hapus&kode=$data[0]'><ion-icon name='trash'></ion-icon></a> </td>
        </tr>";
        
    }
    }
}
echo"</table></div></div></section>";
?>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
