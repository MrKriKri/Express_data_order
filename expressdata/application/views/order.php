<!DOCTYPE html>
<html>
<head>
	<script src="//code.jquery.com/jquery-1.12.4.js" charset="utf-8"></script>
	<script type="text/javascript">
			function price_product() {
				var amount = document.getElementById("amount").value;
				var product = document.getElementById("select_product").value;
				document.getElementById("productPrice").value = product;
				document.getElementById("productNetprice").value = amount * product;
				document.getElementById("NetPrice").value = parseFloat(document.getElementById("productNetprice").value)+parseFloat(document.getElementById("shippingPrice").value);
			}

			function price_shipping() {
				var weight = parseFloat(document.getElementById("weight").value);
				var price_weight = parseFloat(document.getElementById("shippingType").value);
				document.getElementById("priceWeight").value=price_weight;
				document.getElementById("shippingPrice").value = weight * price_weight ; 
				document.getElementById("NetPrice").value = parseFloat(document.getElementById("productNetprice").value)+parseFloat(document.getElementById("shippingPrice").value);
			}
		</script>
	<title>order express data</title>
</head>
<body>
		
		<table border="1" align="center">
			<form action="<?php echo base_url('Welcome/sendd');?>"  method="POST">
			<tr>
				<br>
				<th colspan="3">Express Order</th>
				<br>
			</tr>
			<tr>
				<td><br>
					ชื่อ <input type="text" id="CusName" name="CusName" required><br><br>
					นามสกุล <input type="text" id="CusSname" name="CusSname" required ><br><br>
					เบอร์โทร <input type="text" id="CusTel" name="CusTel" required ><br><br>
					ที่อยูู่ <input type="text" id="CusAdds" name="CusAdds" required ><br><br>
				</td>
				<td><br>
					สินค้า <select id="select_product" name="select_product" onchange="price_product()">
								<option value="0" >none</option>
								<?php
									$sql = "SELECT * FROM product ";
									$res = $this->db->query($sql);
									foreach ($res->result() as $key ) { ?>
										<option value="<?php echo($key->Product_Price);?>"><?php echo($key->Product_name);?></option>

									<?php } ?>
						   </select><br><br>
					ราคาสินค้า/หน่วย <input type="text" id="productPrice" name="productPrice" readonly value="0"><br><br>
					จำนวน <select id ="amount" name ="amount" onchange="price_product()">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							</select><br><br>
					รวมราคา <input type="text" id="productNetprice" name="productNetprice" readonly value="0"><br><br>
				</td>
				<td><br>
					วิธีส่ง <select id="shippingType" name="shippingType" onchange="price_shipping()">
								<option value="0" >none</option>
								<?php
								$sq = "SELECT * FROM shipping";
								$re = $this->db->query($sq);
								foreach ($re->result() as $key ) { ?>
									<option value="<?php echo($key->Shipping_price_weight);?>" ><?php echo($key->Shipping_type);?></option>
								<?php } ?>
							</select><br><br>
					ราคา/กิโล <input type="text" id="priceWeight" name="priceWeight" readonly value="0" ><br><br>
					น้ำหนัก <input type="number" id="weight"  name="weight" onkeyup="price_shipping()" required ><br><br>
					รวมราคา <input type="text" id="shippingPrice" name="shippingPrice" readonly value="0" >

				</td>
			</tr>
			<tr>
				<th colspan="3">
					<br>
					รวมราคาทั้งหมด <input type="text" id="NetPrice" name="NetPrice"readonly value="0"><br><br>
					<input type="submit" value="SEND" id="SEND" name="SEND">

				</th>
			</tr>
			</form>
		</table>
		
</body>
</html>