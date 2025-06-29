<?php
    // neu bam vao trang
    if (isset($_GET['trang'])) {
        // lay so trang hien tai
        $page = $_GET['trang'];
    } else { // neu trang o mac dinh
        $page = 1;
    }
    if ($page == '' || $page == 1) {
        $begin = 0;
    } else {
        $begin = ($page * 3) - 3;
    }
    // bat dau o vi tri begin toi gioi han sp la 3
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc= tbl_danhmuc.id_danhmuc 
    ORDER BY tbl_sanpham.id_sanpham DESC LIMIT  $begin,3";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3>Sản phẩm mới nhất</h3>
<div class="row">
    <?php
        while ($row = mysqli_fetch_array($query_pro)) {
    ?>
    <!--2 cot = 6 * 2 = 12 la duoc 6 san pham-->
    <div class="col-md-2">
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img class="img img-responsive" width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="air">
            <p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham'] ?></p>
            <p class="price_product">Giá : <?php echo number_format($row['giasp'], 0, ',', '.').'vnd'?></p>
            <!-- <p id="namedm"><?php echo $row['tendanhmuc'] ?></p> -->
        </a>
    </div>
    <?php
        }
    ?>
</div>
<div style="clear: both;"></div>

<style type="text/css">
    /* ul.list_trang {
        padding: 0;
        margin: 0;
        list-style: none;
    }
    ul.list_trang li {
    float: left;
    padding: 5px 13px;
    margin: 5px;
    background-color: burlywood;
    display: block;
    }
    ul.list_trang li a {
        color: black;
        text-align: center;
        text-decoration: none;    
    } */
</style>

<!-- Phan trang -->
<?php
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
    // lay tat ca so hang cua bang san pham
    $row_count = mysqli_num_rows($sql_trang);
    // lam tron tong so trang
    $trang = ceil($row_count / 3);
?>
<p>Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?></p>

<div class="pagination">
<?php
        // lay lan luot so trang 
        for ($i=1; $i <= $trang; $i++) { 
    ?>
        <li <?php if ($i == $page) {echo 'style="  background-color: #09F;
    color: white;"';} else{echo '';} ?>>
        <a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
        }
    ?>
</div>

<!-- <ul class="list_trang">
<?php
        // lay lan luot so trang 
        for ($i=1; $i <= $trang; $i++) { 
    ?>
        <li <?php if ($i == $page) {echo 'style="background: brown;"';} else{echo '';} ?>>
        <a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
        }
    ?>
</ul> -->

