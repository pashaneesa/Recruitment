<?php
if(isset($_POST['edit'])){
  include "../dbconnect.php";
  $id_name = $_POST['id_name'];
  $id_card = $_POST['id_card'];
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $status = $_POST['status'];
  $religion = $_POST['religion'];
  $blood = $_POST['blood'];
  $nationality = $_POST['nationality'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $education = $_POST['education'];
  $name_e = $_POST['name_e'];
  $y_start = $_POST['y_start'];
  $y_end = $_POST['y_end'];
  $why_join = $_POST['why_join'];
  $yourself = $_POST['yourself'];
  $reasons = $_POST['reasons'];
  $fileName = $_FILES['gambar']['name'];

   $query = "UPDATE `recruitment`.`profile` SET `id_name` = '$id_name', `id_card` = '$id_card', `name` = '$name', `dob` = '$dob', `religion` = '$religion', `gender` = '$gender', `status` = '$status', `nationality` = '$nationality', `height` = '$height', `weight` = '$weight', `phone` = '$phone', `email` = '$email', `blood` = '$blood', `address` = '$address', `education` = '$education', `name_e` = '$name_e', `y_start` = '$y_start', `y_end` = '$y_end', `why_join` = '$why_join', `yourself` = '$yourself', `reasons` = '$reasons', `photo` = '$fileName' WHERE `profile`.`id_name` = '$id_name';";
    $result = mysqli_query($connect_db, $query);
    move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/user/".$_FILES['gambar']['name']);

    echo "<script type='text/javascript'>
        alert('Data berhasil diubah!'); window.location = 'tampil.php'</script>";
}
?>