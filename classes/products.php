<?php 

	class Products extends Application {

		private $_table = "products";

		public function getProducts(){

			$sql = "SELECT * FROM `{$this->_table}`";
			return $this->db->fetchAll($sql);

		}

	}

?>