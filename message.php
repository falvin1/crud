<?php
    if(isset($_SESSION['message'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    unset($_SESSION['message']);
    endif;

    if ($query_run) {
        echo "<meta http-equiv='refresh' content='0; url=index.php?mhs'>";
    } else {
        echo "Error: " . mysqli_error($link);
    }
?>