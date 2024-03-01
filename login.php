<?php 

if(isset($_POST["login"])){
    $usr= trim($_POST["user"]);
    $pas= trim($_POST["pass"]);

    if($usr=='' or $pas ==''  ){
        echo'data tidak boleh kosong';
    }elseif($usr== 'admin' or $pas == 'admin'){
        $_SESSION['user']='Administrator';
        echo"<meta http-equiv='refresh' content='0; url=index.php''>";
    }else{
        $sql= "SELECT count(*) FROM mahasiswa WHERE nim='$usr' AND nama='$pas'";
        $data = mysqli_fetch_row(mysqli_query($link,$sql));
        if($data[0]!=0){
            $_SESSION["user"]="$pas";
            echo "Login Berhasil";
            echo"<meta http-equiv='refresh' content='0; url=index.php''>";

        }else{echo'<div class="alert">';
            $message="Username dan Password Salah";
            echo "<script>var messageFromPHP = '" . $message . "';</script></div>";
        }
        
    }
}
?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css?<?php echo time();?>">
    
</head>
<body>
<div class="wrapper">
        <div class="form-box login">
            <form action="" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="user" name='user' required>
                    <label for="">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock"></ion-icon></span>
                    <input type="Password" name='pass' required>
                    <label for="">Password</label>
                </div>
                <button type="simpan" class="btn" name='login' id='submit'>Login</button>
                </div>
                <div id="alert-container" class="alert-container"></div>
        </div>
        </form> 
    </div>
    <script src="script.js"></script>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>
