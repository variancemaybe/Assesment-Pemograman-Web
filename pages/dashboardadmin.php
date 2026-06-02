<div id ="navbar3" class="navbar-collapse collapse">
    <ul class="nav navbar">
        <li><a href="index.php?p=dashboardadmin">Home</a></li>
        <li><a href="index.php?p=employeelist">Employee List</a></li>
        <li><a href="index.php?p=departmentlist">Department List</a></li>
        <li><a href="index.php?p=userlist">User List</a></li>
        <li><a href="index.php?p=projectlist">Project List</a></li>
        <li><a href="index.php?p=logout">Logout</a></li>
    </ul>
</div>

<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "<script> alert('Anda tidak memiliki akses ke halaman ini!'); </script>";
    echo "<script>window.location = 'index.php'</script>";
}
?>


<?php
    require_once('../pages/authorization_admin.php');
    require_once "../class/class.Connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>