
<?php
include "config.php";
$sql = "SELECT * FROM blogs ORDER BY id DESC LIMIT 4";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        ?>
        <!-- cards -->
<div class="container card-all-registration mt-4 my-3">
  <h2 class="mb-4">Blogs</h2>
  <hr>
  <div class="collapse show" id="collapseGEMform">
    <div class="card-group gy-5 mt-3">
        <?php
while($row = $result->fetch_assoc()) {
  ?>
      <div class="card rounded border-0  ml-4 card-grid-all">
        <img class="card-img-top" src="<?php echo $row['image_thumnale_260_130']; ?>" alt="<?php echo $row['title']; ?>" title="<?php echo  $row['page_title']; ?>">
        <div class="card-body">
          <h5 class="card-title text-dark"><?php echo $row['title']; ?></h5>
          <p class="card-text"><?php echo $row['short_desc']; ?></p>
          <a href="/blog/<?php echo  $row['page_name']; ?>" class="btn btn-green btn-sm p-2">Read More</a>
        </div>
      </div>
<?php
    }
?>
    </div>
  </div>
</div>
<?php }
?>

