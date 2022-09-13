<?php
session_start();
include "../dbconnect.php";
$id_user = $_SESSION['id_user'];
$vara = mysqli_query($connect_db, "SELECT * FROM `perusahaan` WHERE `id_user` = '$id_user'");
$dataa = mysqli_fetch_array($vara);
$nama_per = $dataa['nama_per'];

include "fpdf181/fpdf.php";

$pdf = new FPDF('P','mm','A4');//P atau L = orientasi kertas, mm = ukuran, A4 = jenis kertas
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',14);//Arial = jenis huruf, B = format huruf, 10 = ukuran
//$pdf->Cell(40,10,'',1);//40 = panjang, 10 = tinggi, 1 = tingkat ketebalan garis
$pdf->MultiCell(0,4,"DATA PELAMAR",2,'C');
$pdf->Ln(5);
$pdf->MultiCell(0,4,$nama_per,2,'C');

$pdf->SetFont('Arial','B',11);//Arial = jenis huruf, B = format huruf, 10 = ukuran
$pdf->Ln(10);//Ln = pindah baris
$pdf->Cell(10,10,'No','1');
$pdf->Cell(50,10,'Nama Pelamar','1');
$pdf->Cell(40,10,'Nilai Tulis','1');
$pdf->Cell(40,10,'Nilai Interview','1');
$pdf->Cell(40,10,'Status','1');

//pindah baris
$pdf->Ln(10);
$query=mysqli_query($connect_db, "SELECT * FROM status");
$no=1;
while($data = mysqli_fetch_array($query)){
	$pdf->Cell(10,10, $no, 1);
	$pdf->Cell(50,10, $data["name"],1);
	$pdf->Cell(40,10, $data["w_score"],1);
	$pdf->Cell(40,10, $data["i_score"],1);
	$pdf->Cell(40,10, $data["status"],1);
	$pdf->Ln(10);
	$no++;
}
//cetak
$pdf->Output();

