<?php 

	class Paypal {

		// ACTION

		private $_acton = "https://www.sandbox.paypal.com/cgi-bin/webscr";

		// CMD
		private $_cmd = "_cart";

		// BUSINESS
		private $_business = "";

		// UPLOAD
		private $_upload = 1;

		// LEGAL CURRENCY
		private $_lc = "GB";

		// BUSINESS
		private $_rm = 2;

		// CURRENCY CODE
		private $_currency_code = "GBP";

		// PRODUCTS ARRAY
		private $_products = array();
	
		// all input fields array
		private $_fields = array();

		// TAX
		private $_tax = 17.5;


		public function addProduct ($name , $price = 0 , $qty = 1){

			$n = count($this->_products) + 1;
			$this->_products[$n]['item_name_'.$n] = $name;
			$this->_products[$n]['amount_'.$n] = $price;
			$this->_products[$n]['quantity_'.$n] = $qty;

		}


		private function addField ($name = null, $value = null){

			$field = "<input type=\"hidden\" name=".$name." value=".$value.">";
			$this->_fields[] = $field;

		}

		private function standardFields (){

			$this->addField('cmd' , $this->_cmd);
			$this->addField('upload' , $this->_upload);
			$this->addField('business' , $this->_business);

		}

		private function processFields (){
			$this->standardFields();
			foreach ($this->_products as $product) {
				foreach ($product as $key => $value) {
					$this->addField($key , $value);
				}				
			}

		}


		public function getFields(){
			$this->processFields();
			if(!empty($this->_fields)){
				return implode("" , $this->_fields);
			}
		}

		private function render (){
			$output = "<form action=".$this->_acton." method=\"post\" target=\"_blank\">";
			$output .= $this->getFields();
			$output .= "<input type=\"hidden\" name=\"lc\" value=".$this->_lc.">";
			$output .= "<input type=\"hidden\" name=\"rm\" value=".$this->_rm.">";
			$output .= "<input type=\"hidden\" name=\"currency_code\" value=".$this->_currency_code.">";
			$output .= "<button name=\"submit\" type=\"submit\" class=\"btn btn-success col-md-12\">Checkout With Paypal</button>";
			$output .= "</form>";
			return $output;
		}

		public function run (){
			return $this->render();
		}

		public function viewFields (){
			return $this->_fields;
		}


	}

?>
