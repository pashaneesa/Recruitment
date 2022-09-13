<?php
include "../dbconnect.php";
if(isset($_POST["input"])) {
    $id_user = $_POST['id_user'];
    $ktp = $_POST['ktp'];
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

    $sql_insert=mysqli_query($connect_db, "INSERT INTO `recruitment`.`profile` (`id_name`, `id_user`, `id_card`, `name`, `dob`, `religion`, `gender`, `status`, `nationality`, `height`, `weight`, `phone`, `email`, `blood`, `address`, `education`, `name_e`, `y_start`, `y_end`, `why_join`, `yourself`, `reasons`, `photo`) VALUES (NULL, $id_user, '$ktp', '$name', '$dob','$religion','$gender','$status','$nationality','$height','$weight','$phone','$email','$blood','$address','$education','$name_e','$y_start','$y_end','$why_join','$yourself','$reasons','$fileName');");
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../admin/gambar/user/".$_FILES['gambar']['name']);
    $sql_update=mysqli_query($connect_db, "UPDATE `login` SET `stat`='sudah' WHERE id_user = '$id_user'");
                                                 
    echo "<script type='text/javascript'>
      alert('Terima Kasih telah mengisi form!'); window.location = 'welcome.php'</script>";
}
?>