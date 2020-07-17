<?php 
include('classes/template.php');
include('classes/config.php');
$template = new template();
?>

<!DOCTYPE html>
<html>
<head>
  <!-- include metadata -->
  <?php template::getMeta(); ?>
    <title>Product List</title>
  <!-- include libraries -->
  <?php template::getLibs(); ?> 
</head>
<body>
<!-- navigation bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Product List</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="productAdd.php">Add a new product</a>
      </li>
    </ul>
    <span class="navbar-text">
          <a href=""><label for="delete" class="hover-over-delete">Mass Delete Action</label></a>
    <input type="checkbox" style="display:none;" id="delete" onclick="deleteCheckbox(this);" />
      <button type="button" class="btn btn-primary" id="btn-delete">Apply</button>
    </span>
  </div>
</nav>
<!-- navigation bar end-->

<!-- i make instance of dB class and output all products on the page -->
<?php 
	$selectObj = new Db();
	$selectObj->selectRecords();
?>
<!-- include javascript libraries -->
<?php template::getJsLibs(); ?>
</body>
</html>
