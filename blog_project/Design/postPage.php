<?php
include "../Admin/connection.php";
include "./header.php";

// if ($db_connection == true) {
//   echo "fine";
// } else {
//   echo "error";
// }
$MoreId = $_GET['Mid'];
$select_sql_two = "SELECT * FROM `post` WHERE `id`='$MoreId'";
$run_select_sql_two = mysqli_query($db_connection, $select_sql_two);
$post_data = mysqli_fetch_assoc($run_select_sql_two);

// for recent post

$select_sql_RP = "SELECT  * FROM `post`  ORDER BY `id` DESC limit 10";
$run_select_sql_RP = mysqli_query($db_connection, $select_sql_RP);

?>
<main class="container">
  <section>
    <div class="row">
      <div class="col-lg-8 mt-3">
        <div class="post-details py-4 bg-white px-3">
          <h1 class="f-20">
            <?php echo $post_data['title'] ?>
          </h1>
          <hr />
          <img class="img-fluid" src="../Admin/input_image/<?php echo $post_data['image'] ?>" alt="" />
          <div class="mt-3 mb-3 clearfix">
            <a href="#"><?php echo $post_data['author_name'] ?></a> | <strong> <?php echo $post_data['date'] ?> </strong>
            <a class="float-right" href="#">
              <i class="fab fa-facebook"> Share</i>
            </a>
          </div>
          <hr />
          <div class="articel">
            <p>
              <?php echo $post_data['details'] ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-3">
        <section class="p-2 bg-white">
          <div class="title-box bg-doncky-2 overflow-hidden">
            <h3 class="sub-title">Related Posts</h3>
          </div>
          <div class="post-link">
            <ul>
              <?php while ($RP_data = mysqli_fetch_assoc($run_select_sql_RP)) { ?>
                <li class="py-3">
                  <a href="postPage.php?Mid=<?php echo $RP_data['id'] ?>" class="py-3 px-2 bordered border-bottom rounded">
                    <?php echo $RP_data['title'] ?>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </section>
      </div>
    </div>
  </section>
</main>

<?php include "./footer.php"; ?>