<div class="card mb-3">
  <h4 class="card-header text-white font-weight-bold" style="background: #b33030;">Other Related Latest Post</h4>
  <ul class="list-group list-group-flush">
    <?php
    include "../config.php";
    $sql = "SELECT * FROM blogs ORDER BY id DESC LIMIT 4";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      ?>
    <li class="list-group-item">
    <div class="row">

      <div class="col-md-4 p-0">
        <a href="/blog/<?php echo  $row['page_name']; ?>"><img src="<?php echo $row['image_thumnale_116_38']; ?>" class="img-fluid rounded-start" style="height:100%!important;" alt="<?php echo  $row['page_title']; ?>" title="<?php echo  $row['page_title']; ?>"></a>
      </div>
      <div class="col-md-8 d-flex align-items-center">
        <h4 class="card-body p-0">
          <a href="/blog/<?php echo  $row['page_name']; ?>" title="<?php echo  $row['page_title']; ?>"><div><?php echo  $row['page_title']; ?></div></a>
        </h4>
      </div>
    </div>
  </li>
  <?php
      }
  ?>
  </ul>
</div>
<?php
include('right-nav-link.php');
 ?>
