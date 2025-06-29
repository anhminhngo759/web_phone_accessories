<style type="text/css">
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
    h3 {
    margin: 14px;
}
</style>
<!-- Thay doi mat khau user -->
<?php
    // neu thay doi mat khau
    if(isset($_POST['doimatkhau'])) {
        $taikhoan = $_POST['email'];
        $matkhau_cu = md5($_POST['password_cu']);
        $matkhau_moi = md5($_POST['password_moi']);
        // lay email va mat khau cu cua bang dang ky
        $sql = "SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        //dem so hang cua bang  dang ky
        $count = mysqli_num_rows($row);
        if ($count > 0) {
                // cap nhat lai mat khau moi
               $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."' ");
               echo '<p style="color:green"> Mật khẩu đã được thay đổi thành công</p>';
                
        } else {
                echo '<p style="color:red">Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại!!!</p>';
        }
    }
?>
<div class="table-responsive">
    <form action="" autocomplete="off" method="POST">
        <table class="table table-borderless">
            <tr>
                <td colspan="2" style="font-size: 15px;text-align:center;"><h3>Đổi mật khẩu User</h3></td>
            </tr>
            <tr>
                <td>Tài khoản</td>
                <td style="font-size: 15px;"><input class="rowdangky1" type="text" name="email"></td>
            </tr>
            <tr>
                <td style="font-size: 15px;">Mật khẩu cũ</td>
                <td><input class="rowdangky1" type="text" name="password_cu"></td>
            </tr>
            <tr>
                <td style="font-size: 15px;">Mật khẩu mới</td>
                <td><input class="rowdangky1" type="text" name="password_moi"></td>
            </tr>
            <tr>
                <td colspan="2"><input class="bdk" type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
            </tr>
        </table>
    </form>
</div>