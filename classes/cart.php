<?php 

	class Cart extends Application{

		private $_products_table = "products";
		private $_cart_total = "";

		public function addCurrentItem($p_id , $p_qty){

			if(isset($p_id)){

				if(!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1){

					$_SESSION['cart_array'] = array(0 => array('id' => $p_id , 'qty' => $p_qty));

				}else{

					array_push($_SESSION['cart_array'] , array('id' => $p_id , 'qty' => $p_qty));

				}

			}

		}

		public function itemsArray(){

			if(isset($_SESSION['cart_array']) && count($_SESSION['cart_array']) > 0){
				$out = $_SESSION['cart_array'];
			}else{
				$out = null;
			}

			return $out;

		}

		private function getItems (){

			
			$i = -1;
			
			foreach ($_SESSION['cart_array'] as $item){
				$results = $this->db->fetchOne("SELECT * FROM `{$this->_products_table}` WHERE `id` = '".$item['id']."'");
				$i++;

				$total_price = $results['price']*$item['qty'];
				$this->_cart_total = $total_price+$this->_cart_total;

				$n = $i + 1;

				$out .=  '<tr valign="middle" height="100">';
				$out .=  '<td>';
				if(!empty($results['image'])){
				$out .=  '<img src="'.URL.'images/'.$results['image'].'" width="100px" height="100px">';
				}else{
				$out .=  '<img src="'.URL.'images/un.jpg" width="100px" height="100px">';
				}
				$out .=  '</td>';
				$out .=  '<td>'.$results['name'].'</td>';
				$out .=  '<td>&pound;'.number_format($results['price'] , 2).'</td>';
				$out .=  '<td>';
							 			
				$out .=  '<form action="" method="post">';
				$out .=  '<input type="type" name="qty" style="width: 40px;" value="'.$item['qty'].'">';
				$out .=  '<button class="btn btn-default" name="update" type="submit">Update</button>';
				$out .=  '<input type="hidden" name="item_to_ajust_qty" value="'.$item['id'].'">';
				$out .=  '</form>';
				$out .=  '</td>';
				$out .=  '<td>&pound;'.number_format($total_price , 2).'</td>';
				$out .=  '<td>';
				$out .=  '<form action="" method="POST">';
				$out .=  '<input type="hidden" name="index_to_remove" value="'.$i.'">';
				$out .=  '<button type="submit" name="remove" class="btn btn-danger">REMOVE</button>';
				$out .=  '</form>';
				$out .=  '</td>';
				$out .=  '</tr>';
				}

				return $out;

		}

		public function showCartItems (){

			if(isset($_SESSION['cart_array']) && count($_SESSION['cart_array']) > 0){

				$out = '<table class="table table-bordered ">';
				$out .=  '<thead>';
				$out .=  	'<th class="col-md-1"></th>';
				$out .=  	'<th>NAME</th>';
				$out .=  	'<th>UNIT PRICE</th>';
				$out .=  	'<th>QTY</th>';
				$out .=  	'<th>TOTAL PRICE</th>';
				$out .=  	'<th>REMOVE</th>';
				$out .=  '</thead>';
				$out .=  '<tbody>';

				$out .= $this->getItems();


				$out .=  '</tbody>';
				$out .=  '</table>';

			}else{

				$out = '<div class="well">There are currently no items in the cart</div>';

			}

			return $out;


		}


		public function shopCartRundown (){

			if(isset($_SESSION['cart_array']) && count($_SESSION['cart_array']) > 0){

				$out = '<table class="table table-bordered">
							<tbody>
								<tr>
									<th class="col-md-6">Sub Total (ex VAT)</th>
									<td class="col-md-6">&pound;'.number_format($this->_cart_total , 2).'</td>
								</tr>
								<tr>
									<th class="col-md-6">Total (inc VAT)</th>
									<td class="col-md-6">&pound;'.number_format($this->_cart_total + $this->_cart_total/100*17.5 , 2).'</td>
								</tr>
							</tbody>
					 	</table>';

			}

			return $out;

		}

		public function showSummary (){

			if(isset($_SESSION['cart_array']) && count($_SESSION['cart_array']) > 0){

				$out = "<div class=\"well\">";
				$out .= "<h4>Order Summary</h4>";
				$out .= "<span class=\"dl\"></span>";

				$out .= "<table class=\"table table-striped\">";
				$out .= "<thead>";
				$out .= "<th class=\"col-md-10\">Descriptions</th>";
				$out .= "<th class=\"col-md-2\">Amount</th>";
				$out .= "</thead>";

				foreach ($_SESSION['cart_array'] as $item){

					$total_price = $results['price']*$item['qty'];

					$this->_cart_total = $total_price+$this->_cart_total;

					$results = $this->db->fetchOne("SELECT * FROM `{$this->_products_table}` WHERE `id` = '".$item['id']."'");

					$out .= "<tr>";
					$out .= "<td>";
					$out .= "<strong>Name:</strong> <i>".$results['name']."</i>";
					$out .= "<br/>";
					$out .= "<strong>Unit Price:</strong> <i>&pound;".number_format($results['price'] , 2)."</i>";
					$out .= "<br/>";
					$out .= "<strong>Quantity:</strong> <i>".$item['qty']."</i>";
					$out .= "<br/>";
					$out .= "</td>";

					$out .= "<td>";
					$out .= "&pound;".number_format($results['price']*$item['qty'] , 2)."";
					$out .= "</td>";
					$out .= "</tr>";

				}

				$out .= "</table>";
				$out .= "</tbody>";
				$out .= "<span class=\"dl\"></span>";

				$out .= $this->shopCartRundown();

				$out .= "</div>";

			}

			return $out;

		}

	}

?>

