<?php
if(isset($_POST['edit'])){
    include "../dbconnect.php";
  $id_per = $_POST['id_per'];
  $nama_per = $_POST['nama_per'];
  $nama_dir = $_POST['nama_dir'];
  $alamat = $_POST['alamat'];
  $no_tlp = $_POST['no_tlp'];
  $email = $_POST['email'];
  $deskripsi = $_POST['deskripsi'];
  $visi_misi = $_POST['visi_misi'];
  $posisi = implode($_POST['posisi'], ', ');
  $tgl_buka = $_POST['tgl_buka'];
  $tgl_tutup = $_POST['tgl_tutup'];
  $fileName = $_FILES['gambar']['name'];

   $query = "UPDATE `recruitment`.`perusahaan` SET `id_per` = '$id_per', `nama_per` = '$nama_per', `nama_dir` = '$nama_dir', `alamat` = '$alamat', `no_tlp` = '$no_tlp', `email` = '$email', `deskripsi` = '$deskripsi', `visi_misi` = '$visi_misi', `posisi` = '$posisi', `tgl_buka` = '$tgl_buka', `tgl_tutup` = '$tgl_tutup', `foto` = '$fileName';";
    $result = mysqli_query($connect_db, $query);
    move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/perusahaan/".$_FILES['gambar']['name']);

    echo "<script type='text/javascript'>
        alert('Data berhasil diubah!'); window.location = 'tampil_per.php'</script>";
}
?>