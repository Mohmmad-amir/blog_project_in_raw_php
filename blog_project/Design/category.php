<?php
include "../Admin/connection.php";
include "./header.php";

// if ($db_connection == true) {
//   echo "fine";
// } else {
//   echo "error";
// }
$category = $_GET['category'];

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $lastID = $_GET['lastId'];
  $select_sql_travel = "SELECT  * FROM `post` WHERE `category`='$category' and `id` > '$lastID' limit 1 ";
} else {
  $page = 1;
  $select_sql_travel = "SELECT  * FROM `post` WHERE `category`='$category' limit 1 ";
}
$run_select_sql_travel = mysqli_query($db_connection, $select_sql_travel);

?>
<main class="container">
  <!-- Category Banner -->
  <!-- <div class="category-banner">
      <img width="100%" height="300px" src="./images/Pic_1.jpg" alt="" />
    </div> -->
  <!-- Carousel End -->

  <section class="p-2 bg-white">
    <div class="title-box bg-doncky-2 overflow-hidden">
      <h1 class="title"><?php echo $category ?></h1>
    </div>
    <div class="row mt-4">
      <!-- div start -->

      <?php while ($post_data = mysqli_fetch_assoc($run_select_sql_travel)) {
        $lastID = $post_data['id'];
      ?>

        <div class="col-md-4">
          <div class="post">
            <img src="../Admin/input_image/<?php echo $post_data['image'] ?>" class="post-img" alt="" />
            <h2 class="f-20 mt-3">
              <?php echo $post_data['title'] ?> </h2>
            <div class="mt-3">
              <hr />
              <span>
                <i class="fa fa-calendar"></i>
                <strong class="ml-2"><?php echo $post_data['date'] ?></strong></span>
              <hr />
            </div>
            <div>
              <p class="narrow">
                <?php echo $post_data['short_desc'] ?>
              </p>
            </div>
            <a href="postPage.php?Mid=<?php echo $post_data['id'] ?>" class="btn rounded bg-docnky-special text-white px-4">
              Read More</a>
          </div>
        </div>
      <?php } ?>

      <!-- div close -->
    </div>
  </section>
  <section class="pagination">
    <div style="width: 350px; margin: 20px auto">
      <a class="pag-link" href="">&#60;&#60;</a>
      <a class="pag-link active" href="./category.php?category=<?php echo $category ?>&page=1&lastId=<?php echo $lastID ?>">1</a>
      <a class="pag-link" href="./category.php?category=<?php echo $category ?>&page=2&lastId=<?php echo $lastID ?>">2</a>
      <a class="pag-link" href="./category.php?category=<?php echo $category ?>&page=3&lastId=<?php echo $lastID ?>">3</a>
      <a class="pag-link" href="./category.php?category=<?php echo $category ?>&page=4&lastId=<?php echo $lastID ?>">4</a>
      <a class="pag-link" href="./category.php?category=<?php echo $category ?>&page=5&lastId=<?php echo $lastID ?>">5</a>
      <a class="pag-link" href="">&#62;&#62;</a>
    </div>
  </section>
</main>


<?php
include "./footer.php";
?>