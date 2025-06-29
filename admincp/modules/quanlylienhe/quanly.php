<p style="font-size: 25px;text-align:center;font-weight: bold;">Quản lý liên hệ website</p>
<!-- <p  style="font-size: 15px;">Quản lý liên hệ website</p> -->
<?php
    $sql_lh = "SELECT * FROM tbl_lienhe WHERE id = 1";
    $query_lh = mysqli_query($mysqli, $sql_lh);
?>
<table class="add">
    <?php
        while ($dong = mysqli_fetch_array($query_lh)) {    
    ?>
    <form method="POST" action="modules/quanlylienhe/xuly.php?id=<?php echo $dong['id'] ?>" enctype="multipart/form-data">

        <tr>
            <td>Thông tin liên hệ</td>
            <td><textarea rows="10" name="thongtinlienhe"><?php echo $dong['thongtinlienhe'] ?></textarea></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="submitlienhe" value="Cập nhật"></td>
        </tr>

    <?php
        }
    ?>
    </form>
</table>