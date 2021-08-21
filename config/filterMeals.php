<?php
 include('connect.php');



if ($_POST) {
	$hotel = $_POST['hotel1'];
	$category = $_POST['category1'];
	$service = $_POST['service1'];
	$price = $_POST['price1'];

 if ($hotel=='' && $category=='' && $service=='' && $price=='') {
 		$queryMeal = "SELECT * FROM `meals` LIMIT 8";
 	}else{

 		if ($hotel!='') {
 			$hotelSearch="`Hotel` LIKE '$hotel' ";
 		}else {
 			$hotelSearch = "`Hotel` !='NULL'";
 		}

 		if ($category!='') {
 			$categorySearch="`Category` LIKE '$category' ";
 		}else {
 			$categorySearch = "`Category` !='NULL'";
 		}

 		if ($service!='') {
 			$serviceSearch="`Service` LIKE '$service' ";
 		}else {
 			$serviceSearch = "`Service` !='NULL'";
 		} 

 		if ($price!='') {
 			$priceSearch="`Price` LIKE '$price' ";
 		}else {
 			$priceSearch = "`Price` !='NULL'";
 		}

 		$queryMeal = "SELECT * FROM `meals` WHERE $hotelSearch AND $categorySearch AND $serviceSearch AND $priceSearch LIMIT 8";
 	}

 	if ($result = mysqli_query($myDbConnection, $queryMeal)) {
 			while ($meal = mysqli_fetch_array($result)) {
 				$filteredHotel = $meal['Hotel'];
 				$filteredName = $meal['Name'];
 				$filteredCategory = $meal['Category'];
 				$filteredPrice = $meal['Price'];
 				$filteredService = $meal['Service'];
                
             ?>
				        <div class="col s12 m3">
				          <div class="card">
				            <div class="card-image">
				              <img src="" height="200">
				              <span class="card-title">Food Category</span>
				            </div>
				            <div class="card-content">
				              <p>
				              	 <li><?php echo $filteredName; ?></li>
				              	 <li><?php echo $filteredHotel; ?></li>
				              	 <li><?php echo $filteredCategory; ?></li>
				              	 <li><?php echo $filteredService; ?></li>
				              	 <li>Ksh.<?php echo $filteredPrice; ?></li>

				              </p>
				            </div>
				            <div class="card-action">
				              <a href="#">Click Here to Buy</a>
				            </div>
				          </div>
				        </div>

             <?php
 			}
 		}	
}
?>