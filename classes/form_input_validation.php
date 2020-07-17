<?php
// validation class 
class InputValidation extends Db{
	private $postData;
	private $errors = [];
	private static $inputFields = ['sku', 'name', 'price'];

	public function __construct($data) {
		$this->postData = $data;
	}

	// check if field exists as a key in data array
	public function validateForm() {
		foreach(self::$inputFields as $field) {
			if(!array_key_exists($field, $this->postData)){
				trigger_error("$field is not present");
				return;
			}
		}
		// call methods
		$this->validateSku();
		$this->validateName();
		$this->validatePrice();

		// return errors array
		return $this->errors;
	}

	// validate unique sku code, trim from white space and check if field is not empty
	// also i make a check if that exact code hasn't already been submitted in to products table
	// if it is then show error message that number already exists.
	private function validateSku() {
		$conn = $this->connect();
		$value = trim($this->postData['sku']);

		if(empty($value)) {
			$this->pushError('sku', 'Please insert data.');
		} else {
			$skuExists = mysqli_query($conn, "select sku from products where products.sku = '{$_POST['sku']}'")  or die(
		    mysqli_error($conn));
		    if (mysqli_num_rows($skuExists) != 0) {
			$this->pushError('sku', 'Please provide valid code. This number already exists.');
			}
		}
  }

    // validate product name field, trim from white space and check if field is not empty
	private function validateName() {
		$value = trim($this->postData['name']);
		if(empty($value)) {
			$this->pushError('name', 'Please fill in the field.');
		}
	}

	// validate price field, trim from white space and check if field is not empty
	private function validatePrice() {
		$value = trim($this->postData['price']);
		if(empty($value)) {
			$this->pushError('price', 'Please fill in the field.');
		}
	}

	// method which holds error array keys and error messages
	private function pushError($key, $value) {
		$this->errors[$key] = $value;
	}
}
?>