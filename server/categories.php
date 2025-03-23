<?php
    require("include/connection.inc.php");
    require("include/functions.inc.php");
    require("include/header.inc.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(isset($_GET['type']) && $_GET['type'] != ""){
        $type = check_validity($connect,$_GET['type']);
        // when user change status of a category
        if($type == "status"){
            $operation = check_validity($connect,$_GET['operation']);
            $id = check_validity($connect,$_GET['id']);
            if($operation == "active"){
                $status = 1;
            }else{
                $status = 0;
            }
            mysqli_query($connect,"UPDATE category SET status = $status WHERE cat_id = $id");
        }
        // when user delete any category
        if($type == "delete"){
            $id = check_validity($connect,$_GET['id']);
            mysqli_query($connect,"DELETE FROM category WHERE cat_id = $id");
        }
    }

?>

<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
       <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous" defer></script>


    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
     rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="layout">
<div class="side-bar">
        <ul class="option-list">
            <li><a href="categories.php">Categories</a></li>
            <li><a href="product.php">Products</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="order.php">Customers</a></li>
        </ul>
    </div>
    <section class="main-section">
    <h3>Categories</h3>
    <?php
    $categoryname = "";     // in order to avoid error while user didn't edit anything
    // for inserting new category or updating the existing category 
    if(isset($_POST['categoryadded'])){
        $categoryname = check_validity($connect,$_POST['categorytextbox']);
        if(isset($_GET['id']) && $_GET['id'] != ""){
            mysqli_query($connect,"UPDATE category SET cat_name = '$categoryname' WHERE id = '".$_GET['id']."'");
            header("location:categories.php");
        }else{        
        mysqli_query($connect,"INSERT INTO category(cat_name,status)VALUES('$categoryname','1')");        
        header("location:categories.php");
    }
    }

    // writing data on textbox upon clicking edit button
    if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = check_validity($connect,$_GET['id']);
        $result = mysqli_query($connect,"SELECT * FROM category WHERE cat_id = $id");
        $row = mysqli_fetch_assoc($result);
        $categoryname = $row['cat_name'];
    }

?>

<form method="post" class="form">
    <label class="add-cat-label">Add New Category</label>
    <input class="add-cat-input" type="text" name="categorytextbox" placeholder="category name" value="<?php echo $categoryname ?>">
    <input class="btn-add" type="submit" name="categoryadded" value="Insert Category">
</form>

<!--Fetch all categories data from the database-->
<?php
    $result = mysqli_query($connect,"SELECT * FROM category");
?>
<table border="2">
    <th>ID</th><th>Category Name</th><th>Status</th><th>Delete</th><th>Edit</th>
    <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['cat_id']."</td><td>".$row['cat_name']."</td><td>";
            if($row['status'] == 1){
                echo "<a href='?type=status&operation=deactivate&id=".$row['cat_id']."'>Active</a>";
            }else{
                echo "<a href='?type=status&operation=active&id=".$row['cat_id']."'>Deactivate</a>";
            }
            echo "</td><td><a href='?type=delete&id=".$row['cat_id']."'>Delete</a></td><td>";
            echo "<a href='addcategories.php?type=edit&id=".$row['cat_id']."'>Edit</a></td></tr>";
        }
    ?>
</table>
    </section>
</div>
    </body>
</html>


<!--Button to add new category-->


<?php
    require("include/footer.inc.php");
?>