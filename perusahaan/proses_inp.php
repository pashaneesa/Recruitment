<?php
include "../dbconnect.php";
if(isset($_POST["input"])) {
    $id_user = $_POST['id_user'];
    $nama_per = $_POST['nama_per'];
    $nama_dir = $_POST['nama_dir'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $posisi = implode($_POST['posisi'], ', ');
    $deskripsi = $_POST['deskripsi'];
    $visi = $_POST['visi'];
    $tgl_buka = date('Y-m-d');
    $tgl_tutup = $_POST['tgl_tutup'];
    $fileName = $_FILES['gambar']['name'];

    $sql_insert=mysqli_query($connect_db, "INSERT INTO `perusahaan` (`id_per`, `id_user`, `nama_per`, `nama_dir`, `alamat`, `no_tlp`, `email`, `deskripsi`, `visi_misi`, `posisi`, `tgl_buka`, `tgl_tutup`, `foto`) VALUES (NULL, '$id_user', '$nama_per', '$nama_dir', '$alamat', '$no_telp', '$email', '$deskripsi', '$visi', '$posisi', '$tgl_buka', '$tgl_tutup', '$fileName');");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../admin/gambar/perusahaan/".$_FILES['gambar']['name']);
    $sql_update=mysqli_query($connect_db, "UPDATE `login` SET `stat`='sudah' WHERE id_user = '$id_user'");
                                                 
    echo "<script type='text/javascript'>
      alert('Terima Kasih telah mengisi form!'); window.location = 'welcomeper.php'</script>";
}
?>
