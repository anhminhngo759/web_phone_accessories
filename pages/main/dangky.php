<?php
    // session_start();
    if (isset($_POST['dangky'])) {
        // echo $_POST['dangky'];
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $matkhau = md5($_POST['matkhau']);
        $diachi = $_POST['diachi'];
        $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang, email, diachi, matkhau, dienthoai) 
        VALUE('".$tenkhachhang."', '".$email."', 
        '".$diachi."', '".$matkhau."', '".$dienthoai."')");
        if ($sql_dangky) {      
            echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
            // dang ky xong thi gan ten khach hang
            $_SESSION['dangky'] = $tenkhachhang;
            //luu bien email
            $_SESSION['email'] = $email;
            // dang ky tai khoan moi thi luu id khach hang
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
            echo '<script type="text/javascript">
                window.location = "index.php?quanly=giohang"
            </script>';
            // header('Location:index.php?quanly=giohang');
        }
    }
?>
<p>Đăng ký thành viên</p>
<style type="text/css">
    /* .dangky{
        width: 60%;
        border-collapse: collapse;
    }
    table.dangky tr td {
        padding: 5px;
    } */
</style>
<!-- <form action="" method="POST">
    <table class="dangky" >
        <tr>
            <td>Họ và tên</td>
            <td><input type="text" size="50" name="hovaten"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" size="50" name="email"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" size="50" name="diachi"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" size="50" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" size="50" name="matkhau"></td>
        </tr>
        <tr>
            <td><input type="submit" name="dangky" value="Đăng ký"></td>
            <td><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></td>
        </tr>
    </table>
</form> -->

<div class="container1"> 
  <form action="" method="POST"> 
    <div class="row">    
        <div class="col-25">      
            <label class="lbdk" for="hovaten">Họ và tên</label>   
        </div>

        <div class="col-75">    
            <input  class="rowdangky" type="text" id="hovaten" name="hovaten" placeholder="Nhập tên của bạn">   
        </div>  
    </div>  
    
    <div class="row">    
      	<div class="col-25">      
        	<label class="lbdk" for="email">Email</label>   
      	</div>

      	<div class="col-75">    
        	<input class="rowdangky" type="text" id="email" name="email" placeholder="Nhập email của bạn">   
      	</div>  
    </div>  
       
    <div class="row">    
      	<div class="col-25">      
        	<label class="lbdk" for="diachi">Địa chỉ</label>   
      	</div>

      	<div class="col-75">    
        	<input  class="rowdangky"  type="text" id="diachi" name="diachi" placeholder="Nhập địa chỉ của bạn">   
      	</div>  
    </div>  
       
    <div class="row">    
      	<div class="col-25">      
        	<label class="lbdk" for="dienthoai">Điện thoại</label>   
      	</div>

      	<div class="col-75">    
        	<input  class="rowdangky" type="text" id="dienthoai" name="dienthoai" placeholder="Nhập điện thoại của bạn">   
      	</div>  
    </div>  
       
       
    <div class="row">    
      	<div class="col-25">      
        	<label class="lbdk" for="matkhau">Mật khẩu</label>   
      	</div>

      	<div class="col-75">    
        	<input  class="rowdangky" type="text" id="matkhau" name="matkhau" placeholder="Nhập mật khẩu">   
      	</div>  
    </div>  

    <div class="row buttondk">      
      <input class="buttondangky" type="submit" name="dangky" value="Đăng ký">
      <a class="dangnhap" href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a>
    </div>

  </form>
</div>