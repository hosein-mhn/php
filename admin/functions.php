<?php


function run_sql($sql){
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'blog';
    $conn = mysqli_connect($host,$user,$password,$database);
    if(!$conn){
        echo 'مشکا در برقراری ارتباط با دیتابیس';
    }else{
        $result = mysqli_query($conn,$sql);

        return $result;
    }

}



    function uploadfile($file)
    {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {

            $uploadOk = 1;
        } else {

            $uploadOk = 0;
        }

// Check if file already exists
        if (file_exists($target_file)) {

            $uploadOk = 0;
        }

// Check file size
        if ($file["size"] > 500000) {

            $uploadOk = 0;
        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {

            $uploadOk = 0;
        }

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {

// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($file["name"])) . " has been uploaded.";
                return $target_file;
            } else {

            }
        }

    }




//---------------------------


function getcat($id){
    $post_cats = run_sql("SELECT * FROM `category`");
    if(mysqli_num_rows($post_cats) > 0) {
        while ($cat = mysqli_fetch_assoc($post_cats)) {
            if($id == $cat['id']){
                return $cat['title'];
            }
        }
    }
}
//---------------------------
function getcatid($title){
    $post_cats = run_sql("SELECT * FROM `category`");
    if(mysqli_num_rows($post_cats) > 0) {
        while ($cat = mysqli_fetch_assoc($post_cats)) {
            if($title == $cat['title']){
                return $cat['id'];
            }
        }
    }
}



//---------------------------

function limitWord($string, $limit){
    $words = explode(" ",$string);
    $output = implode(" ",array_splice($words,0,$limit));
    return $output;
}

