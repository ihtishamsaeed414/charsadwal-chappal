<?php 
include("include/connection.inc.php");
$id = $_GET['id'];
$query = " DELETE FROM product WHERE product_id = '$id'";
$execute = mysqli_query($connect,$query);

if($execute){
    ?>
  <script>
      window.open("http://localhost/CharsadwalChappal/server/product.php", "_self");
      window.alert("deleted successfully");
  </script>
 <?php
}else{
  window.alert("deletion failed");
}
?>