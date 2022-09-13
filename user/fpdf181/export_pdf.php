<?php
		include "koneksi.php";
		include "fpdf181/fpdf.php";



		$pdf = new FPDF('P','mm','A4');//P atau L = orientasi kertas, mm = ukuran, A4 = jenis kertas
		$pdf->AddPage();
		$pdf->AliasNbPages();
		$pdf->SetFont('Arial','B',10);//Arial = jenis huruf, B = format huruf, 10 = ukuran
		//$pdf->Cell(40,10,'',1);//40 = panjang, 10 = tinggi, 1 = tingkat ketebalan garis
		$pdf->Cell(180,10,'Data Mahasiswa',0,0,'C'); 
		$pdf->Ln(10);//Ln = pindah baris
		$pdf->Cell(10,10,'No','1');
		$pdf->Cell(10,10,'Nama','1');
		$pdf->Cell(30,10,'NIM','1');
		$pdf->Cell(40,10,'Fakultas','1');
		$pdf->Cell(40,10,'Prodi','1');
		
		//pindah baris
		$pdf->Ln(10);

		$query=mysqli_query($connect_db, "SELECT * FROM datamhs");
		$no=0;

		while($data = mysql_fetch_array($query)){

			$pdf->Cell(10,10, $no, 1);
			$pdf->Cell(10,10, $data["nama"],1);
			$pdf->Cell(30,10, $data["nim"],1);
			$pdf->Cell(40,10, $data["fakultas"],1);
			$pdf->Cell(40,10, $data["prodi"],1);

			$pdf->Ln(10);
			$no++;

		}



		//cetak
		$pdf->Output();