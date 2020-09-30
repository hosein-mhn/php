<?php
require_once 'functions.php';
session_start();


//---------------------------------------
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $run_sql = run_sql("SELECT * FROM users");
    if(mysqli_num_rows($run_sql) > 0){
        while ($user = mysqli_fetch_assoc($run_sql)){
            if($email == $user['email'] && $password == $user['password']){
                $_SESSION["login"] = $email;
                header("Location:index.php");
            }else{
                header('Location:../login.php?err=3');
            }
        }
    }
}
//---------------------------------------


if(isset($_SESSION["login"])){
    if(isset($_GET['logout'])){
        session_destroy();
        header('Location:../login.php');
    }

//---------------------------------------

    if(isset($_POST['postsub'])){
        $title = $_POST['title'];
        $writer = $_POST['writer'];
        $category = $_POST['category'];
        $post_cats = run_sql("SELECT * FROM `category`");
        if(mysqli_num_rows($post_cats) > 0) {
            while ($cat = mysqli_fetch_assoc($post_cats)) {
                if($category == $cat['title']){
                    $cat_id = $cat['id'];
                }
            }
        }
        $post_img = $_FILES["fileToUpload"];
        $post_content = $_POST['content'];
        $post_img_addr = uploadfile($post_img);
        if($post_img_addr != ""){
            $newpost = run_sql("INSERT INTO posts (title, category_id, content, writer, image)
        VALUES ('$title', '$cat_id', '$post_content', '$writer', '$post_img_addr')");
            header('Location:index.php');
        }else{
            header('Location:newpost.php?err=1');
        }

    }


//---------------------------------------


    if(isset($_GET['deletepost'])){
        $delete_post_id = $_GET['deletepost'];
        run_sql("DELETE FROM posts WHERE id = $delete_post_id");
        header('Location:index.php');
    }

//---------------------------------------


    if(isset($_POST['editpostsub'])){
        $post_id = $_POST['post_id'];
        $title = $_POST['title'];
        $writer = $_POST['writer'];
        $category = $_POST['category'];
        $post_cats = run_sql("SELECT * FROM `category`");
        if(mysqli_num_rows($post_cats) > 0) {
            while ($cat = mysqli_fetch_assoc($post_cats)) {
                if($category == $cat['title']){
                    $cat_id = $cat['id'];
                }
            }
        }
        $post_img = $_FILES["fileToUpload"];
        $post_content = $_POST['content'];

        if(empty($post_img)){
            $post_img_addr = uploadfile($post_img);
            if($post_img_addr != ""){
                $newpost = run_sql("UPDATE posts SET title ='$title' , category_id ='$cat_id', content = '$post_content', writer = '$writer',image ='$post_img_addr' WHERE id = $post_id");
                header('Location:index.php');
            }else{
                header('Location:index.php?err=1');
            }
        }else{
            $newpost = run_sql("UPDATE posts SET title ='$title' , category_id ='$cat_id', content = '$post_content', writer = '$writer' WHERE id = $post_id");
            header('Location:index.php');
        }


    }

//---------------------------------------

    if(isset($_POST['categorysub'])){
        $cat_title = $_POST['title'];
        $newcat = run_sql("INSERT INTO category (title)
        VALUES ('$cat_title')");
        header('Location:categories.php');
    }


//---------------------------------------

    if(isset($_GET['deletecat'])){
        $delete_cat_id = $_GET['deletecat'];
        run_sql("DELETE FROM category WHERE id = $delete_cat_id");
        header('Location:categories.php');
    }


//---------------------------------------


    if(isset($_POST['editcategorysub'])){
        $cat_title = $_POST['title'];
        $cat_id = $_POST['edit_id'];
        $newcat = run_sql("UPDATE category SET title ='$cat_title' WHERE  id = $cat_id");
        header('Location:categories.php');
    }


//----------------------------------------

    if(isset($_POST['slidersub'])){
        $slide = $_FILES['fileToUpload'];
        $img_addr = uploadfile($slide);
        $title= $_POST['title'];
        if($img_addr != ""){
            $newpost = run_sql("INSERT INTO slider (title, src)
        VALUES ('$title', '$img_addr')");
            header('Location:slider.php');
        }else{
            header('Location:newslide.php?err=1');
        }

    }


//----------------------------------------


    if(isset($_GET['deleteslide'])){
        $delete_slide_id = $_GET['deleteslide'];
        run_sql("DELETE FROM slider WHERE id = $delete_slide_id");
        header('Location:slider.php');
    }


//------------------------------------------


    if(isset($_POST['editslidersub'])){
        $slide_title = $_POST['title'];
        $slide_id = $_POST['edit_id'];
        $slide_img = $_FILES["fileToUpload"];
        if(empty($slide_img)){
            $slide_img_addr = uploadfile($slide_img);
            if($slide_img_addr != ""){
                $newpost = run_sql("UPDATE slider SET title ='$slide_title', src ='$slide_img_addr' WHERE  id = $slide_id");
                header('Location:slider.php');
            }else{
                header('Location:slider.php?err=1');
            }
        }else{
            $newpost = run_sql("UPDATE slider SET title ='$slide_title' WHERE id = $slide_id");
            header('Location:slider.php');
        }

    }





//------------------------------------------

    if(isset($_POST['usersub'])){
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $newuser = run_sql("INSERT INTO users (name, email, password)
        VALUES ('$user_name','$user_email','$user_password')");
        header('Location:users.php');
    }

//------------------------------------------

    if(isset($_GET['deleteuser'])){
        $delete_user_id = $_GET['deleteuser'];
        run_sql("DELETE FROM users WHERE id = $delete_user_id");
        header('Location:users.php');
    }

//---------------------------------------


    if(isset($_POST['editusersub'])){
        $user_id = $_POST['edit_id'];
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $newcat = run_sql("UPDATE users SET name='$user_name',email ='$user_email',password ='$user_password'  WHERE  id = $user_id");
        header('Location:users.php');
    }


//------------------------------------------
    if(isset($_GET['deletecomment'])){
        $delete_comment_id = $_GET['deletecomment'];
        run_sql("DELETE FROM comments WHERE id = $delete_comment_id");
        header('Location:comments.php');
    }


//------------------------------------------

    if(isset($_GET['confirmcomment'])){
        $delete_confirm_id = $_GET['confirmcomment'];
        run_sql("UPDATE comments SET confirm = 1 WHERE id = $delete_confirm_id");
        header('Location:comments.php');
    }


}




if(isset($_POST['commentsub'])){
    $confirm = 0;
    $post_id = $_POST['post_id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $newcomment = run_sql("INSERT INTO comments (name, content, post_id, confirm)
        VALUES ('$name', '$comment' ,'$post_id','$confirm')");
    header('Location:../single.php?post='.$post_id.'');
}

//------------------------------------------

