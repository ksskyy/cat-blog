<?php
require_once "../includes/navbar.php";
require_once "../config/config.php";
?>
<?php 
if(isset($_GET['post_id'])){
    $id = $_GET['post_id'];

    $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");

    $select->execute();
    $post = $select->fetch(PDO::FETCH_OBJ);
}else{
    echo "404";
}
?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('images/<?php echo $post->img;?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $post->title; ?></h1>
                            <h2 class="subheading"><?php echo $post->subtitle; ?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php echo $post->user_name; ?></a>
                                <?php echo date('M',strtotime($post->created_at)) . ',' . date('d',strtotime($post->created_at)) . ' '. date('Y',strtotime($post->created_at));?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        
                      <?php echo $post->body;?>
                        <!-- <p>
                            Placeholder text by
                            <a href="http://spaceipsum.com/">Space Ipsum</a>
                            &middot; Images by
                            <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                        </p> -->
                        <?php if(isset($_SESSION['user_id']) AND $_SESSION['user_id'] == $post->user_id):?>
                            <a href="http://localhost/clean-blog/posts/delete.php?del_id=<?php echo $post->id;?>" class="btn btn-danger text-center float-end">Delete</a>
                            <a href="update.php?upd_id=<?php echo $post->id;?>" class="btn btn-warning text-center">Update</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
        <?php
require_once "../includes/footer.php";
?>
