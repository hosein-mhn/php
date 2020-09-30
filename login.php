<?php
require_once 'admin/functions.php';
session_start();

if(isset($_SESSION['login'])){
    header("Location:./admin");
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
<div class="container">

    <?php

    if(isset($_GET['err']) && $_GET['err'] == 3){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        نام کاربری یا رمز عبور اشتباه است
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ';
    }elseif (isset($_GET['err']) && $_GET['err'] == 2){
        echo '
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        شما وارد سایت نشده اید
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ';
    }




    ?>

    <div class="row justify-content-center pt-5">
        <div>

            <form method="post" action="admin/check.php" class="card card-body" style="width: 30rem;">

                <div class="form-group">
                    <label for="exampleInputEmail1">ایمیل</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">رمز عبور</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="رمز" name="password">
                </div>

                <button type="submit" class="btn btn-primary" name="login">ورود</button>
                <a href="index.php" class="stretched-link mt-3 align-self-center">بازگشت به سایت</a>
            </form>


    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
