<?php
$sql = "SELECT * FROM author INNER JOIN book ON author.AuthorID = book.AuthorID WHERE book.BookID = '{$_GET['BookID']}'";    
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);	 
?>  

<div class="bigholder">
	<h1>Edit book: <?php echo $result['BookTitle'] ?></h1>
	<form action="../../controller/pdoEditBook.php"  method="post">
		<fieldset>
			<legend>Author details</legend>
			<input type="hidden" name=authorid value="<?php echo $result['AuthorID'] ?>" required>
			<label>Name:</label>
			<input type="text" name=name maxlength="50" value="<?php echo $result['Name'] ?>" required><br><br>
			<label>Surname:</label>
			<input type="text" name=surname maxlength="50" value="<?php echo $result['Surname'] ?>" required><br><br>	
			<label>Nationality:</label>
			<input type="text" name=nationality maxlength="50" value="<?php echo $result['Nationality'] ?>" required><br><br>	
			<label>Year of Birth:</label>
			<input type="text" name=yob size="4" maxlength="4" value="<?php echo $result['BirthYear'] ?>" required><br><br>	
			<label>Year of Death:</label>
			<input type="text" name=yod size="4" maxlength="4" value="<?php echo $result['DeathYear'] ?>"><br><br>	
		</fieldset>
		<fieldset>
			<legend>Book details</legend>
			<input type="hidden" name=bookid value="<?php echo $result['BookID'] ?>" required>
			<label>Book Title:</label>
			<input type="text" name=bt maxlength="50" size="50" value="<?php echo $result['BookTitle'] ?>" required><br><br>
			<label>Original Title:</label>
			<input type="text" name=ot maxlength="50" size="50" value="<?php echo $result['OriginalTitle'] ?>" required><br><br>
			<label>Year of Publication:</label>		
			<input type="text" name=yop size="4" maxlength="4" value="<?php echo $result['YearofPublication'] ?>" required><br><br>	
			<label>Genre:</label>		
			<input type="text" name=genre maxlength="50" value="<?php echo $result['Genre'] ?>" required><br><br>	
			<label>Millions Sold:</label>		
			<input type="text" name=sold size="4" maxlength="4" value="<?php echo $result['MillionsSold'] ?>" required><br><br>	
			<label>Language Written:</label>		
			<input type="text" name=lan maxlength="50" value="<?php echo $result['LanguageWritten'] ?>" required><br><br>	
			<label>Cover Image Path:</label>		
			<input type="text" name=cip maxlength="255" size="50" value="<?php echo $result['coverImagePath'] ?>" required><br><br>	
			<input type="hidden" name="actiontype" value="editbook"/>
			<input type="submit" value="OK">
			<input type="button" onclick="location.href='?link=showbooks';" value="Cancel" />
		</fieldset>
	</form>
</div>