<?php
require_once 'header.php';


if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit = run_sql("SELECT * FROM `category` WHERE id = $edit_id");
    if(mysqli_num_rows($edit) > 0) {
        while ($cat = mysqli_fetch_assoc($edit)) {
            $cat_title = $cat['title'];
        }
    }
}else{
    header('Location:index.php');
}


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
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان را وارد کنید" name="title" value="<?php echo $cat_title ?>">
                </div>
                <div class="form-group">
                    <input class="d-none" type="text" value="<?php echo $edit_id ?>" name="edit_id">
                   <input type="submit" class="btn btn-success" value="ثبت" name="editcategorysub">
                </div>
            </form>
    </div>



</div>
</body>
<?php
require_once 'footer.php';
?>
