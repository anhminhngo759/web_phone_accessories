<?php
    include('../../config/config.php');

    $tensanpham = $_POST['tensanpham'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    // xu ly hinh anh
    $hinhanh = $_FILES['hinhanh']['name']; //lấy tên của file hinhanh tải lên
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name']; //lấy đường dẫn tạm của file hinhanh tải lên
    $hinhanh = time().'_'.$hinhanh;//tạo 1 tệp mới có thông tin thời gian hiện tại
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];

    if(isset($_POST['themsanpham'])) {
        $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
        VALUE ('".$tensanpham."','".$masp."','".$giasp."','".$soluong."',
        '".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
        mysqli_query($mysqli, $sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);/*di chuyển tệp tin từ thư mục tạm thời
         đến thư mục đích uploads với tệp tin tên là hinhanh*/ 
        header('Location:../../index.php?action=quanlysanpham&query=them');
    } elseif(isset($_POST['suasanpham'])){
            if (!empty($_FILES['hinhanh']['name'])) { // nếu người dùng chọn thay đổi hình ảnh
                //di chuyển hinhanh mới
                move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
                
                //update hình ảnh
                $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',
                masp='".$masp."',giasp='".$giasp."',
                soluong='".$soluong."', hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."',tinhtrang='".$tinhtrang."',
                id_danhmuc='".$danhmuc."' WHERE id_sanpham ='$_GET[idsanpham]'";

                //xóa hình ảnh cũ
                $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
                $query = mysqli_query($mysqli, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    unlink('uploads/'.$row['hinhanh']);
                }

            }else {// nếu người dùng không thay đổi hình ảnh
                $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',
                masp='".$masp."',giasp='".$giasp."',
                soluong='".$soluong."', tomtat='".$tomtat."', noidung='".$noidung."',tinhtrang='".$tinhtrang."',
                id_danhmuc='".$danhmuc."' WHERE id_sanpham ='$_GET[idsanpham]'";
            }
            mysqli_query($mysqli, $sql_update);
            header('Location:../../index.php?action=quanlysanpham&query=them');
        
    }else{
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while ($row = mysqli_fetch_array($query)) {
           unlink('uploads/'.$row['hinhanh']);//xóa tệp tin cột hinhanh tại đường dẫn uploads
        }
        $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }
?>