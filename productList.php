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
    height:150px;
    width: 150px;
  }
  .container-fluid{
    background-color: grey;
    color: black;
    padding-left: 15px;
  }
  #title{
    font-size: 25px;
    color: black;

  }
  p{
    font-size: 18px;
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
    .add{
      color: black;

    }
    #details{
      color: turquoise;
      font-size: 12pt;
    }
  #openCart:hover #cartDiv {
      display: block;
      height: 500px;
      width: 300px;
      background-color: lightgrey;
    }
    #cartDiv{
    display: none;
    position: absolute;
    color: black;
    background-color: lightgrey;
  }
  #openCart{
    font-size: 15pt;
  }
  #id{
    display: none;
  }
  #userid{
    display: none;
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
              echo "<p id=\"userid\">".$userRow['user_id']."</p>";
              echo "</div>";
              echo "<div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-3 col-lg-offset-3\">";
              echo "<a href=\"logout.php?logout\" class=\"link\" >Sign Out</a>";
                echo "<div id=\"openCart\">View Cart";
                  echo "<div id=\"cartDiv\" action=\"addCart.php\" method=\"POST\">";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
            echo "</div>";
            ?>



  <?php   
  
  $sqlstatement = "SELECT * FROM products";
  $xy = mysqli_query($conn,$sqlstatement);
  //$linkArray = Array();
  $counter = 0;
  
  $row = mysqli_fetch_array($xy, MYSQLI_ASSOC);
  echo "<div id=\"allproducts\">";            
      
    echo "<div class=\"row\" >";
      while ($row != NULL){
      
        $id = $row['product_id'];
        //$linkArray[$counter] = $row['product_id'];



                  echo "<div class=\"col-lg-2 col-md-2 col-sm-2 col-xs-2\">";
                  echo "<img class=\"img-responsive\" src=\"".$row['image'] ."\">";
                  echo "<p id='prodid'>".$row['product_id']."</p>";
                  echo "<a id=\"titel\" href='profile.php?id=" . $row['product_id'] . "'>" . $row['name']. "</a>"."<br>";
                  echo "<p id='price'>".$row['price']."€"."</p>";
                  echo "<a id=\"details\" href='profile.php?id=" . $row['product_id'] . "'>" . "details...". "</a>"."<br>";
                  echo "<button class=\"add\" value=\"". $id . "\" type=\"button\">Add</button>";
                  echo "</div>";
 

                //$linkArray[$counter] = $row['product_id'];
                $counter += 1;
            $row = mysqli_fetch_array($xy, MYSQLI_ASSOC);

            if($counter % 4 == 0) {
            echo "</div>";
            echo "<div class=\"row\" >";
            }
            
      }
    echo "</div>";
  echo "</div>";
echo "</div>";


?>

<script>
            $(document).ready(function(){
            $('.add').click(function(){
            var userid  = $("#userid").text();
            var id = $("#prodid").text();
            var name = $("#titel").text();  
            var price = $("#price").text();
            console.log(id);
            alert($(".add").attr("value"));
          
            var dataString = 'id1='+ id;
            var dataString1 = '&titel1='+ name;
            var dataString2 = '&price1='+ price;
            var dataString3 = '&userid1='+ userid;
            
           
            /*var dataString4 = dataString + "&" + dataString1 + "&" + dataString2 + "&" + dataString3 + "&" + dataString4 + "&" + dataString5 + "&" + dataString6;*/
            
            dataString4=dataString;
            dataString4+=dataString1;
            dataString4+=dataString2;
            dataString4+=dataString3;



            if(id==''){
            alert("Please Fill All Fields");
            }else{
            // AJAX Code To Submit Form.
              $.ajax({
                type: "POST",
                url: "addCart.php",
                data: dataString4,
                cache: false,
                success: function(result){
                  alert(result);
                 // window.location.reload();
                 $('#cartDiv').prepend(result);
                }
            });
            }
 return false;
       });
      });



    $(document).ready(function()
    {
        $("#delete").click(function()
        { console.log("Hallo");
            var del_id = $(this).val();

            console.log(del_id);
            $.ajax({
                type:'POST',
                url:'delete.php',
                data:'delete_id='+del_id,
                cache: false,
                success: function(data)
                {
                  alert(data);
                    //window.location.reload();
                    $("#"+data).remove();
                }
            });
        });
    });





</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script-ajax.js" type="text/javascript"></script>
</body>
</html>
<?php ob_end_flush(); ?>