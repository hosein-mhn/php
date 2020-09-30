<?php
require_once 'header.php';
?>

    <div class="sidebar bg-light">
        <a  href="index.php">مطالب</a>
        <a href="categories.php">دسته ها</a>
        <a href="slider.php">اسلایدر</a>
        <a href="comments.php">نظرات</a>
        <a class="active bg-primary" href="#">کاربران</a>
    </div>

    <div class="content">
        <div class="row">
            <a class="btn btn-info" href="newuser.php">
              افزودن کاربر
            </a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ایمیل</th>
                    <th scope="col">نام</th>
                    <th scope="col">حذف</th>
                    <th scope="col">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $users = run_sql("SELECT * FROM `users`");
                if(mysqli_num_rows($users) > 0) {
                    while ($user = mysqli_fetch_assoc($users)) {
                        $user_id = $user['id'];
                        $user_name = $user['name'];
                        $user_email = $user['email'];
                        $user_password = $user['password'];
                        echo '
                            <tr>
                            <th scope="row">'.$user_id.'</th>
                            <td>'.$user_email.'</td>
                            <td>'.$user_name.'</td>
                            <td><a href="check.php?deleteuser='.$user_id.'" type="button" class="btn btn-danger">حذف</a></td>
                            <td><a href="edituser.php?edit='.$user_id.'" type="button" class="btn btn-success">ویرایش</a></td>
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
