<?php
$sql = "SELECT * FROM book WHERE BookID = '{$_GET['BookID']}'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);	 

?>  

<div class="bigholder">
  <h1>Delete book: <?php echo $result['BookTitle'] ?></h1>
  <form action="../../controller/pdoDelBook.php" method="post">
    <fieldset>		
    <p>Are you sure you wan to delete this book?</p>
    <p>"<?php echo $result['BookTitle'] ?>"</p>
      <input type="hidden" name="bookid" value="<?php echo $_GET['BookID'] ?>">
      <input type="hidden" name="actiontype" value="delbook">
      <input type="submit" value="OK">
      <input type="button" onclick="location.href='adminBookCentral.php';" value="Cancel" />
    </fieldset>
  </form>
</div>