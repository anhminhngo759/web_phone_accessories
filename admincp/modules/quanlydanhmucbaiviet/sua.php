<?php
    $sql_sua_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
    $query_sua_danhmucbv = mysqli_query($mysqli, $sql_sua_danhmucbv);
?>

<p style="font-size: 25px;text-align:center;font-weight: bold;">Sửa danh mục bài viết</p>
<div class="table-responsive">
    <table class="table table-borderless">
        <form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet']?>">
            <?php
                while ($dong = mysqli_fetch_array($query_sua_danhmucbv)) {    
            ?>
            <tr>
                <td style="font-size: 15px;">Tên danh mục bài viết</td>
                <td><input class="rowdangky1" type="text" value="<?php echo $dong['tendanhmuc_baiviet'] ?>" name="tendanhmucbaiviet" size="50"> </td>
            </tr>
            <tr>
                <td style="font-size: 15px;">Thứ tự</td>
                <td><input class="rowdangky1" type="text" value="<?php echo $dong['thutu'] ?>" name="thutu" size="50"> </td>
            </tr>
            <tr>
                <td colspan="2"><input class="bdksp" type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bài viết"> </td>
            </tr>

            <?php
            }
            ?>
        </form>
    </table>
</div>