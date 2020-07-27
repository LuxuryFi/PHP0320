<?php 
    require_once "database.php";
    session_start();
    if (isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    } else {
        $error = "";
    }
    

    $sql_select_all = "SELECT * From categories";
    $sql_select_run = mysqli_query($connection,$sql_select_all);

    echo "<pre>";
    print_r($sql_select_run);
    echo "</pre>";

    if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }

    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }


?>
<html>
<h3>
    <?=$error?>
</h3>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Avatar</th>
        <th>Function</th>
    </tr>
    <?php
        $categories = mysqli_fetch_all($sql_select_run, MYSQLI_ASSOC);
        echo "<pre>";
    print_r($categories);
    echo "</pre>";
        foreach ($categories as $category) : ?>
     <tr>
        <td><?=$category['cate_name']?></td>
        <td><?=$category['description']?></td>
        <td> 
            <?php 
                echo date('d-m-Y H:i:s',strtotime($category['create_at']));
            ?> 
        </td>
        <td><img style="width: 200px;" src="uploads/<?=$category['avatar']?>" alt=""></td>
           
        <td>
            <?php
                $url_detail = 'detail.php?cate_id='.$category['cate_id'];
                $url_update = 'update.php?cate_id='.$category['cate_id'];
                $url_delete = 'delete.php?cate_id='.$category['cate_id'];
            ?>
            <a href="<?php echo $url_detail; ?>">Detail</a>
            <a href="<?php echo $url_update; ?>">Update</a>
            <a href="<?php echo $url_delete; ?>" onclick="return confirm('Are you delete?')">Delete</a>
            <form action="update.php" method="POST">
                <input type="submit" name="update" value="Update">
                <input type="hidden" name="cate_id" value="<?=$category['cate_id']?>" >
            </form>
            <form action="delete.php" method="POST">
                <input type="submit" name="delete" value="Delete">
                <input type="hidden" name="cate_id" value="<?=$category['cate_id']?>" >
            </form>   
        </td>
    </tr>

        <?php endforeach; ?>



</table>



</html>