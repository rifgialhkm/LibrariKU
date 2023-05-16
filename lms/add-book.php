<?php 
require_once 'header.php';

if (isset($_POST['save_book'])) {
    $book_isbn = $_POST['book_isbn'];
    $book_year = $_POST['book_year'];
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_publisher = $_POST['book_publisher'];
    $book_page = $_POST['book_page'];
    $book_description = $_POST['book_description'];

    $cover = explode('.', $_FILES['book_cover']['name']);
    $cover_ext = end($cover);
    $cover = date('Ydmhis.').$cover_ext;

    $ebook = explode('.', $_FILES['book_pdf']['name']);
    $ebook_ext = end($ebook);
    $ebook = date('Ydmhis.').$ebook_ext;

    $result = mysqli_query($sql, "INSERT INTO `books`(`book_isbn`, `book_cover`,`book_pdf`, `book_year`, `book_title`, `book_author`, `book_publisher`, `book_page`, `book_description`) VALUES ('$book_isbn','$cover','$ebook','$book_year','$book_title','$book_author','$book_publisher','$book_page','$book_description')");
    if ($result) {
        move_uploaded_file($_FILES['book_cover']['tmp_name'], 'books/cover/'.$cover);
        move_uploaded_file($_FILES['book_pdf']['tmp_name'], 'books/ebook/'.$ebook);
        $success = "Data save successfully!";
    }else{
        $error = "Data not save!";
    }

}


?>
                <!-- content HEADER -->  
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Add Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                        <?php 
                        if (isset($success)) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <?= $success ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                        <?php 
                        if (isset($error)) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                            <h5 class="mb-lg">Add Book</h5>
                                            <div class="form-group">
                                                <label for="book_isbn" class="col-sm-2 control-label">ISBN</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="book_isbn" placeholder="Book ISBN" name="book_isbn" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_cover" class="col-sm-2 control-label">Cover</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="book_cover" name="book_cover" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_pdf" class="col-sm-2 control-label">Ebook</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="book_pdf" name="book_pdf" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_year" class="col-sm-2 control-label">Year</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="book_year" placeholder="Book Year" name="book_year" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_title" class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="book_title" placeholder="Book Title" name="book_title" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_author" class="col-sm-2 control-label">Author</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="book_author" placeholder="Book Author" name="book_author" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_publisher" class="col-sm-2 control-label">Publisher</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="book_publisher" placeholder="Book Publisher" name="book_publisher" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_page" class="col-sm-2 control-label">Page</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="book_page" placeholder="Book Page" name="book_page" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_description" class="col-sm-2 control-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="book_description" placeholder="Book Description" name="book_description" rows="7px"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-8">
                                                    <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
require_once 'footer.php';
?>