<?php 

  $showbooks = "SELECT BookID, BookTitle, MillionsSold, coverImagePath FROM book ORDER BY MillionsSold DESC";
  $stmt = $conn->prepare($showbooks);
  $stmt->execute();
  $result = $stmt->fetchAll();

if($stmt->rowCount()< 1 ) {
echo "The bookshelf is empty.";
} else {
  foreach($result as $row) {?>
    <div class="holder">
      <figure>  
        <img src="<?php echo $row['coverImagePath']; ?>">
          <figcaption>
            <?php echo $row['BookTitle']; ?><br>
            <?php echo '<p class="black">'. $row['MillionsSold']."Million Sold". '</p>'; ?><br>
            <a href="?link=edit&BookID=<?php echo $row['BookID']; ?>">Edit</a><br>
            <a href="?link=delete&BookID=<?php echo $row['BookID']; ?>">Delete</a><br>
          </figcaption>
      </figure>
    </div>  
    <?php
  }
}
?>