<?php
//for session
session_start();
if (!$_SESSION['user_email']) {
    header('location:login.php');
}

include "./connection.php";
include "./header.php";
// if ($db_connection == true) {
//     echo "fine";
// } else {
//     echo "error";
// }
$select_sql = "SELECT * FROM `banner`";
$run_select_sql = mysqli_query($db_connection, $select_sql);

if (isset($_POST['add_btn'])) {

    $uniqueID = date("Y-M-D-H-i-s");
    $pic_name = $_FILES['image']['name'];
    $pic_new_name = $uniqueID . "-" .  $pic_name;
    $pic_location = $_FILES['image']['tmp_name'];

    $pic_new_location = move_uploaded_file($pic_location, "upload/$pic_new_name");

    $insert_sql = "INSERT INTO `banner` (`image`) VALUES ('$pic_new_name')";
    $run_insert_sql = mysqli_query($db_connection, $insert_sql);

    if ($run_delete_sql == true) {
        header('location:index.php?msg=success');
    } else {
        header('location:index.php?msg=failed');
    }
}

if (isset($_POST['delete_btn'])) {
    $deleteID = $_GET['DID'];
    $delete_image_name = $_GET['image'];
    unlink("upload/$delete_image_name");
    $delete_sql = "DELETE FROM `banner` WHERE `id`='$deleteID'";
    $run_delete_sql = mysqli_query($db_connection, $delete_sql);

    if ($run_delete_sql == true) {
        header('location:index.php?msg=success');
    } else {
        header('location:index.php?msg=failed');
    }
}



?>
<h2 class="text-center py-4">Banner</h2>
<form class="row g-3 justify-content-center" method="post" action="" enctype="multipart/form-data">
    <div class="col-auto">
        <input type="file" name="image" class="custom-file-input" id="inputPassword2">
        <label for="exampleInputEmail1" class="custom-file-label">Image</label>

    </div>
    <div class="col-auto">
        <button type="submit" name="add_btn" class="btn btn-primary px-4 mb-3">Add</button>
    </div>
</form>

<table class="text-white mt-4 table table-dark">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($banner_data = mysqli_fetch_assoc($run_select_sql)) { ?>
            <tr>
                <th scope="row"><?php echo $banner_data['id'] ?></th>
                <td>
                    <img style="width: 100px;" src="upload/<?php echo $banner_data['image'] ?>" alt="">
                </td>
                <td>
                    <form method="post" class="" action="index.php?DID=<?php echo $banner_data['id'] ?>&image=<?php echo $banner_data['image'] ?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"><i class="px-1 fas fa-trash"></i>DELETE</button>

                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
include "./footer.php";
?>