<style type="text/css">
        /* .wrapper-login{
        width: 20%;
        margin: 0 auto;
    } */
    .table_login{
        border: 1px solid black;
        text-align: center;
        border-collapse: collapse;
        width: 50%;
    }
    table.table_login tr td {
        padding: 5px;
        border: 1px solid black;
    }

</style>
<?php
    // session_start();
    //dang nhap
    if(isset($_POST['dangnhap'])) {
        // echo $_POST['dangnhap'];

        $email = $_POST['email'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        //dem so hang cua bang khach hang dang ky
        $count = mysqli_num_rows($row);
        if ($count > 0) {
            $row_data = mysqli_fetch_array($row);
            //lay cac cot ten kh,email, id kh
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            $_SESSION['email'] = $row_data['email'];
            $_SESSION['id_khachhang'] = $row_data['id_dangky'];
            // header("Location:index.php?quanly=giohang");
            echo '<script type="text/javascript">
                window.location = "index.php?quanly=giohang"
            </script>';
        } else {
            echo '<p style="color:red">Email hoặc Mật khẩu sai, vui lòng nhập lại</p>';
        }
    }
?>
<!-- <div class="wrapper-login">
    <form action="" autocomplete="off" method="POST">
        <table class="table_login">
            <tr>
                <td colspan="2"><h3>Đăng nhập khách hàng</h3></td>
            </tr>
            <tr>
                <td>Tài khoản</td>
                <td><input type="text" size="50" name="email" placeholder="Email..."></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" size="50" name="password" placeholder="Mật khẩu..."></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
            </tr>
        </table>
    </form>
</div> -->

<!-- <div id="wrapper-login">
    <form action="" autocomplete="off" method="POST">
        <h3>Đăng nhập</h3>
        <div class="from-group">
            <input type="text" name="email">
            <label for="">Email</label>
        </div>

        <div class="from-group">
            <input type="password" name="password">
            <label for="">Mật khẩu</label>
        </div>

        <input type="submit" name="dangnhap" id="btn-login" value="Đăng nhập">

    </form>
</div> -->
<div id="wrapper-login">
    <form class="login" action="" autocomplete="off" method="POST">
        <h3 class="loginb">Đăng nhập</h3>

        <div class="form-group">
            <label for="email">Tài khoản</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Nhập email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Nhập password">
        </div>

        <div class="dangnhap">
            <button type="submit" name="dangnhap" class="btn btn-primary">Đăng nhập</button>
        </div>
    
    </form>
</div>