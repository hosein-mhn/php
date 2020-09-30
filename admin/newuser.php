<?php
require_once 'header.php';
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
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان را وارد کنید" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">ایمیل</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="ایمیل را وارد کنید" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">رمز</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="رمز را وارد کنید" name="password">
                </div>
                <div class="form-group">

                   <input type="submit" class="btn btn-success" value="ثبت" name="usersub">
                </div>
            </form>
    </div>



</div>
</body>
<?php
require_once 'footer.php';
?>
