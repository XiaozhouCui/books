<div class="bigholder">
	<h1>Add a new book</h1>
	<form action="../../controller/pdoAddBook.php"  method="post">
		<fieldset>
			<legend>Author details</legend>
			<label>Name:</label>
			<input type="text" name=name required><br><br>
			<label>Surname:</label>
			<input type="text" name=surname required><br><br>	
			<label>Nationality:</label>
			<input type="text" name=nationality required><br><br>	
			<label>Year of Birth:</label>
			<input type="text" name=yob required><br><br>	
			<label>Year of Death:</label>
			<input type="text" name=yod><br><br>	
		</fieldset>
		<fieldset>
			<legend>Book details</legend>
			<label>Book Title:</label>
			<input type="text" name=bt required><br><br>
			<label>Original Title:</label>
			<input type="text" name=ot><br><br>
			<label>Year of Publication:</label>		
			<input type="text" name=yop required><br><br>	
			<label>Genre:</label>		
			<input type="text" name=genre required><br><br>
			<label>Millions Sold:</label>		
			<input type="text" name=sold required><br><br>	
			<label>Language Written:</label>		
			<input type="text" name=lan required><br><br>	
			<label>Cover Image Path:</label>		
			<input type="text" name=cip required><br><br>	
			<input type="hidden" name="actiontype" value="addbook">
			<input type="submit">
		</fieldset>
	</form>
</div>