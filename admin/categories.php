<?php
require_once 'header.php';
?>

    <div class="sidebar bg-light">
        <a href="index.php">مطالب</a>
        <a class="active bg-primary" href="#">دسته ها</a>
        <a href="slider.php">اسلایدر</a>
        <a href="comments.php">نظرات</a>
        <a href="users.php">کاربران</a>
    </div>

    <div class="content">
        <div class="row">
            <a class="btn btn-info" href="newcat.php">
              افزودن دسته
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
                $cats = run_sql("SELECT * FROM `category`");
                if(mysqli_num_rows($cats) > 0) {
                    while ($cat = mysqli_fetch_assoc($cats)) {
                        $cat_id = $cat['id'];
                        $cat_title = $cat['title'];

                        echo '
                        <tr>
                        <th scope="row">'.$cat_id.'</th>
                        <td>'.$cat_title.'</td>
                        <td><a type="button" class="btn btn-danger" href="check.php?deletecat='.$cat_id.'">حذف</a></td>
                        <td><a type="button" class="btn btn-success" href="editcat.php?edit='.$cat_id.'">ویرایش</a></td>
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
