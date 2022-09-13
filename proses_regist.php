 <?php
include "dbconnect.php";
if(isset($_POST["signup"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    $sql_insert=mysqli_query($connect_db, "INSERT INTO `recruitment`.`login` (`id_user`, `username`, `email`, `password`, `level`, `stat`) VALUES (NULL, '$username', '$email', '$password', '$level','belum');");
    echo "<script type='text/javascript'>
      alert('Terima Kasih telah melakukan registrasi!');
      window.location = 'login.php'</script>";
 // header("location:index.php");
}
?>