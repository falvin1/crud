<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="dashboard.css?<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style>

    </style>
</head>
<body>
    
<?php

require 'code.php';






$sql = "SELECT * FROM mahasiswa order by nim";
echo "
<section class='table__body'>
<div class='tabular--wrapper'>
    <div class='card-header'>
        <h4>Student Details";
if ($_SESSION['user'] == 'Administrator') {
    echo "
        <a href='create-mhs.php' class='btn btn-primary float-end'><i class='fa-solid fa-square-plus'></i></a>
        </h4>";
        
}
echo"             </div>
<div class='table-container'>
    <table>
        <thead>
            <th>NIM</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Jenis Kelamin </th>
            <th>Operator</th>

        </thead> ";
if($result = mysqli_query($link,$sql)){
    while($data=mysqli_fetch_row($result)){
        echo"
        <tr><td>$data[0]</td>
        <td>$data[1]</td>
        <td>$data[2]</td>
        <td>$data[3]</td> 
        ";
        
    if($_SESSION['user']=='Administrator'){
        echo"
        <td><a href='edit-mhs.php?ubah&kode=$data[0]'  class='btn btn-success btn-sm' ><i class='fa-solid fa-pen-to-square'></i></a> <a class='btn btn-danger btn-sm' href='mhs.php?hapus&kode=$data[0]'><ion-icon name='trash'></ion-icon></a> 
        <a class='btn btn-info btn-sm' href='view-mhs.php?view&kode=$data[0]' ><i class='fa-solid fa-eye'></i></a></td>
        </tr>";
        
    }else if($_SESSION['user'] == $data[1]){
            echo"
        <td><a href='edit-mhs.php?ubah&kode=$data[0]' class='btn btn-success btn-sm'><i class='fa-solid fa-pen-to-square'></i></a>  <a class='btn btn-info btn-sm' href='view-mhs.php?view&kode=$data[0]' ><i class='fa-solid fa-eye'></i></a></td>
        
        </tr>";
    }
    else{
        echo"<td> </a>  <a class='btn btn-info btn-sm' href='view-mhs.php?view&kode=$data[0]' ><i class='fa-solid fa-eye'></i></a></td>";
    }
    }
}
echo"</table></div> </div></section>"
?>



<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>

