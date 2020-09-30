<?php
    require_once 'header.php';
?>

    <div class="sidebar bg-light">
        <a class="active bg-primary" href="#">مطالب</a>
        <a href="categories.php">دسته ها</a>
        <a href="slider.php">اسلایدر</a>
        <a href="comments.php">نظرات</a>
        <a href="users.php">کاربران</a>
    </div>

    <div class="content">
        <?php
        if(isset($_GET['err']) && $_GET['err'] == 1){
            echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        مشکلی در ویرایش وجود دارد
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        ';
        }
        ?>
        <div class="row">
            <a class="btn btn-info" href="newpost.php">
              افزودن مطلب
            </a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">دسته</th>
                    <th scope="col">حذف</th>
                    <th scope="col">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $posts = run_sql("SELECT * FROM `posts`");
                if(mysqli_num_rows($posts) > 0) {
                    while ($post = mysqli_fetch_assoc($posts)) {
                        $post_id = $post['id'];
                        $post_title = $post['title'];
                        $post_cat = getcat($post['category_id']);

                        echo "<tr>
                    <th scope='row'>$post_id</th>
                    <td>$post_title</td>
                    <td>$post_cat</td>
                    <td><a type='button' class='btn btn-danger' href='check.php?deletepost=$post_id'>
                    حذف</a></td>
                    <td><a type='button' class='btn btn-success' href='editpost.php?edit=$post_id'>
                    ویرایش</a></td>
                     </tr>";

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
