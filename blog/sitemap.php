<?php
header('Content-type: application/xml');
include "../config.php";
$sql = "SELECT * FROM `blogs` ORDER BY id DESC";
$result = $conn->query($sql);

echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
if ($result->num_rows > 1) {
while ($row = $result->fetch_assoc()) {
?>
<url>
  <loc>https://olfant.com/blog/<?php echo $row['page_name'];?></loc>
  <lastmod><?php echo date(DATE_ATOM,strtotime($row['created_date']));?></lastmod>
  <priority>1.00</priority>
</url>
<?php
} }
 ?>
</urlset>
