<?php
include "../Admin/connection.php";
include "./header.php";


// if ($db_connection == true) {
//   echo "fine";
// } else {
//   echo "error";
// }
$select_sql = "SELECT * FROM `banner`";
$run_select_sql = mysqli_query($db_connection, $select_sql);

$select_dot_sql = "SELECT * FROM `banner`";
$run_select_dot_sql = mysqli_query($db_connection, $select_dot_sql);


$select_sql_travel = "SELECT  * FROM `post` WHERE `category`='Travel' ORDER BY `id` DESC LIMIT 3";
$run_select_sql_travel = mysqli_query($db_connection, $select_sql_travel);

$select_sql_business = "SELECT  * FROM `post` WHERE `category`='Business' ORDER BY `id` DESC LIMIT 3";
$run_select_sql_business = mysqli_query($db_connection, $select_sql_business);


// echo 'PHP version: ' . phpversion();


$count = 0;
//countTwo for the carousel dot
$countTwo = 0;
?>

<main class="container">
  <!-- Carousel Start -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php while ($dot_data = mysqli_fetch_assoc($run_select_dot_sql)) { ?>

        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="<?php $countTwo == 0 ? print("active") : "" ?>"></li>
      <?php $countTwo++;
      } ?>
      <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
    </ol>
    <div class="carousel-inner mt-3">
      <?php while ($banner_data = mysqli_fetch_assoc($run_select_sql)) { ?>

        <div class="carousel-item <?php $count == 0 ? print("active") : "" ?>" data-interval="2000">
          <img src="../Admin/upload/<?php echo $banner_data['image'] ?>" class="d-block w-100" alt="..." />
        </div>
      <?php $count++;
      } ?>

    </div>

  </div>
  <!-- Carousel End -->

  <section class="p-2 bg-white">
    <div class="title-box bg-doncky-2 overflow-hidden">
      <h1 class="title">Travel</h1>
    </div>
    <div class="row mt-4">
      <!-- start post -->
      <?php while ($post_data = mysqli_fetch_assoc($run_select_sql_travel)) { ?>
        <div class="col-md-4 mb-2">
          <div class="post">
            <img src="../Admin/input_image/<?php echo $post_data['image'] ?>" class="post-img" alt="" />
            <h2 class="f-20 mt-3">
              <?php echo $post_data['title'] ?>
            </h2>
            <div class="mt-3">
              <hr />
              <span>
                <i class="fa fa-calendar"></i>
                <strong class="ml-2"><?php echo $post_data['date'] ?></strong></span>
              <hr />
            </div>
            <div>
              <p class="narrow"> <?php echo $post_data['short_desc'] ?> </p>
            </div>
            <a href="postPage.php?Mid=<?php echo $post_data['id'] ?>" class="btn rounded bg-docnky-special text-white px-4">
              Read More</a>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="mt-3 clearfix">
      <a href="./category.php?category=Travel" class="float-right f-20">More &gt; &gt;</a>
    </div>
  </section>

  <section class="p-2 bg-white">
    <div class="title-box bg-doncky-2 overflow-hidden">
      <h1 class="title">Business</h1>
    </div>
    <div class="row mt-4">
      <!-- start div -->
      <?php while ($post_data = mysqli_fetch_assoc($run_select_sql_business)) { ?>

        <div class="col-md-4">
          <div class="post">
            <img src="../Admin/input_image/<?php echo $post_data['image'] ?>" class="post-img" alt="" />
            <h2 class="f-20 mt-3">
              <?php echo $post_data['title'] ?>
            </h2>
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
    </div>

    <!-- close div -->
    <div class="mt-3 clearfix">
      <a href="./category.php?category=Business" class="float-right f-20">More &gt; &gt;</a>
    </div>
  </section>
</main>

<?php
include "./footer.php";
?>