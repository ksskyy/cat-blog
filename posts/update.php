<?php
require_once "../includes/navbar.php";
require_once "../includes/header.php";
require_once "../config/config.php";
?>

<?php
if(isset($_GET['upd_id'])){
    $id = $_GET['upd_id'];

    $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
    $select->execute();
    $rows= $select->fetch(PDO::FETCH_OBJ);


    if(empty($_POST['title'])||empty($_POST['subtitle'])||empty($_POST['body'])){
        echo "please enter you blog content";
    }else{
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $body = $_POST['body'];
 

        $update = $conn->prepare("UPDATE posts SET title = :title,subtitle =:subtitle,body=:body WHERE id = '$id'");
        $update->execute([
            ':title' => $title,
            ':subtitle' => $subtitle,
            ':body' => $body
        ]);
        header('location:http://localhost/clean-blog/index.php');
    }

}
?>
            <form method="POST" action="update.php?upd_id=<?php echo $id;?>">
              
              <div class="form-outline mb-4">
                <input type="text" name="title" value="<?php echo $rows->title;?>" id="form2Example1" class="form-control" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="subtitle" value="<?php echo $rows->subtitle;?>" id="form2Example1" class="form-control" placeholder="subtitle" />
            </div>

              <div class="form-outline mb-4">
                <input type="text" name="body" value="<?php echo $rows->body;?>" id="form2Example1" class="form-control" placeholder="body" />
            </div>

              
             <div class="form-outline mb-4">
                <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
            </div>


              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
            </form>


           
            <?php
require_once "../includes/footer.php";
?>