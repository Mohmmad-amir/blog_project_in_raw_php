<?php

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

$select_sql = "SELECT * FROM `post`";
$run_select_sql = mysqli_query($db_connection, $select_sql);

if (isset($_POST['delete_btn'])) {
    $deleteID = $_GET['DID'];
    $delete_image_name = $_GET['image'];
    unlink("input_image/$delete_image_name");
    $delete_sql = "DELETE FROM `post` WHERE `id`='$deleteID'";
    $run_delete_sql = mysqli_query($db_connection, $delete_sql);

    if ($run_delete_sql == true) {
        header('location:post_table.php?msg=success');
    } else {
        header('location:post_table.php?msg=failed');
    }
}



?>
<style>
    /* admin */
    .narrow {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        max-width: 150px;
    }
</style>
<h2 class="text-center py-4">All Posts</h2>


<table class="text-white mt-4 table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Author</th>
            <th scope="col">Short desc</th>
            <th scope="col">Details</th>
            <th scope="col">Date</th>
            <th scope="colspan" 2"">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($post_data = mysqli_fetch_assoc($run_select_sql)) { ?>
            <tr>
                <th scope="row"><?php echo $post_data['id'] ?></th>
                <td><?php echo $post_data['category'] ?></td>
                <td><?php echo $post_data['title'] ?></td>
                <td>
                    <img style="width: 100px;" src="input_image/<?php echo $post_data['image'] ?>" alt="">
                </td>
                <td ow"><?php echo $post_data['author_name'] ?></td>
                <td class="narrow"><?php echo $post_data['short_desc'] ?></td>
                <td class="narrow"> <?php echo $post_data['details'] ?></td>
                <td><?php echo $post_data['date'] ?></td>
                <td>
                    <a class=" btn btn-primary px-4" href="post_edit.php?EID=<?php echo $post_data['id'] ?>&image=<?php echo $post_data['image'] ?>"><i class="px-1 fas fa-edit"></i>EDIT</a>
                </td>
                <td>
                    <form method="post" class="" action="post_table.php?DID=<?php echo $post_data['id'] ?>&image=<?php echo $post_data['image'] ?>">
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