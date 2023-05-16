<?php 
    require 'function.php';

    $id = base64_decode($_GET['id']);
    $books = query("SELECT * FROM `books` WHERE `id` = '$id'");
    foreach($books as $row) :
    ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?= $row['book_title']; ?> | PDF</title>
            <style type="text/css">
                 body{
                    text-align: center;
                    background-color: #323639;
                    width: 100vw;
                    height: 100vh;
                    overflow-x: hidden;
                    overflow-y: hidden;
                 }
             </style>
        </head>
        <body>
            <embed type='application/pdf' src="lms/books/ebook/<?php echo $row['book_pdf']; ?>#toolbar=0&navpanes=0&scrollbar=0" width="50%" height="100%"></embed>
        </body>
        </html>
    <?php 
    endforeach;
?>