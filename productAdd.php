<?php 
include('classes/template.php');
include('classes/config.php');
include('classes/form_input_validation.php');
$template = new template();
?>

<?php
// collection of data from input fields
if(isset($_POST['submit'])) {
	$sku = $_POST['sku'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$size = $_POST['size'];
  $prefix = $_POST['dimensions_prefix'];
	$height = $_POST['height'];
	$width = $_POST['width'];
	$length = $_POST['length'];
	$weight = $_POST['weight'];
  
  // i make instance of inputValidation class and access error messages on input fields
	$validation = new InputValidation($_POST);
	$errors = $validation->validateForm();
  // if no errors then i make new instance of a class Db and insert data into database
	if (count($errors) == 0) {
	$insertObj = new Db();
	$insertObj->insertRecords($sku, $name, $price, $size, $prefix, $height, $width, $length, $weight);
 }
}
?>

<!DOCTYPE html>
<html>
<head>
<!-- include metadata -->
  <?php template::getMeta(); ?>
    <title>Add Products</title>
<!-- include libraries -->
  <?php template::getLibs(); ?>
</head>
<body>
<!-- navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Product Add</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Back to product list</a>
      </li>
    </ul>
    <span class="navbar-text">
      <button type="submit" form="submit_form" class="btn btn-primary" value="Submit" name="submit">Save</button>
    </span>
  </div>
</nav>
<!-- navigation bar end-->

<!-- start form for adding new products -->
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="submit_form">
  <br><br>
  <label for="sku">SKU</label>
    <input type="text" class="form-control-sm" id="sku" name="sku" value="<?php echo htmlspecialchars($_POST['sku'] ?? '') ?>">
    <!-- echo error -->
    <div class="errors"><?php echo $errors['sku'] ?? '' ?></div>
  <br><br>

  <label for="name">Name</label>
    <input type="text" class="form-control-sm" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? '') ?>">
    <!-- echo error -->
    <div class="errors"><?php echo $errors['name'] ?? '' ?></div>
  <br><br>
  <label for="price">Price</label>
    <input type="text" class="form-control-sm" id="price" name="price" value="<?php echo htmlspecialchars($_POST['price'] ?? '') ?>">
    <!-- echo error -->
  <div class="errors"><?php echo $errors['price'] ?? '' ?></div>
  <br><br>

  <p class="type" style="color: #007BFF; text-decoration: underline;">Please insert a product type.</p>
  <label for="type">Type Switcher</label>
  <select name="type" id="type" onchange="showInput()"> <br>
  	<option value="Type Switcher">Type Switcher:</option>
    <option value="DVD-disc">DVD-disc</option>
    <option value="Furniture">Furniture</option>
    <option value="Book">Book</option>
  </select>
  <br><br>
  <label for="disc-size" class="size">Size</label>
    <input type="text" id="disc-size" class="size form-control-sm" name="size" value="">
      <p class="size">Please provide size for a DVD-disc in MB.</p>
   
  <label for="book-weight" class="weight">Weight</label>
    <input type="text" id="book-weight" class="weight form-control-sm" name="weight" value="">
      <p class="weight">Please provide weight for a book in Kg.</p>
  
  <label for="furniture-height" class="dimensions">Height</label>
    <input type="text" id="furniture-height" class="dimensions form-control-sm" name="height" value="">
     <input type="text" id="" class="prefix form-control-sm" name="dimensions_prefix" value="">
  <br><br>

  <label for="furniture-width" class="dimensions">Width</label>
    <input type="text" id="furniture-width" class="dimensions form-control-sm" name="width" value="">
     <input type="text" id="" class="prefix form-control-sm" name="dimensions_prefix" value="">
  <br><br>

  <label for="furniture-length" class="dimensions">Length</label>
    <input type="text" id="furniture-length" class="dimensions form-control-sm" name="length" value="">
      <p class="dimensions">Please provide dimensions for a furniture in H x W x L format.</p>
      <!-- echo success message if form submits successfully -->
      <?php include('classes/success_message.php'); ?>
  </form>
</div>
<!-- end form -->

<!-- include javascript libraries -->
<?php template::getJsLibs(); ?>
</body>
</html>
