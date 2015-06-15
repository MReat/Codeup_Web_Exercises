
<?php
	var_dump($_GET);
	var_dump($_POST);
?>

<!DOCTYPE html>
<html>
<TITLE>My First HTML Form</TITLE>
	<body>
		
		<h1>Input Submit Lessons</h1>
		<h2>User Login</h2>
		<section class="form">
			<form method="POST" action="/my_first_form.php">
					<p>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder="username">
					</p>

					<p>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" placeholder="password">
					</p>

					<p>
						<button type="submit" name="submit" value="Log-In">Login Here</button>
					</p>
				</form>
			</section>

		<h1>Text and Textarea</h1>
		<h2>Compose Email</h2>
		<section class="form">
			<form method="POST" action="/my_first_form.php">
				<p>
					<label for="to">To:</label>
					<input id="to" name="to" type="email" placeholder="To" required>
				</p>

				<p>
					<label for="from">From:</label>
					<input id="from" name="from" type="email" placeholder="From" required>
				</p>
			
				<p>
					<label for="subject">Subject:</label>
					<input id="subject" name="subject" type="text" placeholder="Subject">
				</p>
				
				<p>
					<label for="email_body">Body:</label>
					<textarea id="email_body" name="email_body" rows="5" cols="40" placeholder="Text Here"></textarea>

				</p>


				<p>
					<label for="save_copy">Do you want to save a copy?</label>
					<input type="checkbox" id="save_copy" name="save_copy" value="yes" checked>


				</p>

				<p>
					<button type="submit" name="submit" value="send">Send</button>	
				</p>
			</form>
		</section> 

		<section>
			<h2>Multiple Choice Test</h2>
			<form class="form">
				<p>What is the best State?</p>
				
				<label>
				<input type="radio" name="s1" value="Texas">Texas
				</label>
				
				<label>
				<input type="radio" name="s1" value="New_York">New York
				</label>
				
				<label>
				<input type="radio" name="s1" value="California">California
				</label>
				
				<label>
				<input type="radio" name="s1" value="Washington">Washington
				</label>
				
				<label>
				<input type="radio" name="s1" value="Colorado">Colorado
				</label>
				

				<p>What is your favorite type of pet?</p>

				<p>
				<label for="pet_type">Pet Type:</label>
				<select id="pet_type" name="p[]" Multiple>
					<option value="dog">Dog</option>
					<option value="cat">Cat</option>
					<option value="bird">Bird</option>
					<option value="fish">Fish</option>
					<option value="robot">Robot</option>
					<option value="human">Human</option>
				</select>
				</p>

				<p>
				
				<button>Submit</button>
				
				</p>
				
			</form>
		

		
			<form>
			<h2>Select Testing</h2>
				<label for="programmer">Are you a programmer?</label>
					<select id="programmer" name="programmer">
						<option value="1">Yes</option>
						<option selected value="0">No</option>
				</select>
				
				<button>Send</button>

			</form>
		</section>
	
	</body>
</html>