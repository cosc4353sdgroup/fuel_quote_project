<!DOCTYPE html>
<html>

<head>
    <title>Fuel Quote</title>
</head>

 
<style>
body {
  /* page formatting */
    font-family: Arial, Helvetica, sans-serif;
}

.quotebox {
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>

<body>


<?php
/* to include the header box */
  require 'header.php';
  require 'includes/dbh.inc.php';

?>

<?php
  /* this code displays the calculated price per gallon */
  $userdata = mysqli_query($conn,"SELECT * FROM quotes ORDER BY quoteNum DESC LIMIT 1");
  $result = mysqli_fetch_array($userdata);
?>
<div class="quotebox">
  <p>Price per Gallon: $<?php echo  sprintf('%01.2f', $result['pricePerGal']);?></p>
  <p>Total Quote: $<?php echo sprintf('%01.2f', $result['quotePrice']);?></p>
</div>
</body>

</html>
