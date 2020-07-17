<?php

class Db {
	// connection to database
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $db = "product_database";
	public $tbname = "products";

	public function connect() {
	  $con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
	  return $con;
	}
	// querie for inserting data in to products table
	public function insertRecords($sk, $nm, $prc, $sz, $x, $hg, $wd, $lg, $wg) {
	  $conn = $this->connect();
	    mysqli_query($conn, "insert into ".$this->tbname. "(sku, name, price, size, dimensions, weight)
		  values('$sk', '$nm', '$prc', '$sz', concat('$hg', '$x', '$wd', '$x' ,'$lg'), '$wg')") or die(
		    mysqli_error($conn)); 
		 //echo 'Insert successfull!';
	}
	// querie for selecting data from products table
	public function selectRecords(){
 	  $conn = $this->connect();
 	  $products = mysqli_query($conn, "select * from ".$this->tbname."")  or die(
		    mysqli_error($conn));
 	    while($row = mysqli_fetch_assoc($products)){
 	      echo "<div class='product-container'><p>"; ?>
 	      <!-- store product id in checkbox value-->
 	   <input type="checkbox" class="check_box" value="<?php echo $row["id"]; ?>">
 	    <?php
 	    	  echo $row['sku']."</p><p>";
 	    	  echo $row['name']."</p><p>"; ?> <span class="">€</span> <?php
 	    	  echo $row['price']."</p><p>";
 	    	  echo $row['size']."</p><p>";
 	    	  echo $row['dimensions']."</p><p>";
 	    	  echo $row['weight']."</p>";
 	    	echo "</div>";
 	    }
 	}
 }
?>




