<?php
    // neu dang xuat
    if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
        unset($_SESSION['dangnhap']);
        echo '<script type="text/javascript">
                window.location = "login.php"
            </script>';
        // header('Location:login.php');
    }
    // neu ton tai username 
?>
<!-- <p><a href="index.php?dangxuat=1">Đăng xuất : <?php if (isset($_SESSION['dangnhap'])) {
        echo $_SESSION['dangnhap'];
    } ?></a></p> -->



