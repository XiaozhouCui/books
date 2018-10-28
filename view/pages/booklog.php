<div class="bigholder">
  <br><h1>Last Updated Date</h1>
</div>
<?php 
$editlog = "SELECT book.BookTitle, editrecord.actionType, max(editrecord.time) AS time FROM editrecord INNER JOIN book ON editrecord.bookID = book.BookID WHERE actionType = 'editbook' GROUP BY book.bookID  ORDER BY time DESC";
$stmt1 = $conn->prepare($editlog);
$stmt1->execute();
$result = $stmt1->fetchAll();

if($stmt1->rowCount()< 1 ) {
echo "No book has been updated.";
} else {
  foreach($result as $row) {
    echo '<p class="black">Title: "'. $row['BookTitle'].'" Last Updated On: '. $row['time'];
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
