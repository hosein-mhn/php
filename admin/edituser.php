<?php
require_once 'header.php';

if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit = run_sql("SELECT * FROM `users` WHERE id = $edit_id");
    if(mysqli_num_rows($edit) > 0) {
        while ($user = mysqli_fetch_assoc($edit)) {
            $user_name = $user['name'];
            $user_email = $user['email'];
            $user_password = $user['password'];
        }
    }
}else{
    header('Location:index.php');
}
?>

    <div class="sidebar bg-light">
        <a href="index.php">مطالب</a>
        <a  href="categories.php">دسته ها</a>
        <a href="slider.php">اسلایدر</a>
        <a href="comments.php">نظرات</a>
        <a class="active bg-primary" href="#">کاربران</a>
    </div>

    <div class="content mt-5">
            <form action="check.php" method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">نام کاربر</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان را وارد کنید" name="name" value="<?php echo $user_name ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">ایمیل</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="ایمیل را وارد کنید" name="email" value="<?php echo $user_email ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">رمز</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="رمز را وارد کنید" name="password" value="<?php echo $user_password ?>">
                </div>
                <input class="d-none" type="text" value="<?php echo $edit_id ?>" name="edit_id">
                <div class="form-group">

                   <input type="submit" class="btn btn-success" value="ثبت" name="editusersub">
                </div>
            </form>
    </div>



</div>
</body>
<?php
require_once 'footer.php';
?>
