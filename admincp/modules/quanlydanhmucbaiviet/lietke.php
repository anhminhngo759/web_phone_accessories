<?php
    $sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
    $query_lietke_danhmubv = mysqli_query($mysqli, $sql_lietke_danhmucbv);
?>
<p style="font-size: 15px;">Liệt kê danh mục bài viết</p>
<table class="listed">
        <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Quản lý</th>
        </tr>

        <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_danhmubv)) {
                $i++;
        ?>

        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
            <td>
                <a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>">Xóa</a> | <a href="
                ?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a>
            </td>
        </tr>

        <?php
            }
        ?>

</table>