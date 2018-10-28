<div class="bigholder">
  <br><h1>Last Updated Date</h1>
</div>
<?php 
$editlog = "SELECT * FROM editrecord INNER JOIN book ON editrecord.bookID = book.BookID INNER JOIN user ON editrecord.loginID = user.login_id WHERE time IN (SELECT MAX(time) FROM editrecord GROUP BY bookID ) HAVING actionType = 'editbook' ORDER BY time DESC";
$stmt1 = $conn->prepare($editlog);
$stmt1->execute();
$result = $stmt1->fetchAll();

if($stmt1->rowCount()< 1 ) {
echo "No book has been updated.";
} else {
  foreach($result as $row) {
    echo '<p class="black">Book: "'. $row['BookTitle'].'" Last Updated by: "'.$row['name'].' '. $row['surname'].'" On: "'. $row['time'].'".';
  }
}
?>
<div class="bigholder">
	<br><h1>Created Date</h1>
</div>
<?php
$addlog = "SELECT book.BookTitle, editrecord.actionType, editrecord.time FROM editrecord INNER JOIN book ON editrecord.bookID = book.BookID WHERE actionType = 'addbook' GROUP BY book.bookID ORDER BY time DESC";
$stmt2 = $conn->prepare($addlog);
$stmt2->execute();
$result2 = $stmt2->fetchAll();

if($stmt2->rowCount()< 1 ) {
  echo "No book has been added.";
} else {
  foreach($result2 as $row2) {
    echo '<p class="black">Title: "'. $row2['BookTitle'].'" Created On: '. $row2['time'];
  }
}

?>
