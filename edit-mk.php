<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_MK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style>
        body{
            background: url('html_table.jpg');
        }
        h1{
            font-family: Arial, Helvetica, sans-serif;
            padding-top: 20px;
            padding-left: 20px;
            color:rgb(29,4,97) ;
        }
        .wrapper{
            width: 85%;
            max-height: calc(89% - 1.6rem);
            background-color: #fffb;
            margin: 3rem auto;
            border-radius: .6rem;

            overflow: auto;
            overflow: overlay;
        }
        .table_body{
            width: 40%;
            max-height: calc(89% - 1.6rem);
            background-color: #fff4;
            
            margin: .8rem auto;
            border-radius: .6rem;
            
            overflow: auto;
            overflow: overlay;
        }
        .mb-3{
            margin-left: 50px;
            
        }
        .btn btn-danger float-end{
            margin-top: 30px;
        }
    </style>
</head>
<body>
    
</body>
</html>

<?php
session_start();
require  'matkul_code.php';

if(isset($_GET['ubah'])){
    $id = $_GET['kode'];
    $sql="SELECT * FROM matakuliah WHERE id_mk ='$id'";
    $data = mysqli_fetch_row(mysqli_query($link,$sql));
    echo "
    <section class='table_body'>
    <h1>Edit <a href='index.php?crud' class='btn btn-danger float-end'>BACK</a> </h1>
   
    <div class='wrapper'>
    <form action='' method='POST'>

        <table>
           <tr>
            <td>
                ID MK
            </td>
            <td>
                :
            </td>
            <td><input type='text' name='idmatkul' value='$data[0]'></td>
           </tr> 
           <tr>
            <td>
                Nama MK
            </td>
            <td>:</td>
            <td>
                <input type='text' name='namamatkul' value='$data[1]'>
            </td>
            <tr>
                <td>SKS</td>
                <td>:</td>
                <td><input type='number' name='sks' value='$data[2]'></td>
            </tr>
            <tr>
            <td>Dosen</td>
            <td>:</td>
            <td><input type='text' name='dosen' value='$data[3]'</td>
        </tr>
        <tr>
        <td>Ruangan</td>
        <td>:</td>
        <td><input type='text' name='ruangan' value='$data[4]'</td>
        </tr>
           </tr>
         <tfoot class='mb-3'>
            <tr>
                <td><button type='submit' name='edit' class='btn btn-primary'><i class='fa-solid fa-floppy-disk'></i></button></td>
            </tr>
         </tfoot>
           
        </table>
    
        
    </form>
    </div>
        </section>";
    
}

?>