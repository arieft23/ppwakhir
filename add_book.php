<?php 
include "header.php";
function pindah($page) {
	header("location: " . $page);
}
if(isset($_SESSION['role'])){
	if($_SESSION['role'] == 'user') pindah("view_book.php");
}else pindah("view_book.php");
?>

<div class="container">

	<div class="starter-template">
		<h1>Add a book</h1>

		<div class="col-md-6 col-xs-12">
			<form method="POST" action="add.php">
				<div class="form-group" >
					<label for="title">Book's title</label>
					<input type="text" class="form-control" id="title" placeholder="book's title" name="title">
				</div>
				<div class="form-group">
					<label for="img_path">Image Cover</label>
					<input type="text" class="form-control" id="img_path" placeholder="image's path" name="img_path">
				</div>
				<div class="form-group">
					<label for="author">Author</label>
					<input type="text" class="form-control" id="author" placeholder="author's name" name="author">
				</div>
				<div class="form-group">
					<label for="publisher">Publisher</label>
					<input type="text" class="form-control" id="publisher" placeholder="publisher's name" name="publisher">
				</div>
				<div class="form-group">
					<label for="desc">Description</label>
					<input type="text" class="form-control" id="desc" placeholder="write something about this book" name="desc">
				</div>
				<div class="form-group">
					<label for="qty">Quantity</label>
					<input type="number" class="form-control" id="qty" name="qty">
				</div>
				<button type="submit" class="btn btn-default" name="submit">Submit</button>
			</form>
		</div>

		
	</div>

</div><!-- /.container -->

<?php
include "footer.php";

?>