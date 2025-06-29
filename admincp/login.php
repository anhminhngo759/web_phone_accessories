<!-- dang nhap admin -->
<?php
    session_start();
    include('config/config.php');
    //dang nhap
    if(isset($_POST['dangnhap'])) {
        // echo $_POST['dangnhap'];
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        //dem so hang cua bang admin 
        $count = mysqli_num_rows($row);
        if ($count > 0) {
                $_SESSION['dangnhap'] = $taikhoan;
                header("Location:index.php");
        } else {
                echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại!!!"); </script>';
                header("Location:login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng nhập Admincp</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <style type="text/css">
            body {
                background-color: #f2f2f2;
            }
            /* .wrapper-login{
                width: 20%;
                margin: 0 auto;
            }
            .table_login{
                border: 1px solid black;
                text-align: center;
                border-collapse: collapse;
                width: 100%;
            }
            table.table_login tr td {
                padding: 5px;
                border: 1px solid black;
            } */
        </style>
       
        <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
    </head>
    <body>

        <!-- <div class="wrapper-login">
            <form action="" autocomplete="off" method="POST">
                <table class="table_login">
                    <tr>
                        <td colspan="2"><h3>Đăng nhập Admin</h3></td>
                    </tr>
                    <tr>
                        <td>Tài khoản</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
                    </tr>
                </table>
            </form>
        </div> -->

        <div id="wrapper-login">
            <form class="login" action="" autocomplete="off" method="POST">
                <h3 class="loginb">Đăng nhập Admin</h3>

                <div class="form-group">
                    <label for="text">Tài khoản</label>
                    <input type="text" name="username" class="form-control" id="text" placeholder="Nhập tên">
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

        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
    </body>
</html>