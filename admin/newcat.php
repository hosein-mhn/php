<?php
require_once 'header.php';
?>

    <div class="sidebar bg-light">
        <a href="index.php">مطالب</a>
        <a  class="active bg-primary" href="#">دسته ها</a>
        <a href="slider.php">اسلایدر</a>
        <a href="comments.php">نظرات</a>
        <a href="users.php">کاربران</a>
    </div>

    <div class="content mt-5">
            <form method="post" action="check.php">
                <div class="form-group">
                    <label for="exampleFormControlInput1">عنوان دسته</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان را وارد کنید" name="title">
                </div>
                <div class="form-group">

                   <input type="submit" class="btn btn-success" value="ثبت" name="categorysub">
                </div>
            </form>
    </div>



</div>
</body>
<?php
require_once 'footer.php';
?>
