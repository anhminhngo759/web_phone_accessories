<style>
    /* hinh anh truoc khi them vao quan ly san pham*/
    .table td img {
        width: 100px;
        height: 100px;
    }
</style>
<p style="font-size: 25px;text-align:center;font-weight: bold;">Quản lý bài viết</p>
<p style="font-size: 15px;">Thêm bài viết</p>
<div class="table-responsive">
    <table class="table table-borderless">
        <form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
            <tr>
                <td style="font-size: 15px;">Tên bài viết</td>
                <td><input class="rowdangky1" type="text" name="tenbaiviet"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Hình ảnh</td>
                <td><input class="rowdangky1" type="file" name="hinhanh" id="image"> </td>
                <td><div id="preview"></div></td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Tóm tắt</td>
                <td><textarea class="rowdangky1" rows="10" cols="30" name="tomtat" style="resize: none;"></textarea></td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Nội dung</td>
                <td><textarea class="rowdangky1" rows="10" name="noidung" style="resize: none;"></textarea></td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Danh mục bài viết</td>
                <td>
                    <select name="danhmuc">
                        <?php
                            $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                        <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
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
                <td colspan="2"><input class="bdksp" type="submit" name="thembaiviet" value="Thêm bài viết"></td>
            </tr>
        </form>
    </table>
</div>