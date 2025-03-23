<?php
    require("include/connection.inc.php");
    require("include/functions.inc.php");
    require("include/header.inc.php");
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

<form method="post">
    <label>Add New Category</label>
    <input type="text" name="categorytextbox" value="<?php echo $categoryname ?>"><br><br>
    <input type="submit" name="categoryadded" value="Insert Category">
</form>
<?php
    require("include/footer.inc.php");
?>