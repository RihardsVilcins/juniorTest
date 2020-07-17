<?php
// delete query where ajax function sends requests
$con = mysqli_connect('localhost', 'root', '', 'product_database');
if(isset($_POST['id'])) {
	foreach($_POST['id'] as $id) {
		$sql = "DELETE FROM products WHERE id = '".$id."'";
		mysqli_query($con, $sql);
	}
}
?>
