<?php 
require_once("../includes/navbar.php");
require_once "../config/config.php";

if(isset($_GET['del_id'])){
  $id = $_GET['del_id'];

  $select = $conn->query("SELECT * FROM posts WHERE id='$id'");
  $select->execute();
  $posts = $select->fetch(PDO::FETCH_OBJ);

  if(isset($_SESSION['user_id']) && (int)$_SESSION['user_id'] !== (int)$posts->user_id ){
    
    header('location:http://localhost/clean-blog/index.php');
    die();

  }else{

    unlink("images/" .$posts->img."");
  
    $delete = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $delete->execute([
      ':id' => $id
    ]);
  }

  header("location:http://localhost/clean-blog/index.php");
  die();
}


?>