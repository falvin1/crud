<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_Mhs</title>
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
        td img{
            width: 50px;
            height: 50px;
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
<?php
session_start();
require  'code.php';

if(isset($_GET['ubah'])){
    $nim = $_GET['kode'];
    $sql="SELECT * FROM mahasiswa WHERE nim ='$nim'";
    $data = mysqli_fetch_row(mysqli_query($link,$sql));
    echo "
    <section class='table_body'>
        <h1>Edit <a href='index.php?mhs' class='btn btn-danger float-end'>BACK</a> </h1>
       
    <div class='wrapper'>
    <form enctype='multipart/form-data' action='code.php' method='POST'>

        <table>
           <tr>
            <td>
                NIM
            </td>
            <td>
                :
            </td>
            <td><input type='text' name='nim' value='$data[0]' require></td>
           </tr> 
           <tr>
            <td>
                Nama
            </td>
            <td>:</td>
            <td>
                <input type='text' name='nama' value='$data[1]' require>
            </td>
            
           </tr>
           <tr>
           <td>
               No Telp
           </td>
           <td>:</td>
           <td>
               <input type='text' pattern='[0-9+]+' name ='Telepon' value='$data[2]'>
           </td>
           
          </tr>
          <tr>
          <td>
              Jenis Kelamin
          </td>
          <td>:</td>
          <td> 
          <input type='radio' id='laki' name='jenisKelamin' value='laki-laki' " . ($data[3] == 'laki-laki' ? 'checked' : '') . ">
          <label for='laki'>Laki-laki</label>
          <input type='radio' id='perempuan' name='jenisKelamin' value='perempuan' " . ($data[3] == 'perempuan' ? 'checked' : '') . ">
          <label for='perempuan'>Perempuan</label>
                 <tr>
        <td>Profile</td>
        <td>:</td>
        <td>
        <img src='photo/{$data[4]}' alt='Profile Image' width='100'><br>
        <input type='file' name='profile' require></td>
       </tr>
       <td> 
       <input type='radio' id='laki' name='jenisKelamin' value='laki-laki' " . ($data[3] == 'laki-laki' ? 'checked' : '') . ">
              <tr>
         </tr>
         <tfoot class='mb-3'>
            <tr>
                <td><button type='submit' name='edit' class='btn btn-primary'><i class='fa-solid fa-floppy-disk'></i></button></td>
            </tr>
         </tfoot>
            
        </table>
        </div>
        </section>
    </form>";
}
?>
</body>
</html>
