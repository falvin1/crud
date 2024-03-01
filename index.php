<?php 
session_start(); 

$link= mysqli_connect('localhost','root','','latihan');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css?<?php echo time();?>">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>
<body>

    <?php
        if(isset($_GET['logout'])){
            unset($_SESSION['user']);
            echo"<meta http-equiv='refresh' content='0; url=index.php''>";
        }
        else if(isset($_SESSION["user"])){
            if($_SESSION['user']==='Administrator'){
             echo'
             <div class="sidebar">
            
             <div class="image"><img src="download.png" alt=""></div>
';  }
            else {
            
            $user_query = mysqli_query($link, "SELECT * FROM mahasiswa WHERE nim= '{$_SESSION['user']}'");
             $user_data = mysqli_fetch_assoc($user_query);

                echo '
                <div class="sidebar">
            
                <div class="image"><img src="photo/' . $user_data['profile'] . '" alt=""></div>';
                }       
            echo ' 

            <div class="logo"></div>
            <br><br>
            <ul class="menu">
            <li >
            <a href="index.php" onclick="changeBackgroundColor(this)" >
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>
            </li>
            <li >
            <a href="index.php?mhs" onclick="changeBackgroundColor(this)">
            <i class="fa-solid fa-user"></i>
                <span>Mahasiswa</span>
            </a>
            </li>
            <li>
            <a href="index.php?logout">
            <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
            </li>
            </ul>
                
            </div>
            <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                        <span>Selamat Datang</span>
                        <h2 > ' . $_SESSION['user'] . '</h2>
                </div>
                <div class="gif">
                <img src="innovation.gif" alt="Deskripsi alternatif">
                        
                    </button>
                </div>
            </div>

        
          ';
          
            if(isset($_GET['mhs'])){

                include('mhs.php');

            }
            
            else{
                
                include('crud.php');
                
            }
        }
        else{
            include('login.php');
        }

    ?>

</body>
<script src="script.js"></script>
</html>
