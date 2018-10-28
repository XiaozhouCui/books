<div class="bigholder">
	<h2>Registration Form</h2>
	<form action="../../controller/pdoReg.php"  method="post">
		<fieldset>
			<legend>Login details</legend>
			<label>Username:</label>
			<input type="text" maxlength="50" name=username required><br><br>
			<label>Password:</label>
			<input type="password" name=password required><br><br>
			<label>Role:</label>		
			<input type="radio" name=role value="Admin"> Admin
			<input type="radio" name=role value="User"> User<br><br>
		</fieldset>
		<fieldset>
			<legend>Personal details</legend>
			<label>Name:</label>
			<input type="text" maxlength="50" name=name required><br><br>
			<label>Surname:</label>
			<input type="text" maxlength="50" name=surname required><br><br>	
			<label>Email:</label>
			<input type="email" name=email required><br><br>	
			<input type="hidden" name="actiontype" value="reg"/>
			<input type="submit">			
			<input type="button" onclick="location.href='?link=showbooks';" value="Cancel" />
		</fieldset>
</form>
</div>







