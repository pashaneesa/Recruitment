<?php
session_start();
include "../dbconnect.php";
//perusahaan
$id_user = $_SESSION['id_user'];
$vara = mysqli_query($connect_db, "SELECT * FROM `perusahaan` WHERE `id_user` = '$id_user'");
$dataa = mysqli_fetch_array($vara);
$nama_per = $dataa['nama_per'];

//user
$id = $_GET["id_status"];
$var = mysqli_query($connect_db, "SELECT * FROM `status` WHERE `id_status` = '$id'");
$data = mysqli_fetch_array($var);

    $id_status = $data['id_status'];
    $name = $data['name'];
    $dob = date("d F Y", strtotime($data['dob']));
    $religion = $data['religion'];
    $phone = $data['phone'];
    $email = $data['email'];
    $address = $data['address'];
    $photo = $data['photo'];
    $w_score = $data['w_score'];
    $i_score = $data['i_score'];
    $comment = $data['comment'];
    $status = $data['status'];

include "fpdf181/fpdf.php";

$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

$pdf->MultiCell(0,4,"DETAIL DATA PELAMAR",2,'C');
$pdf->Ln(5);
$pdf->MultiCell(0,4,$nama_per,2,'C');

$pdf->SetFont('Arial','B',12);
$pdf->SetX(3);
$pdf->Image('../admin/gambar/user/'.$photo,130,50,50,60);//..,jarak,lebar,tinggi
$pdf->Ln(5);
$pdf->MultiCell(0,60,'Nama Lengkap : '.$name,40,'L');
$pdf->MultiCell(0,-45,'Tanggal Lahir   : '.$dob,0,'L');
$pdf->MultiCell(0,60,'Alamat              : '.$address,40,'L');
$pdf->MultiCell(0,-45,'Agama              : '.$religion,0,'L');
$pdf->MultiCell(0,60,'No. Telepon     : '.$phone,40,'L');
$pdf->MultiCell(0,-45,'Email                : '.$email,0,'L');

$pdf->MultiCell(0,110,"HASIL",2,'C');
$pdf->Ln(-50);//Ln = pindah baris
$pdf->Cell(40,10,'Nilai Tulis','1');
$pdf->Cell(40,10,'Nilai Interview','1');
$pdf->Cell(60,10,'Komentar','1');
$pdf->Cell(40,10,'Status','1');

//pindah baris
$pdf->Ln(10);
	$pdf->Cell(40,10, $data["w_score"],1);
	$pdf->Cell(40,10, $data["i_score"],1);
	$pdf->Cell(60,10, $data["comment"],1);
	$pdf->Cell(40,10, $data["status"],1);
	$pdf->Ln(10);

$pdf->Output();
?>