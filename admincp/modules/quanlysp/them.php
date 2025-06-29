<style>
    /* hinh anh truoc khi them vao quan ly san pham*/
    .table td img {
        width: 100px;
        height: 100px;
    }
</style>
<h3 style="font-size: 25px;text-align:center;font-weight: bold;">Quản lý sản phẩm</h3>
<p style="font-size: 15px;">Thêm sản phẩm</p>
<div class="table-responsive">
    <table class="table table-borderless">
        <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
            <tr>
                <td style="font-size: 15px;">Tên sản phẩm</td>
                <td><input class="rowdangky1" type="text" name="tensanpham"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Mã sản phẩm</td>
                <td><input class="rowdangky1" type="text" name="masp"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Giá sản phẩm</td>
                <td><input class="rowdangky1" type="text" name="giasp"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Số lượng</td>
                <td><input class="rowdangky1" type="text" name="soluong"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Hình ảnh</td>
                <td><input class="rowdangky1" type="file" name="hinhanh" id="image" size="60"> </td>
                <td><div id="preview"></div></td>
               
               
            </tr>

            <tr>
                <td style="font-size: 15px;">Tóm tắt</td>
                <td><textarea class="rowdangky1" rows="10" cols="30" name="tomtat" ></textarea></td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Nội dung</td>
                <td><textarea class="rowdangky1" rows="10" name="noidung"></textarea></td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Danh mục sản phẩm</td>
                <td>
                    <select name="danhmuc">
                        <?php
                            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Tình trạng</td>
                <td>
                    <select name="tinhtrang">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Ẩn</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2"><input class="bdksp"  type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
            </tr>
        </form>
    </table>
</div>
