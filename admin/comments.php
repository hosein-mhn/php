<?php
require_once 'header.php';
?>

    <div class="sidebar bg-light">
        <a href="index.php">مطالب</a>
        <a href="categories.php">دسته ها</a>
        <a href="slider.php">اسلایدر</a>
        <a class="active bg-primary" href="#">نظرات</a>
        <a href="users.php">کاربران</a>
    </div>

    <div class="content">
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">نظر</th>
                    <th scope="col">حذف</th>
                    <th scope="col">تایید</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $comments = run_sql("SELECT * FROM comments WHERE confirm = 0");
                if(mysqli_num_rows($comments) > 0){
                while ($comment = mysqli_fetch_assoc($comments)){
                $comment_id = $comment['id'];
                $comment_name = $comment['name'];
                $comment_content = $comment['content'];
                echo '
                    <tr>
                    <th scope="row">'.$comment_id.'</th>
                    <td>'.$comment_name.'</td>
                    <td>'.$comment_content.'</td>
                    <td><a href="check.php?deletecomment='.$comment_id.'" type="button" class="btn btn-danger">حذف</a></td>
                    <td><a href="check.php?confirmcomment='.$comment_id.'" type="button" class="btn btn-success">تایید</a></td>
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
