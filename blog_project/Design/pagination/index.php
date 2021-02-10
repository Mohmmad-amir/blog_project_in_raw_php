<?php

include "../paginationConnection.php";

// for ($i = 0; $i < 33; $i++) {
//     $name = uniqid();
//     $sql = "INSERT INTO `person` (`name`) VALUES ('$name')";
//     mysqli_query($pg_db_connection, $sql);
// }

$post_per_page = 10;
$sql = "SELECT * FROM `person`";
$result = mysqli_query($pg_db_connection, $sql);
$total_post = mysqli_num_rows($result);
// echo $total_post;
$total_page = ceil($total_post / $post_per_page);
// echo $total_page;

if (isset($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}
$start_limit = ($current_page - 1) * $post_per_page;

$main_sql = "SELECT * FROM `person` LIMIT " . $start_limit . "," . $post_per_page;

$main_result = mysqli_query($pg_db_connection, $main_sql);

while ($post = mysqli_fetch_array($main_result)) { ?>
    <span><?php echo $post['id'] ?></span>
    <span><?php echo $post['name'] ?></span>
    <br>
<?php }
//page 1 (0=10) = (1-1*10)
//page 2 (10=10)
//page 3 (20=10)



//page links
for ($i = 1; $i <= $total_page; $i++) {
    echo "<a href = './index.php?page=" . $i . "'>" . $i . "</a> ";
}
?>