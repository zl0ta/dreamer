<?php
    session_start();
    $UID = $_SESSION['username'];
  $target_dir = "../img/";
  if (! is_dir("$target_dir") ) mkdir ( "$target_dir" , 0755); // make dir if not exist
  $target_file = $target_dir . $_SESSION['username'] . ".jpg";
  echo "$target_file"."<br>";
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    // Check if file already exists
    if (file_exists($target_file)) {
      unlink("$target_file");
      if (file_exists($target_file)) { $uploadOk = 0; echo "Вибачте, файл вже був завантажений."; } else  { $uploadOk = 1;};
    }
    // Check file size
    if ($_FILES["avka"]["size"] > 500000) {
      echo "Вибачте, ваше фото займає забагату місця. Оберіть іншу.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if(($imageFileType != "jpg") && ($imageFileType != "jpeg") && ($imageFileType != "png"))  {
      echo "Вибачне, недопустимий формат файлу.";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Ви не обрали фото. Повторіть спробу.";
    // if everything is ok, try to upload file
    } else {
      //$target_file = "img/$UID.jpg";
      if ( move_uploaded_file($_FILES["avka"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["avka"]["name"]). " завантажена.";
          //echo "<script>window.location.href='/settings.php';</script>";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
    }
  }
  //echo "uploadOk => $uploadOk";
?>
