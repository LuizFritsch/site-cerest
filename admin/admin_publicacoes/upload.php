<?php
include '../../sinan/db_connection.php';
$conn=OpenCon();

// Uploads files
if (isset($_POST['save'])) {


    $uploaddir = '/var/www/uploads/';
    $uploadfile = $uploaddir . basename($_FILES['myfile']['name']);
    
	// if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {
            $sql = "INSERT INTO publicacoes (NOME,ARQUIVO) VALUES ('$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
                echo "<script>window.location.assign('https://google.com')</script>";
            }
        } else {
            echo "Failed to upload file.";
            echo "<script>window.location.assign('https://gmail.com')</script>";
        }
    }
}
?>