<?php
include('config/connect.php');
?>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <nav>
          <div class="nav-wrapper container">
             Filter data using list
          </div>
        </nav>    
     <div class="container">
      <div class="row"></div>

      <!--List items begins here-->
      <div class="row">       
        <div class="col s3"><!--First List items-->
            <label>Browser Select Hotel</label>
            <select class="browser-default" id="hotel" onchange="filterMeals()">
              <option value="" >Choose your option</option>
              <option value="Decasa">Decasa Hotel</option>
              <option value="stanly">Salova Stanly</option>
              <option value="serena">Serena Hotel</option>
            </select>          
        </div>

        <div class="col s3"><!--First List items-->
            <label>Browser Select Food Category</label>
            <select class="browser-default" id="category" onchange="filterMeals()">
              <option value="" >Choose your option</option>
              <option value="Heavy">Heavy Food</option>
              <option value="Snack">Snack</option>
              <option value="Drinks">Drinks</option>
            </select>          
        </div>

        <div class="col s3"><!--First List items--> 
            <label>Browser Select Service type</label>
            <select class="browser-default" id="service" onchange="filterMeals()">
              <option value="" >Choose your option</option>
              <option value="fast food">Fast Food</option>
              <option value="wait">Wait</option>
              <option value="ready">Ready</option>
            </select>
        </div>

        <div class="col s3"><!--First List items-->
              <label>Browser Select Food Price</label>
              <select class="browser-default" id="price" onchange="filterMeals()">
                <option value="" >Choose your option</option>
                <option value="50">Ksh. 50</option>
                <option value="100">Ksh. 100</option>
                <option value="150">Ksh. 150</option>
              </select>          
        </div>

      </div><!--Iem list select options ends here-->


    <div class="row">
      <div id="displayHere">
      <?php
      $queryMeal = "SELECT * FROM `meals` LIMIT 8";
  if ($mealresult = mysqli_query($myDbConnection, $queryMeal)) {
      while ($meal = mysqli_fetch_array($mealresult)) {
        $UnfilteredHotel = $meal['Hotel'];
        $UnfilteredName = $meal['Name'];
        $UnfilteredCategory = $meal['Category'];
        $UnfilteredPrice = $meal['Price'];
        $UnfilteredService = $meal['Service'];
                
             ?>
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="" height="200">
                      <span class="card-title">Food Category</span>
                    </div>
                    <div class="card-content">
                      <p>
                         <li><?php echo $UnfilteredName; ?></li>
                         <li><?php echo $UnfilteredHotel; ?></li>
                         <li><?php echo $UnfilteredCategory; ?></li>
                         <li><?php echo $UnfilteredService; ?></li>
                         <li>Ksh.<?php echo $UnfilteredPrice; ?></li>

                      </p>
                    </div>
                    <div class="card-action">
                      <a href="#">This is a link</a>
                    </div>
                  </div>
                </div>

             <?php
      }
    }  ?>      
      </div>
    </div>  
     </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="assets/js/materialize.js"></script>
<script type="text/javascript">
  function filterMeals(){
        var hotel = document.getElementById('hotel').value;
        var category = document.getElementById('category').value;
        var service = document.getElementById('service').value;
        var price = document.getElementById('price').value;

       $.post('config/filterMeals.php', {hotel1:hotel,category1:category,service1:service,price1:price}, function(data){
           $('#displayHere').html(data);
        });      
  }


</script>
    </body>
  </html>