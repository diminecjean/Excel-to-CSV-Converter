<?php
$currentDirectory = getcwd(); //GET CURRENT DIRECTORY
$uploadDirectory = "/uploads/"; //UPLOAD TO 'UPLOADS' FOLDER

$errors = []; //AN ARRAY TO STORE ALL ERRORS OCCUR

//GET THE INFO OF THE SUBMITTED FILE.
$fileName = $_FILES['upfile']['name'];
$fileSize = $_FILES['upfile']['size'];
$fileTmpName  = $_FILES['upfile']['tmp_name'];
$fileType = $_FILES['upfile']['type'];

//SPECIFY THE UPLOAD PATH
$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);

if (isset($_POST['submit'])) { //RECEIVE EXCEL FILE FROM HTML

    if ($fileSize > 10000000) { //LIMIT THE FILE SIZE <10MB
        $errors[] = "File exceeds maximum size (10MB).";
        echo "<br>";
    }

    if (empty($errors)) { //IF NO ERROR EXISTS, THEN WILL START UPLOAD EXCEL FILE
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            echo "The file " . basename($fileName) . " has been uploaded";
        }
        else {
            echo "An error occurred. Please contact the administrator.";
        }
    }

    else { //LIST OUT ALL THE ERRORS IF THEY EXISTS
        foreach ($errors as $error) {
            echo $error . "These are the errors." . "\n";
        }
    }
}
?>