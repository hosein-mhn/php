<?php
require_once 'header.php';

if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit = run_sql("SELECT * FROM `slider` WHERE id = $edit_id");
    if(mysqli_num_rows($edit) > 0) {
        while ($slide = mysqli_fetch_assoc($edit)) {
            $slide_title = $slide['title'];
            $slide_src = $slide['src'];
        }
    }
}else{
    header('Location:index.php');
}

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
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان را وارد کنید" name="title" value="<?php echo $slide_title ?>" required>
                </div>
                <div class="form-group">
                    <input class="d-none" type="text" value="<?php echo $edit_id ?>" name="edit_id">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">آپلود</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01" name="fileToUpload">
                            <label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="ثبت" name="editslidersub">
                </div>
            </form>
    </div>



</div>
</body>
<?php
require_once 'footer.php';
?>
