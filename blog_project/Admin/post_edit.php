<?php


include "./connection.php";
include "./header.php";

$editId = $_GET['EID'];
$editName = $_GET['image'];

$select_sql = "SELECT * FROM `post` WHERE `id`='$editId'";
$run_select_sql = mysqli_query($db_connection, $select_sql);

$post_data = mysqli_fetch_assoc($run_select_sql);

$Old_picture_name = $post_data['image'];

if (isset($_POST['update_btn'])) {

    if ($_FILES['img']['name']) {
        unlink("input_image/$Old_picture_name");
        $uniqueID = date("Y-M-D-H-i-s");
        $picture_old_name = $_FILES['img']['name'];
        $picture_new_name = $uniqueID . "_" . $picture_old_name;
        $picture_tmp_location = $_FILES['img']['tmp_name'];
        $picture_new_location = move_uploaded_file($picture_tmp_location, "input_image/$picture_new_name");
    } else {
        $picture_new_name = $Old_picture_name;
    }

    $title = $_POST['title'];
    $category = $_POST['cata_option'];
    $post_author = $_POST['author_name'];
    $post_short = $_POST['short_desc'];
    $post_details = $_POST['details'];
    $update_sql = "UPDATE `post` SET `category`='$category',`title`='$title',`image`='$picture_new_name',`author_name`='$post_author',`short_desc`='$post_short',`details`='$post_details' WHERE `id`='$editId'";
    $run_update_sql = mysqli_query($db_connection, $update_sql);
    if ($run_update_sql == true) {
        echo "true";
    } else {
        echo "false";
    }
}

?>
<style>
    .select_width {
        width: 40%;
        height: 40px;
        text-align: center;
    }
</style>

<h2 class="text-center py-4">Create Post</h2>

<form class="mt-4 px-4" action="" method="post" enctype="multipart/form-data">
    <label for="exampleInputEmail1" class="form-label pr-3">Category</label>
    <select class="form-select select_width mb-3" value="<?php echo $post_data['category'] ?>" name="cata_option" aria-label="Default select example">
        <option>Select Option</option>
        <option selected><?php echo $post_data['category'] ?></option>
        <option value="Travel">Travel</option>
        <option value="Movie">Movie</option>
        <option value="Business">Business</option>
        <option value="Sports">Sports</option>
        <option value="Science">Science</option>
    </select>
    <img style="width:200px; height:100px;" src="input_image/<?php echo $post_data['image'] ?>" alt="">

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="title" value="<?php echo $post_data['title'] ?>" class=" form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input type="file" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Author Name</label>
                <input type="text" value="<?php echo $post_data['author_name'] ?>" name="author_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <textarea class="form-control" name="short_desc" placeholder="Leave a short details here" id="floatingTextarea"><?php echo $post_data['short_desc'] ?></textarea>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-floating mb-4">
                <textarea class="form-control" name="details" placeholder="Leave a details here" id="floatingTextarea"><?php echo $post_data['details'] ?></textarea>
            </div>
        </div>

    </div>
    <!-- row close -->


    <button type="submit" name="update_btn" class="btn btn-primary px-4 py-2">Update</button>

</form>


<?php
include "./footer.php";
?>