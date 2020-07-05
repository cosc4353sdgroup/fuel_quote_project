<!DOCTYPE html>
<html>

<head>
    <title>Fuel Quote History</title>
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
  <div>
    <?php
      /* to include the header box */
      require 'header.php';
      require 'includes/dbh.inc.php';
    ?>
  </div>

    <div class="quotebox">
        <div>
            <?php
            /* this code queries and returns the quote */
            $username=$_SESSION['userid'];

            $sql = "SELECT * FROM quotes WHERE userid = $username";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "Quote ID #: " . $row["quoteNum"]."<br> Gallons: " . $row["gallons"]. "<br>  Desination: " . $row["delState"]. "<br>";
            echo " Price Per Gallon: $" . sprintf('%01.2f', $row["pricePerGal"]). "<br>";
            echo " Total Quote: $" . sprintf('%01.2f', $row["quotePrice"]). "<br>";
            echo "------------------------------<br>";
    }
  }
?>
        </div>
    </div>


</body>

</html>