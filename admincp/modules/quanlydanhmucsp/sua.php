<?php
    $sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>
<p style="font-size: 25px;text-align:center;font-weight: bold;">Sửa danh mục sản phẩm</p>
<div class="table-responsive">
    <table class="table table-borderless">
        <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
            <?php
                while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) {    
            ?>

            <tr>
                <td style="font-size: 15px;">Tên danh mục</td>
                <td><input class="rowdangky1" type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc" size="50"> </td>
            </tr>

            <tr>
                <td style="font-size: 15px;">Thứ tự</td>
                <td><input class="rowdangky1" type="text" value="<?php echo $dong['thutu'] ?>" name="thutu" size="50"> </td>
            </tr>

            <tr>
                <td colspan="2"><input class="bdksp" type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"> </td>
            </tr>

            <?php
            }
            ?>
        </form>
    </table>
</div>