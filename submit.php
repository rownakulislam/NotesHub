<?php
session_start();
if (isset($_POST['submit']) && !empty($_FILES['pdf_file']['name'])) {
 //a $_FILES 'error' value of zero means success. Anything else and something wrong with attached file.
   if ($_FILES['pdf_file']['error'] != 0) {
      echo 'Something wrong with the file.';
   } else { //pdf file uploaded okay.
 //project_name supplied from the form field
   $project_name = htmlspecialchars($_POST['project_name']);
   $description=htmlspecialchars($_POST['description']);
   $uploaded_by=$_SESSION['username'];
 //attached pdf file information
   $file_name = $_FILES['pdf_file']['name'];
   $file_tmp = $_FILES['pdf_file']['tmp_name'];
   if ($pdf_blob = fopen($file_tmp, "rb")) {
      try {
         $pdo=new PDO("mysql:host=localhost;dbname=project","root","");
         $insert_sql = "INSERT INTO `project_pdf` (`project_name`, `pdf_doc`,`description`,`uploaded_by`)
         VALUES(:project_name, :pdf_doc,:project_des,:uploaded_by);";
         $stmt = $pdo->prepare($insert_sql);
         $stmt->bindParam(':project_des', $description);
         $stmt->bindParam(':project_name', $project_name);
         $stmt->bindParam(':uploaded_by', $uploaded_by);
         $stmt->bindParam(':pdf_doc', $pdf_blob, PDO::PARAM_LOB);
         if ($stmt->execute() === FALSE) {
            echo 'Could not save information to the database';
         } else {
            echo 'Information saved';
            header('Location: display.php');
         }
      } catch (PDOException $e) {
            echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
            ': '. $e->getLine();
         }
   } else {
 //fopen() was not successful in opening the .pdf file for reading.
         echo 'Could not open the attached pdf file';
      }
   }
} 
else {
 //submit button was not clicked. No direct script navigation.
 header('Location: temp.php');
}
?>