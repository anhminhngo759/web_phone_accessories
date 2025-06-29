<style>
    /* hinh anh truoc khi them vao quan ly san pham*/
    .table td img {
        width: 100px;
        height: 100px;
    }
</style>
<?php
    $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<p style="font-size: 25px;text-align:center;font-weight: bold;">Sửa sản phẩm</p>
<div class="table-responsive">
    <table class="table table-borderless">
        <?php
            while ($row = mysqli_fetch_array($query_sua_sp)) {
        ?>
        <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>" enctype="multipart/form-data">
            <tr>
                <td style="font-size: 15px;">Tên sản phẩm</td>
                <td><input class="rowdangky1" type="text" value="<?php echo $row['tensanpham']?>" name="tensanpham"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Mã sản phẩm</td>
                <td><input class="rowdangky1" type="text" value="<?php echo $row['masp']?>" name="masp"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Giá sản phẩm</td>
                <td><input class="rowdangky1" type="text" value="<?php echo $row['giasp']?>" name="giasp"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Số lượng</td>
                <td><input class="rowdangky1" type="text" value="<?php echo $row['soluong']?>" name="soluong"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Hình ảnh</td>
                <td>
                    <input type="file" name="hinhanh" id="image">
                    <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"> 
                    <td><div id="preview"></div></td>
                </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Tóm tắt</td>
                <td><textarea class="rowdangky1" rows="10" name="tomtat" ><?php echo $row['tomtat']?></textarea></td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Nội dung</td>
                <td><textarea class="rowdangky1" rows="10" name="noidung" ><?php echo $row['noidung']?></textarea></td>
            </tr>
            
            <tr>
                <td style="font-size: 15px;">Danh mục sản phẩm</td>
                <td>
                    <select name="danhmuc">
                        <?php
                            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                if ($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']) {
                        ?>
                            <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?>
                            </option>
                        <?php
                                } else{
                        ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?>
                            </option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Tình trạng</td>
                <td>
                    <select name="tinhtrang">
                        <?php
                            if ($row['tinhtrang'] == 1) {                        
                        ?>
                                <option value="1" selected>Kích hoạt</option>
                                <option value="0">Ẩn</option>
                        <?php
                            } else {
                        ?>
                                <option value="1">Kích hoạt</option>
                                <option value="0" selected>Ẩn</option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2"><input class="bdksp"  type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
            </tr>
        </form>

        <?php
            }
        ?>
    </table>
</div>