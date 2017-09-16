
<?php
  include 'dbconnect.php';
	


// Selecting Database
//Fetching Values from URL
$id=$_POST['id1'];
$name=$_POST['titel1'];
$price=$_POST['price1'];
$userid=$_POST['userid1'];

// var_dump($_POST);
$sql = "INSERT INTO cart (product_id, user_id) VALUES (\"$id\", \"$userid\")";

if (mysqli_query($conn, $sql)) {
	$sql = "SELECT * FROM products WHERE product_id = \"$id\"";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);

    echo "<p>".$name."</p>";
    echo "<p>".$price."</p>";
    echo '<button action="delete.php" id="delete" value="'.$id.'" id="'.$videoId.'" type="button">Remove</button>';
    //echo $sql;
} else {
    echo "Error: " . $sql . mysqli_error($conn);
}
mysqli_close($conn);
?>