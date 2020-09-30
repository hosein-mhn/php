<?php
require_once 'header.php';

if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit = run_sql("SELECT * FROM `posts` WHERE id = $edit_id");
    if(mysqli_num_rows($edit) > 0) {
        while ($post = mysqli_fetch_assoc($edit)) {
            $post_title = $post['title'];
            $post_writer = $post['writer'];
            $post_category = $post['category_id'];
            $post_content = $post['content'];
            $post_image = $post['image'];
        }
    }
}else{
    header('Location:index.php');
}


?>

    <div class="sidebar bg-light">
        <a class="active bg-primary" href="#">مطالب</a>
        <a href="categories.php">دسته ها</a>
        <a href="slider.php">اسلایدر</a>
        <a href="comments.php">نظرات</a>
        <a href="users.php">کاربران</a>
    </div>



    <div class="content mt-5">
        <?php
        if(isset($_GET['err']) && $_GET['err'] == 1){
            echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        مشکلی در آپلود عکس وجود دارد
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ';
        }
        ?>
            <form action="check.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">عنوان</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان را وارد کنید" name="title" value="<?php echo $post_title ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">نویسنده</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="نام نویسنده را وارد کنید" name="writer" value="<?php echo $post_writer ?>" required>
                </div>
                <input type="text"  class="d-none" name="post_id" value="<?php echo $edit_id ?>" required>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">دسته بندی</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                        <?php
                        $post_cats = run_sql("SELECT * FROM `category`");
                        if(mysqli_num_rows($post_cats) > 0) {

                            while ($cat = mysqli_fetch_assoc($post_cats)) {
                                $cat_title = $cat['title'];
                                $cat_id = getcatid($cat_title);
                                if($cat_id == $post_category){
                                    echo "<option selected>$cat_title</option>";
                                }else{
                                    echo "<option>$cat_title</option>";
                                }


                            }
                        }


                        ?>
                    </select>

                </div>
                <div class="form-group">

                    <textarea  id="editor" rows="3" name="content"><?php echo $post_content ?></textarea>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">آپلود</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="fileToUpload">

                            <label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
                        </div>
                    </div>

                </div>
                <div class="form-group">

                   <input type="submit" class="btn btn-success" value="ثبت" name="editpostsub" >
                </div>
            </form>
    </div>



</div>
</body>
<?php
require_once 'footer.php';
?>
