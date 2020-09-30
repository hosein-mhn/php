<?php
require_once 'admin/functions.php';


if(isset($_GET['post'])){
    $post_id = $_GET['post'];
    $post = run_sql("SELECT * FROM `posts` WHERE id = $post_id");
    if(mysqli_num_rows($post) > 0) {
        while ($pt = mysqli_fetch_assoc($post)) {
            $post_title = $pt['title'];
            $post_writer = $pt['writer'];
            $post_category = $pt['category_id'];
            $post_content = $pt['content'];
            $post_image = $pt['image'];
        }
    }
}else{
    header('Location:index.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Title</title>
    <link href='http://www.fontonline.ir/css/BYekan.css' rel='stylesheet' type='text/css'>
    <style>
        *{
            font-family:'BYekan',Sans-Serif;
        }
    </style>
</head>
<body>
<div class="container align-content-around">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">
            وبلاگ
        </a>
        <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">صفحه اصلی</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="card">
        <div class="row pl-4 pr-5">

            <div class="card-body">
                <h2 class="h2"><?php echo $post_title ?></h2>
                نوشته شده توسط : <?php echo $post_writer ?>
            </div>
            <img class="img-thumbnail w-25" src="admin/<?php echo $post_image ?>" alt="Card image cap">


        </div>


    </div>
    <div class="card">
        <div class="card-body">
            <?php echo $post_content ?>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <form action="admin/check.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="inputEmail4">نام شما</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="نام خود را وارد کنید" name="name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="inputEmail4">نظر</label>
                        <textarea class="form-control" name="comment"></textarea>
                    </div>
                    <input type="text"  class="d-none" name="post_id" value="<?php echo $post_id ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <input type="submit" class="btn btn-primary" value="ارسال" name="commentsub">
                </div>



                </div>

            </form>
        </div>
    <div class="card">
        <div class="card-body">
            <?php
            $comments = run_sql("SELECT * FROM comments WHERE confirm = 1");
            if(mysqli_num_rows($comments) > 0){
                while ($comment = mysqli_fetch_assoc($comments)){
                    $comment_id = $comment['id'];
                    $comment_post_id = $comment['post_id'];
                    $comment_name = $comment['name'];
                    $comment_content = $comment['content'];
                    if($comment_post_id == $post_id){

                        echo '
                    <h5>'.$comment_name.' :</h5>
                    <p>
                    '.$comment_content.'
                    </p>
                    <hr>
                    ';
                    }

                }
            }
            ?>
        </div>
    </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>