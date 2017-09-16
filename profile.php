<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
}else{
  $_SESSION['login'] = True;
}
 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
 
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['firstName']; ?></title>
<style>
 .img-responsive{
    margin-top: 5vh;
  
    border:2px solid black;
   height: 150px;
   width: 100px;
  }
  .container-fluid{
    background-color: grey;
    color: black;
  }
  #title{
    font-size: 25px;
    color: black;
  }
  p{
    font-size: 12pt;
    font-family: : curier;
  }
  .link {
      color: black;
      font-size: 15pt;
       padding-right: 15px;
    }
  @import url('https://fonts.googleapis.com/css?family=Raleway');
    .uname{
      font-family: 'Raleway', sans-serif;
      font-size:25pt;
      color: turquoise;
    }
    #header{
      max-height: 100px;
      width: 100%;
      background-color: grey;
      font-family: cursive;
    }
    #linkback{
      color: turquoise;
      font-size: 20pt;
    }
    .add{
      color: black;
    }
    #map{
      height: 400px;
      width: 50%;
      margin-right: 2px;
    }

</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php echo "<div class=\"container-fluid\">";
            echo "<div class=\"row\" id=\"header\" >";
            echo "<h1>" . "Welcome to Big-E!"."</h1>";
            echo" </div>" ; //header 

            echo "<div class=\"row\">";
              echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6\">";
              echo "<h1 class=\"uname\">" . "Welcome" ." ".$userRow['firstName']. "!"."</h1>";
              echo "</div>";
              echo "<div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-3 col-lg-offset-3\">";
              echo "<a href=\"logout.php?logout\" class=\"link\" >Sign Out</a>";
              
              echo "</div>";
              echo "</div>";
?>
       
         <?php

		$product_id= $_GET["id"];
		$res=mysqli_query($conn, "SELECT * FROM products WHERE product_id=" . $product_id);
 		$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
 		
 		   echo "<div class=\"row\">";
 		   echo "<div class=\"col-lg-5\">";
 		   echo "<img class=\"img-responsive\" style=\"width:220px; height:340px\" src='" . $userRow['image']. "'>";
		    echo "<h2>".$userRow['name']."</h2>"; 
		    echo "<h3>".$userRow['price']."<b>"."</h3>";
		    echo "<p>".$userRow['description']."</p>";
        echo "</div>";
        echo "<div class=\"col-lg-6\" id=\"map\" >";
        echo "</div>";
        echo "</div>";
        echo "<a href=\"productList.php\" id=\"linkback\">Back to Cathalog</a>";
        echo "</div>";
         ?>
        


<script>
  function initMap(){
    //Map options
    var options = {
      zoom:10,
      center:{lat:48.299052, lng:16.564012}
    }

    //New map
    var map = new google.maps.Map(document.getElementById('map'), options);

    var icon = {
    url: "https://vignette.wikia.nocookie.net/tinyzoo/images/d/d2/Fruit_Basket.png/revision/latest?cb=20130130013048", // url
    scaledSize: new google.maps.Size(50, 50), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
};

var marker = new google.maps.Marker({
    position: new google.maps.LatLng(48.394066, 16.663693 ),
    map: map,
    icon: icon
});



/*
    //Add Marker
    var marker = new google.maps.Marker({
      position:{lat:48.394066, lng:16.663693 },
      map:map,

    // icon marker
      icon:'gregor_profil.png'    
    });
*/
    
      //Popup info window   
    var infoWindow = new google.maps.InfoWindow({
      content:'<p>We are open:</p><br></p>Mo-Fr: 08:00-17:00</p><br><p>Sa: 09:00-16:00</p><br><p>Sunday: closed</p>'
    });
    

    marker.addListener('click', function(){
       infoWindow.open(map, marker);
});



    

  }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLsA8u10nhLIvj2GU1Gn3D8p4LHnQX9c4&callback=initMap">
    </script>  
</body>
</html>
<?php ob_end_flush(); ?>