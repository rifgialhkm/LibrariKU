<?php 
require_once 'header.php';
?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Manage Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                        <h4 class="section-subtitle"><b>Book List</b></h4>
                        <div class="panel">
                            <div class="panel-content">
                                <div class="table-responsive">
                                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ISBN</th>
                                                <th>Cover</th>
                                                <th>Ebook</th>
                                                <th>Year</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Publisher</th>
                                                <th>Page</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $result = mysqli_query($sql, "SELECT * FROM `books`");
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td><?= $row['book_isbn']; ?></td>
                                                    <td><img src="books/cover/<?= $row['book_cover']; ?>" src="" style="max-width: 70px; max-height: 405px;"></td>
                                                    <td><?= $row['book_pdf']; ?></td>
                                                    <td><?= $row['book_year']; ?></td>
                                                    <td style="white-space: pre-wrap;"><?= $row['book_title']; ?></td>
                                                    <td style="white-space: pre-wrap;"><?= $row['book_author']; ?></td>
                                                    <td style="white-space: pre-wrap;"><?= $row['book_publisher']; ?></td>
                                                    <td><?= $row['book_page']; ?></td>
                                                    <td style="white-space:pre-wrap; word-wrap: break-word;"><?= $row['book_description']; ?></td>
                                                    <td>
                                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'] ?>"><i class="fa fa-pencil"></i></a>
                                                        <a href="delete.php?bookdelete=<?= base64_encode($row['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
$result = mysqli_query($sql, "SELECT * FROM `books`");
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $book_info = mysqli_query($sql, "SELECT * FROM `books` WHERE `id` = '$id'");
    $book_info_row = mysqli_fetch_assoc($book_info);
    ?>
<!-- Modal -->
<div class="modal fade" id="book-update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Info</h4>
            </div>
            <div class="modal-body">
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="book_isbn">ISBN</label>
                                        <input type="number" class="form-control" id="book_isbn" placeholder="Book ISBN" name="book_isbn" value="<?= $book_info_row['book_isbn']; ?>" required>
                                        <input type="hidden" class="form-control" name="id" value="<?= $book_info_row['id']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_year">Year</label>
                                        <input type="number" class="form-control" id="book_year" placeholder="Book Year" name="book_year" value="<?= $book_info_row['book_year']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_title">Title</label>
                                        <input type="text" class="form-control" id="book_title" placeholder="Book Title" name="book_title" value="<?= $book_info_row['book_title']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_author">Author</label>
                                        <input type="text" class="form-control" id="book_author" placeholder="Book Author" name="book_author" value="<?= $book_info_row['book_author']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_publisher">Publisher</label>
                                        <input type="text" class="form-control" id="book_publisher" placeholder="Book Publisher" name="book_publisher" value="<?= $book_info_row['book_publisher']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_page">Page</label>
                                        <input type="number" class="form-control" id="book_page" placeholder="Book Page" name="book_page" value="<?= $book_info_row['book_page']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_description">Description</label>
                                        <textarea class="form-control" id="book_description" placeholder="Book Description" name="book_description" rows="7px"><?= $book_info_row['book_description']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="update-book" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 

}

if (isset($_POST['update-book'])) {
    $id = $_POST['id'];
    $book_isbn = $_POST['book_isbn'];
    $book_year = $_POST['book_year'];
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_publisher = $_POST['book_publisher'];
    $book_page = $_POST['book_page'];
    $book_description = $_POST['book_description'];

    $result = mysqli_query($sql, "UPDATE `books` SET `book_isbn`='$book_isbn',`book_year`='$book_year',`book_title`='$book_title',`book_author`='$book_author',`book_publisher`='$book_publisher',`book_page`='$book_page',`book_description`='$book_description' WHERE `id` = '$id'");
    if ($result) {
        ?>
        <script type="text/javascript">
            alert('Book update successfully!');
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert('Book not update!');
        </script>
        <?php
    }
}

?>
<?php 
require_once 'footer.php';
?>