<h3>Lịch sử đơn hàng</h3>

<?php
    $id_khachhang = $_SESSION['id_khachhang'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart, tbl_dangky
    WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky 
    AND tbl_cart.id_khachhang = '$id_khachhang' 
    ORDER BY tbl_cart.id_cart DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>

<table class="listed">
        <tr>
            <th>Id</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Tình trạng</th>
            <th>Ngày đặt</th>
            <th>Ngày giao hàng</th>
            <th>Quản lý</th>
            <th>In đơn hàng</th>
            <th>Hình thức thanh toán</th>
        </tr>

        <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_dh)) {
                $i++;
        ?>

        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['code_cart'] ?></td>
            <td><?php echo $row['tenkhachhang'] ?></td>
            <td><?php echo $row['diachi'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['dienthoai'] ?></td>
            <td>
                <?php
                    if ($row['cart_status'] == 1) {
                      echo '<a href="modules/quanlydonhang/xuly.php?&code='.$row['code_cart'].'">Đơn hàng mới</a>';
                    }else {
                        echo 'Đã xem';
                    }
                ?>
            </td>
            <td><?php echo $row['cart_date'] ?></td>
            <td><?php echo $row['ngaydat'] ?></td>
            <td>
                <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
            </td>
            <td>
                <a href="main/indonhang.php?code=<?php echo $row['code_cart'] ?>">In đơn hàng</a> 
            </td>

            <td>
                <?php
                    if ($row['cart_payment'] == 'vnpay') {      
                ?>

                <a href="index.php?quanly=lichsudonhang&congthanhtoan=<?php echo $row['cart_payment'] ?>&code_cart=<?php echo $row['code_cart'] ?> ">
                <?php echo $row['cart_payment'] ?></a>
                    
                <?php
                    } else {  
                ?>

                <?php echo $row['cart_payment'] ?>
                
                <?php
                    }
                ?>
            </td>
        </tr>

        <?php
            }
        ?>
</table>
<?php
    if (isset($_GET['congthanhtoan'])) {
        $congthanhtoan = $_GET['congthanhtoan'];
        $code_cart = $_GET['code_cart'];
        echo $code_cart;
        echo '<h4>Chi tiết thanh toán qua cổng thanh toán :'.$congthanhtoan.' </h4>';
            if ($congthanhtoan == 'vnpay') {
                $sql_vnpay = mysqli_query($mysqli, "SELECT * FROM tbl_vnpay WHERE code_cart ='$code_cart' LIMIT 1");
                $row_vnpay = mysqli_fetch_array($sql_vnpay);
?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>vnp_amount</th>
                <th>vnp_bankcode</th>
                <th>vnp_banktranno</th>
                <th>vnp_orderinfo</th>
                <th>vnp_paydate</th>
                <th>vnp_tmncode</th>
                <th>vnp_transactionno</th>
            </tr>
        </thead>

        <tbody>
            <tr>
            <td><?php echo isset($row_vnpay['vnp_amount']) ? $row_vnpay['vnp_amount'] : ''; ?> </td>
                <!-- <td><?php echo $row_vnpay['vnp_amount'] ?> </td> -->
                <td><?php echo $row_vnpay['vnp_bankcode'] ?> </td>
                <td><?php echo $row_vnpay['vnp_banktranno'] ?> </td>
                <td><?php echo $row_vnpay['vnp_orderinfo'] ?> </td>
                <td><?php echo $row_vnpay['vnp_paydate'] ?> </td>
                <td><?php echo $row_vnpay['vnp_tmncode'] ?> </td>
                <td><?php echo $row_vnpay['vnp_transactionno'] ?> </td>
            </tr>
        </tbody>
    </table>

    <?php
        }
    ?>
        
<?php
    }
?>