<?php
$incBlogHeader = 'yes';
session_start();
include "../config.php";
$page =  basename($_SERVER['REQUEST_URI']);
mysqli_query($conn,'UPDATE `blogs` SET `views`= `views` + 1 WHERE page_name ="' . $page . '"');
$sql = 'SELECT * FROM blogs WHERE page_name ="' . $page . '"';
$query = mysqli_query($conn, $sql);
if ($query->num_rows > 0 ) {

} else {
  header("HTTP/1.0 404 Not Found");
  include_once('../404.php');
  die();
}
?>
<?php foreach($query as $q)
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php echo $q['page_title']; ?></title>
<meta name="description" content="<?php echo $q['page_meta_description']; ?>">

<?php echo $q['head_inc']; ?> 
<link rel="icon" href="/assets/img/favicon-gem-registration.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/main.css">
<style>
body {
    margin: 0!important;
    padding: 0;
    overflow-x: hidden;
}
.fcs-mainbar-container {
    background: #f8f8f8 !important;
    padding: 0 !Important;
    background: #fff !important;
}

.fakeimg {
width: 100%;
padding-top:5px;
padding-bottom:30px;

display: block;
}
.top{
color:black;
margin-top:2%;
margin-bottom:2%;
font-size:2.2vw;
margin-right: auto;
margin-left: auto;
}
.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
width: 100%;
padding-right: 0px;
padding-left: 0px;
margin-right: auto;
margin-left: auto;
}
a:not([href]):not([tabindex]), a:not([href]):not([tabindex]):focus, a:not([href]):not([tabindex]):hover {
color: inherit;
text-decoration: none;
margin-top:1%;
}
.card-horizontal {
display: flex;
flex: 1 1 auto;
}
.h5, h5 {
font-size: 12px;
color:black !important;
font-family: "Roboto", Sans-serif;
}
.h4, h4 {
font-size: 18px;
font-family: "Roboto", Sans-serif;
}
span.author{
font-family: "Roboto", Sans-serif;
font-size:12px;
}
.hide{
display:none;
}
.font-weight-bold {
    background: #DE9443;
    color: white;
}
</style>
<?php echo $q['schema']; ?> 
</head>
<body>
<?php include_once ($_SERVER['DOCUMENT_ROOT'] . '/components/header.php'); ?>
<br>
<br>
<div class="container p-2">

  <br>
  <h1 class="text-center" style="font-size:24px"><?php echo $q['title']; ?></h1>
  <p class="text-center"><?php echo $q['short_desc']; ?></p>
  <img src="<?php echo $q['image']; ?>" alt="<?php echo $q['image_alt']; ?>" class="mx-auto d-block img-fluid">
  <br>
  <br>
  <h1 class="text-center font-weight-bold" style="font-size:24px"><?php echo $q['page_title']; ?></h1>
  <span class=""><?php echo $q['long_desc']; ?></span>
  <br>
  <br>

</div>
<?php include_once ($_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'); ?>


</body>

</html>
<?php
}
?>
