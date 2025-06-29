<style>
    /* hinh anh truoc khi them vao quan ly san pham*/
    .table td img {
        width: 100px;
        height: 100px;
    }
</style>
<?php
    $sql_sua_bv = "SELECT * FROM tbl_baiviet WHERE id ='$_GET[idbaiviet]' LIMIT 1";
    $query_sua_bv = mysqli_query($mysqli, $sql_sua_bv);
?>
<p style="font-size: 25px;text-align:center;font-weight: bold;">Sửa bài viết</p>
<div class="table-responsive">
    <table class="table table-borderless">
        <?php
            while ($row = mysqli_fetch_array($query_sua_bv)) {
        ?>
        <form method="POST" action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id']?>" enctype="multipart/form-data">
            <tr>
                <td  style="font-size: 15px;">Tên bài viết</td>
                <td><input class="rowdangky1"  type="text" value="<?php echo $row['tenbaiviet']?>" name="tenbaiviet"> </td>
            </tr>

            <tr>
                <td  style="font-size: 15px;">Hình ảnh</td>
                <td>
                    <input  type="file" name="hinhanh" id="image">
                    <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
                    <td><div id="preview"></div></td>
                </td>
            </tr>

            <tr>
                <td  style="font-size: 15px;">Tóm tắt</td>
                <td><textarea class="rowdangky1"  rows="10" name="tomtat"><?php echo $row['tomtat']?></textarea></td>
            </tr>

            <tr>
                <td  style="font-size: 15px;">Nội dung</td>
                <td><textarea class="rowdangky1"  rows="10" name="noidung"><?php echo $row['noidung']?></textarea></td>
            </tr>
            
            <tr>
                <td style="font-size: 15px;">Danh mục bài viết</td>
                <td>
                    <select name="danhmuc">
                        <?php
                            $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                if ($row_danhmuc['id_baiviet'] == $row['id_danhmuc']) {
                        ?>
                            <option selected value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?>
                            </option>
                        <?php
                                } else{
                        ?>
                            <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?>
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
                <td colspan="2"><input  class="bdksp"  type="submit" name="suabaiviet" value="Sửa bài viết"></td>
            </tr>
        </form>

        <?php
            }
        ?>
    </table>
</div>