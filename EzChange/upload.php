<?php
// (A) ERROR - NO FILE UPLOADED
if (!isset($_FILES["upfile"])) { exit("No file uploaded"); }
 
// (B) FLAGS & "SETTINGS"
// (B1) ACCEPTED & UPLOADED MIME-TYPES
$accept = ["xls", "xlsx"]; // all lower case
$upext = strtolower(pathinfo($_FILES["upfile"]["name"], PATHINFO_EXTENSION));
 
// (B2) SOURCE & DESTINATION
$source = $_FILES["upfile"]["tmp_name"];
$destination = $_FILES["upfile"]["name"];
 
// (C) SAVE UPLOAD ONLY IF ACCEPTED FILE TYPE
if (in_array($upext, $accept)) {
  echo move_uploaded_file($source, $destination)
    ? "OK" : "ERROR UPLOADING";
} else { echo "$upext NOT ACCEPTED"; }

if (($_FILES['my_file']['name']!="")){
  // Where the file is going to be stored
    $target_dir = "upload/";
    $file = $_FILES['my_file']['name'];
    $path = pathinfo($file);
    $filename = $path['filename'];
    $ext = $path['extension'];
    $temp_name = $_FILES['my_file']['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;
   
  // Check if file already exists
  if (file_exists($path_filename_ext)) {
   echo "Sorry, file already exists.";
   }else{
   move_uploaded_file($temp_name,$path_filename_ext);
   echo "Congratulations! File Uploaded Successfully.";
   }
  }