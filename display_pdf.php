<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $pdo=new PDO("mysql:host=localhost;dbname=project","root","");
    $id = htmlspecialchars($_GET['id']);
    $query = "SELECT `project_name`, `pdf_doc`
              FROM `project_pdf`
              WHERE `id` = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindColumn(1, $project_name);
    $stmt->bindColumn(2, $pdf_doc, PDO::PARAM_LOB);
    if ($stmt->execute() === FALSE) {
        echo 'Could not display pdf';
    } else {
        $stmt->fetch(PDO::FETCH_BOUND);
        header("Content-type: application/pdf");  
        header('Content-disposition: inline; filename="'.$project_name.'.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        // echo $pdf_doc; 
        while (!feof($pdf_doc)) {
            $buff = fread($pdf_doc, 1024);
            print $buff;
         }
    }
} else {
    header('location: display.php');
}