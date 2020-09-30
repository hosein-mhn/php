<?php
require_once 'header.php';
?>

    <div class="sidebar bg-light">
        <a href="index.php">مطالب</a>
        <a href="categories.php">دسته ها</a>
        <a class="active bg-primary" href="#">اسلایدر</a>
        <a href="comments.php">نظرات</a>
        <a href="users.php">کاربران</a>
    </div>

    <div class="content">
        <div class="row">
            <a class="btn btn-info" href="newslide.php">
              افزودن تصویر
            </a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">حذف</th>
                    <th scope="col">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sliders = run_sql("SELECT * FROM slider");
                if(mysqli_num_rows($sliders) > 0){
                    while ($slider = mysqli_fetch_assoc($sliders)){
                        $slider_id = $slider['id'];
                        $slider_title = $slider['title'];
                        echo '
                        <tr>
                        <th scope="row">'.$slider_id.'</th>
                        <td>'.$slider_title.'</td>
                        <td><a href="check.php?deleteslide='.$slider_id.'" type="button" class="btn btn-danger">حذف</a></td>
                        <td><a href="editslide.php?edit='.$slider_id.'" type="button" class="btn btn-success">ویرایش</a></td>
                        </tr>
                        ';
                    }
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>



</div>
</body>
<?php
require_once 'footer.php';
?>
