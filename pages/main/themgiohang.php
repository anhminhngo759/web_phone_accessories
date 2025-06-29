<?php
    session_start();
    include('../../admincp/config/config.php');
    //thêm số lượng
    if (isset($_GET['cong'])) {//lay id sp
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] != $id) {// neu sp k trung id thi giu nguyen so luong
                $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                $_SESSION['cart'] = $product;
            } else{//neu sp trung id
                $tangsoluong = $cart_item['soluong'] + 1;
                if ($cart_item['soluong'] <= 9) {//max so luong cua gio hang <= 10 thi tang so luong
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$tangsoluong,
                    'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                } else {//max so luong > 10 thi giu nguyen so luong
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                    'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }

    // trừ số lượng
    if (isset($_GET['tru'])) {//lay id sp
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] != $id) {// neu sp k trung id thi giu nguyen so luong
                $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                $_SESSION['cart'] = $product;
            } else{//neu sp trung id
                $trusoluong = $cart_item['soluong'] - 1;
                if ($cart_item['soluong'] > 1) {// khi so luong > 1 thi giam so luong
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$trusoluong,
                    'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                } else {//min so luong gio hang <= 1 thi giu nguyen
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                    'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }

    // xóa sản phẩm
    if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item) {
            // sp k trung id thi giu nguyen 
            if ($cart_item['id'] != $id) {
                $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
            }
            $_SESSION['cart'] = $product;
            header('Location:../../index.php?quanly=giohang');
        }

    }

    // xóa tất cả
    if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }

    // thêm sản phẩm vào giỏ hàng
    // echo $_POST['themgiohang'];
    if (isset($_POST['themgiohang'])) {
        // session_destroy();
        $id = $_GET['idsanpham'];
        $soluong = 1;
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1 ";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        if($row) {
            echo $row['tensanpham'];
            $new_product = array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],
            'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp']));
            // print_r($_SESSION); 
            // echo '123';
            //kiểm tra session giỏ hàng tồn tại
            // $product = [];
            if (isset($_SESSION['cart'])) {
                // echo 345;
                $found = false;
                foreach ($_SESSION['cart'] as $cart_item) {// lay ra tung sp
                    if ($cart_item['id'] == $id) {//trung id la sp co trong gio hang giu nguyen so luong
                        $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong']+1,
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                        $found = true;//kt id trung
                    } else{//sp k co trong gio hang giu nguyen so luong
                        // $product[] = array('tensanpham'=>$row['tensanpham'], 'id'=>$id, 'soluong'=>$soluong,
                        // 'giasp'=>$row['giasp'], 'hinhanh'=>$row['hinhanh'], 'masp'=>$row['masp']);

                        $product[] = array('tensanpham'=>$cart_item['tensanpham'], 'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                        'giasp'=>$cart_item['giasp'], 'hinhanh'=>$cart_item['hinhanh'], 'masp'=>$cart_item['masp']);
                    }
                }
                if ($found == false) {// du lieu khong tim thay
                    // $_SESSION['cart']= array_merge($_SESSION['cart'], $product);
                    $_SESSION['cart']= array_merge($product, $new_product);

                } else {
                    $_SESSION['cart'] = $product;
                    // print_r(2);
                    // echo '<pre>';
                    // print_r($_SESSION['cart']);
                    // echo '</pre>';
                }
            } 
            else{ // session không tồn tại
                $_SESSION['cart'] = $new_product;
                // echo 12;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
?>