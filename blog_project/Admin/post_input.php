<?php

session_start();
if (!$_SESSION['user_email']) {
    header('location:login.php');
}
include "./connection.php";
include "./header.php";

if (isset($_POST['submit_btn'])) {
    $uniqueID = date("Y-M-D-H-i-s");
    $picture_old_name = $_FILES['img']['name'];
    $picture_new_name = $uniqueID . "_" . $picture_old_name;
    $picture_tmp_location = $_FILES['img']['tmp_name'];
    $picture_new_location = move_uploaded_file($picture_tmp_location, "input_image/$picture_new_name");
    $title = $_POST['title'];
    $category = $_POST['cata_option'];
    $post_author = $_POST['author_name'];
    $post_short = $_POST['short_desc'];
    $post_details = $_POST['details'];


    $insert_sql = "INSERT INTO `post`( `category`, `title`, `image`, `author_name`, `short_desc`, `details`) 
    VALUES ('$category','$title','$picture_new_name','$post_author','$post_short','$post_details')";
    $run_insert_sql = mysqli_query($db_connection, $insert_sql);
    if ($run_insert_sql == true) {
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

    .image_input {
        margin-top: 32px;
    }

    .resize-none {
        resize: none;
    }
</style>

<h2 class="text-center py-4">Create Post</h2>

<form class="mt-4 px-4" action="" method="post" enctype="multipart/form-data">
    <label for="exampleInputEmail1" class="form-label pr-3">Category</label>
    <select class="form-select select_width mb-3 custom-select mr-sm-2 " name="cata_option" aria-label="Default select example">
        <option selected="">Select Option</option>
        <option value="Travel">Travel</option>
        <option value="Movie">Movie</option>
        <option value="Business">Business</option>
        <option value="Sports">Sports</option>
        <option value="Science">Science</option>
    </select>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input required type="text" name="title" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 image_input custom-file">
                <input required type="file" name="img" class="custom-file-input " id="exampleInputEmail1" aria-describedby="emailHelp">
                <label for="exampleInputEmail1" class="custom-file-label">Image</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Author Name</label>
                <input required type="text" name="author_name" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <textarea required class="form-control resize-none" name="short_desc" placeholder="Leave a short details here" id="floatingTextarea"></textarea>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-floating mb-4">
                <textarea required class="form-control resize-none" name="details" placeholder="Leave a details here" id="floatingTextarea"></textarea>
            </div>
        </div>

    </div>
    <!-- row close -->

    <button type="submit" name="submit_btn" class="btn btn-primary px-4 py-2">Submit</button>
</form>


<?php
include "./footer.php";
?>