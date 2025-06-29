<?php
    require('../../../tfpdf/tfpdf.php');
    require('../../config/config.php');

    $pdf = new tFPDF();
    // hien thi page theo chieu ngang
    $pdf->AddPage("0");

	// Add a Unicode font (uses UTF-8)
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',15);
	$pdf->SetFillColor(193,229,252);

    $code = $_GET['code'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham,tbl_cart
    WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham
    AND tbl_cart_details.code_cart = tbl_cart.code_cart
    AND tbl_cart_details.code_cart='".$code."'
    ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);

	// $i = 0;
	// $tongtien= 0;
	// while($row = mysqli_fetch_array($query_lietke_dh)) {
	// 	$i++;
	// 	$thanhtien = $row['giasp'] * $row['soluongmua'];
	// 	$tongtien += $thanhtien;
	// }

    $pdf->Write(10,'Đơn hàng của bạn gồm có:');
	$pdf->Ln(10);

	$width_cell=array(6,20,65,20,54,54,20,25,25);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true);
	$pdf->Cell($width_cell[4],10,'Ngày đặt hàng',1,0,'C',true); 
	$pdf->Cell($width_cell[5],10,'Ngày giao hàng',1,0,'C',true); 
	$pdf->Cell($width_cell[6],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[7],10,'Thành tiền',1,1,'C',true); 
	// $pdf->Cell($width_cell[8],10,'Tổng tiền',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
	$tongtien= 0;
	// while($row = mysqli_fetch_array($query_lietke_dh)){
	// 	$i++;
	// 	$thanhtien = $row['giasp'] * $row['soluongmua'];
	// 	$tongtien += $thanhtien;
	// 	}
	while($row = mysqli_fetch_array($query_lietke_dh)){
		$i++;
		$thanhtien = $row['giasp'] * $row['soluongmua'];
		$tongtien += $thanhtien;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['code_cart'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['tensanpham'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['soluongmua'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,$row['cart_date'],1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,$row['ngaydat'],1,0,'C',$fill);
	$pdf->Cell($width_cell[6],10,number_format($row['giasp']),1,0,'C',$fill);
	$pdf->Cell($width_cell[7],10,number_format($row['soluongmua']*$row['giasp']),1,0,'C',$fill);
	    // Xuống dòng mới
		$pdf->Ln();
	// $pdf->Cell($width_cell[8],10,number_format($tongtien),1,1,'C',$fill);
	$fill = !$fill;
	}

	$pdf->Cell($width_cell[6] * 9.4, 10, 'Tổng tiền', 1, 0, 'C'); // Chiếm 6 ô
	$pdf->Cell($width_cell[7] * 3, 10, number_format($tongtien), 1, 0, 'C');
	$pdf->Ln(); // Xuống dòng mới

	// $pdf->Cell($width_cell[8], 10, number_format($tongtien), 1, 0, 'C', $fill);
	$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');

	$pdf->Ln(10);
    $pdf->Output();
?>