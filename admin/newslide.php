<?php
require_once 'header.php';
?>

    <div class="sidebar bg-light">
        <a href="index.php">مطالب</a>
        <a href="categories.php">دسته ها</a>
        <a  class="active bg-primary" href="#">اسلایدر</a>
        <a href="comments.php">نظرات</a>
        <a href="users.php">کاربران</a>
    </div>

    <div class="content mt-5">
            <form action="check.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">عنوان تصویر</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان را وارد کنید" name="title" required>
                </div>
                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">آپلود</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01" name="fileToUpload" required>
                            <label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="ثبت" name="slidersub">
                </div>
            </form>
    </div>



</div>
</body>
<?php
require_once 'footer.php';
?>
