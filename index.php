<?php
require_once 'admin/functions.php';

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
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="index.php" class="navbar-brand">
        وبلاگ
    </a>
    <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            $cats = run_sql("SELECT * FROM category");
            if(mysqli_num_rows($cats) > 0) {
                while ($cat = mysqli_fetch_assoc($cats)) {
                    $cat_id = $cat['id'];
                    $cat_title = $cat['title'];

                    echo '
                             <li class="nav-item">
                                <a class="nav-link" href="index.php?cat='.$cat_id.'">'.$cat_title.'</a>
                            </li>
                        ';
                }
            }
            ?>

        </ul>
        <div class="form-inline my-2 my-lg-0">
            <a class="form-control mr-sm-2"  href="login.php">ورود</a>
        </div>
    </div>
   </nav>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $sliders = run_sql("SELECT * FROM slider");
            if(mysqli_num_rows($sliders) > 0){
                $active = 0;
                $count = 0;
                while ($slider = mysqli_fetch_assoc($sliders)){

                    $slider_id = $slider['id'];
                    $slider_title = $slider['title'];
                    $slider_src = $slider['src'];
                    if($active == 0){
                        echo '
                    <li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'" class="active"></li>
            ';
                        $count++;
                        $active = 1;
                    }else{
                        echo '
                     <li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'"></li>
                     ';
                        $count++;
                    }


                }
            }
            ?>

        </ol>

        <div class="carousel-inner">
            <?php
            $sliders = run_sql("SELECT * FROM slider");
            if(mysqli_num_rows($sliders) > 0){
                $active = 0;
                while ($slider = mysqli_fetch_assoc($sliders)){

                    $slider_id = $slider['id'];
                    $slider_title = $slider['title'];
                    $slider_src = $slider['src'];
                    if($active == 0){
                        echo '
                    <div class="carousel-item active">
                     <img class="d-block w-100" src="admin/'.$slider_src.'" alt="Second slide">
                    </div>
            ';
                        $active = 1;
                    }else{
                        echo '
                    <div class="carousel-item">
                     <img class="d-block w-100" src="admin/'.$slider_src.'" alt="Second slide">
                    </div>
            ';
                    }


                }
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row pl-4 pr-4 justify-content-around">
        <?php
        if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $posts = run_sql("SELECT * FROM `posts` WHERE category_id = $cat_id");
        if(mysqli_num_rows($posts) > 0) {
            while ($post = mysqli_fetch_assoc($posts)) {
                $post_id = $post['id'];
                $post_title = $post['title'];
                $post_content = $post['content'];
                $post_image = $post['image'];
                $post_cat = getcat($post['category_id']);
                $post_content = limitWord($post_content, 40);
                echo ' <div class="card m-1" style="width: 18rem;">
                <img class="card-img-top" src="admin/' . $post_image . '" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">' . $post_title . '</h5>
                <p class="card-text">' . $post_content . '</p>
                <a href="single.php?post='.$post_id.'" class="btn btn-primary">ادامه مطلب</a>
                </div>
                </div>';

                }
            }
        }else{
            $posts = run_sql("SELECT * FROM `posts`");
            if(mysqli_num_rows($posts) > 0) {
                while ($post = mysqli_fetch_assoc($posts)) {
                    $post_id = $post['id'];
                    $post_title = $post['title'];
                    $post_content = $post['content'];
                    $post_image = $post['image'];
                    $post_cat = getcat($post['category_id']);
                    $post_content = limitWord($post_content, 40);
                    echo ' <div class="card m-1" style="width: 18rem;">
                <img class="card-img-top" src="admin/'.$post_image.'" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">'.$post_title.'</h5>
                <p class="card-text">'.$post_content.'</p>
                <a href="single.php?post='.$post_id.'" class="btn btn-primary">ادامه مطلب</a>
                </div>
                </div>';

                }
            }
        }

        ?>

    </div>





</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
