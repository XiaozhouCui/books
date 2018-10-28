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
            <p class="black"><?php echo $row['BookTitle']; ?></p>
            <p class="black"><?php echo $row['MillionsSold']; ?> Millions Sold</p><br>
            <a style="color:blue" href="?link=editbook&BookID=<?php echo $row['BookID']; ?>">Edit</a>
            <a style="color:blue" href="?link=delbook&BookID=<?php echo $row['BookID']; ?>">Delete</a>
          </figcaption>
      </figure>
    </div>  
    <?php
  }
}
?>