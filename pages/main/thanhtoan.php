<?php
    session_start();
    include("../../admincp/config/config.php");
    // lien ket file sendmail
    require('../../mail/sendmail.php');
    require('../../carbon/autoload.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $id_khachhang = $_SESSION['id_khachhang'];
    // ma don hang
    $code_order = rand(0,9999);
    // them db bang cart
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date) 
    VALUE('".$id_khachhang."','".$code_order."',1,'".$now."')";
    $cart_query = mysqli_query($mysqli, $insert_cart);
    if ($cart_query) {
        foreach($_SESSION['cart'] as $key => $value) {
            // them db bang chi tiet gio hang
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) 
            VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
            mysqli_query($mysqli, $insert_order_details);
        }

        // lay ra thong tin don hang da dat gui qua mail
        $tieude = "Đặt hàng website thegioiphukiendienthoai.net thành công";
        $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng : ".$code_order."</p>";
        $noidung.="<h4>Đơn hàng đặt bao gồm :</h4>";

        foreach($_SESSION['cart'] as $key => $val) {
            $noidung.="<ul style='border:1px solid blue; margin:10px;'>
                        <li><strong>Tên sản phẩm:</strong> ".$val['tensanpham']."</li>
                        <li><strong>Mã sản phẩm:</strong> ".$val['masp']."</li>
                        <li><strong>Giá sản phẩm:</strong> ".number_format($val['giasp'], 0, ',', '.').'đ'."</li>
                        <li><strong>Số lượng:</strong> ".$val['soluong']."</li>
                        </ul>";
        }

        $maildathang = $_SESSION['email'];
        $mail = new Mailer();
        $mail->dathangmail($tieude, $noidung, $maildathang);
    }
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=camon');
?>