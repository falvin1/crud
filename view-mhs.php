<?php
require 'code.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        h4{
            padding-top: 20px;
            padding-left: 20px;
        }
        .wrapper{
            width: 55%;
            max-height: calc(89% - 1.6rem);
            background-color: #fffb;
            margin: 3rem auto;
            border-radius: .6rem;

            overflow: auto;
            overflow: overlay;
        }
        .table_body{
            width: 50%;
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
        img{
            width: 80px;
            height: 80px;
        }

        

    </style>
    <title>Student View</title>
</head>
<body>

    <section class="wrapper">
        <h4>Student View Details 
        <a href="index.php?mhs" class="btn btn-danger float-end">BACK</a>
        </h4>
                    
            

                    <?php
if(isset($_GET['view']))
{
    $nim = ( $_GET['kode']);
    $query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $data = mysqli_fetch_row(mysqli_query($link, $query));
     ?>
        <div class="wrapper">
        <form action="">
            <div class='image-container'>
        <div class="mb-3">
            <label>Profile</label>
            <p >
                <img src="photo/<?= $data[4]; ?>" alt="">
            </p>
        </div>
        </div>
        <div class="student-contaner">
        <div class="mb-3">
            <label>Nim</label>
            <p class="form-control"><?=$data[0];?></p>
        </div>
        <div class="mb-3">
            <label>Student Email</label>
            <p class="form-control"><?=$data[1];?></p>
        </div>
        <div class="mb-3">
            <label>Student Phone</label>
            <p class="form-control"><?=$data[2];?></p>
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <p class="form-control"><?=$data[3];?></p>
        </div>
        

<?php
    } else {
        echo "<h4>No Such Id Found</h4>";
    }
?>
                    </div>
</section>>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>