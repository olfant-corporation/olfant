<?php
// Check if the requested file exists
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI']) && empty($incBlogHeader)) {
  header('HTTP/1.0 404 Not Found', true, 404);
    // If the file doesn't exist, redirect to the custom 404 error page
    include_once('../404.php');
    // End script execution
    exit;
} 

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Blogs</title>
      <meta name="description" content="">
      <link rel="icon" href="/assets/img/favicon-olfant.png" type="image/gif" sizes="16x16">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="/assets/css/main.css">
      <style>
      .card a {
        text-decoration: none;
        color: #000;
      }
      </style>
  </head>
  <body>
  <?php  include_once($_SERVER['DOCUMENT_ROOT'].'/components/header.php'); ?>
<div class="container-fluid p-3 p-lg-5">


<div class="row">
<?php
include "../config.php";

$limit = 12;
if (isset($_GET["page"])) {
  $page  = $_GET["page"];
  }
  else{
  $page= 1;
  };
$start_from = ($page-1) * $limit;
$sql = "SELECT * FROM `blogs` ORDER BY id DESC LIMIT $start_from, $limit";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
$shortcontent = substr($row['short_description'], 0, 30)."...";
$_SESSION['id'] = $row['id'];
$id =$row['id'];
$title = $row['title'];
$dis = str_replace(' ','-',$title);
$page_name = $row['title'];
//echo $dis;
?>
<div class="col-lg-3 d-flex align-items-stretch"style="margin-bottom:40px">
<div class="card mx-auto card-shadow">
<a href="<?php echo $row['page_name']; ?>"><img src="<?php echo $row['image']; ?>" alt="<?php echo $row['image_alt']; ?>" class="card-img-top">
<div class="card-body">
<h5 class="card-title"><?php echo str_replace('-', ' ', $row['title']); ?></h5>
<p class="card-text"><?php echo urldecode($row['short_desc']); ?></p>
<a href="<?php echo $row['page_name']; ?>" class="btn btn-green btn-sm p-2 mt-3" >READ MORE</a>
</div>
</div>
</div>

<?php
}
?>
</div>
</div>
</div>
<?php

$blog_pagination = mysqli_query($conn,"SELECT COUNT(id) FROM blogs");
$row_blog = mysqli_fetch_row($blog_pagination);
$total_records = $row_blog[0];
$total_pages = ceil($total_records / $limit);

$pagLink = "<ul class='pagination justify-content-center'>";
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='./?page=".$i."'>".$i."</a></li>";
}
echo $pagLink . "</ul>";
?>

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/components/footer.php');?>
</body>

</html>
