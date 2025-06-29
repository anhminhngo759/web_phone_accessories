<?php
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    include('../config/config.php');
    require('../../carbon/autoload.php');
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
    if (isset($_POST['thoigian'])) {// lay thoi gian
        $thoigian = $_POST['thoigian'];
    } else { // thoi gian rong
        $thoigian='';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    }

    if ($thoigian == '7ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    } elseif ($thoigian == '28ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
    } elseif ($thoigian == '90ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
    } elseif ($thoigian == '365ngay') {
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();    
    }

    //thoi gian hien tai - 365 ngay tra ve ngay thang thu
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    //
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    // thong ke du lieu tu 1 nam truoc toi ngay hien tai - 1 
    $sql = "SELECT * FROM tbl_thongke WHERE ngaydat BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC";
    $sql_query = mysqli_query($mysqli, $sql);

    while ($val = mysqli_fetch_array($sql_query)) {
        $chart_data[] = array(
            'date' => $val['ngaydat'],
            'order' =>  $val['donhang'],
            'sales' => $val['doanhthu'],
            'quantity' => $val['soluongban']
        );
    }
    echo $data = json_encode($chart_data);
?>