<?php
    require("include/connection.inc.php");
    require("include/functions.inc.php");
    require("include/header.inc.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(isset($_GET['type']) && $_GET['type'] != ""){
        $type = check_validity($connection,$_GET['type']);
        // when user delete any category
        if($type == "delete"){
            $id = check_validity($connection,$_GET['id']);
            mysqli_query($connection,"DELETE FROM contact_us WHERE id = $id");
        }
    }

?>

<!--Fetch all categories data from the database-->
<?php
    $result = mysqli_query($connection,"SELECT * FROM contact_us");
?>
<table border="2">
    <th>ID</th><th>Name</th><th>Email</th><th>Mobile No</th><th>Query</th><th>Date</th><th>Action</th>
    <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['contact_number']."</td><td>".$row['comment']."</td><td>".$row['added_on']."</td><td><a href='contactus.php?type=delete&id=".$row['id']."'>Delete</a></td></tr>";
        }
    ?>
</table>


<?php
    require("include/footer.inc.php");
?>