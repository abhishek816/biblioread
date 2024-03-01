<!DOCTYPE html>
<html>
<head>
  <title>publisher signup</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image:url("library-with-books.jpg");
      background-position: center;
    }
    
    .container {
      background-image: linear-gradient(to bottom right, #e2e2e2, #ffffff);
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      
    }
    
    .container h2 {
      text-align: center;
    }
    .dropdown {
      position: absolute;
      top: 10px;
      right: 10px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    
    .form-group label {
      display: block;
      font-weight: bold;
    }
    
    .form-group input {
      width: 90%;
      padding: 8px;
      border-radius: 100px;
      border: 1px solid #ccc;
    }
	.button-container {
      text-align: center;
    }

    input[type="submit"] {
	
		width: 30%;
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
	.form-row {
      margin-bottom: 15px;
	  }
	.form-row label {
      display: block;
      font-weight: bold;
	  }
	 .form-row input,textarea {
      width: 90%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }
	.form-row {
      align-items: center;
    }
	.form-row input[type="tel"] {
	  width: 74%;
      flex: 1;
	}
	select#country-code{
     width: 15%;
      padding: 8px;
      border-radius: 100px;
      border: 1px solid #ccc;
	 }
	 .form-group input[type="password"] {
cursor: pointer;
	  }
    .logo img {
      width: 150px; 
    }
	
  </style>
</head>
<body>
  <div class="logo">
    <a href="index.php"><img src="images\main-logo1.png" alt="Logo"><a>
  </div>

  <div class="dropdown">
    <select onchange="location = this.value;">
      <option value="" disabled selected>Select User</option>
      <option value="login.php">User</option>
      <option value="admin_login.php">Admin</option>
      <option value="publishersignup.php">Publisher</option>
    </select>
  </div>
<div class="container">
  <h2>Publisher Signup</h2>
  <form action="pubsignup.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Publisher Name:</label>
    <input type="text" id="name" name="name" required><br><br>
</div>
<div class="form-group">
    <label for="company">Publication Name:</label>
    <input type="text" id="company" name="company" required><br><br>
</div>
<div class="form-group">
    <label for="Publication Address">Publication Address:</label>
	<textarea id="Publication Address" name="Publication_Address" required></textarea>
 </div>
<div class="form-row">
     <label for="phone">Phone Number:</label>
    <select id="country-code" name="country-code">
      <option value="+1">+1 (USA)</option>
      <option value="+44">+44 (UK)</option>
      <option value="+91">+91 (India)</option>
      <!-- Add more country code options as needed -->
    </select>
    <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>

    <!-- Your other form fields here -->

</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
</div>

<div class="form-group">
    <label for="date_of_origin">Date of orgin:</label>
    <input type="date" id="date_of_origin" name="date_of_origin" required><br><br>
</div>
<div class="form-group">
    <label for="document">Legal permission document:</label>
    <input type="file" id="document" name="document" required><br><br>
</div>
<div class="form-group">
<label for="password">Password:</label>
  <input type="password" name="password" pattern=".{8,}" required minlength="8" id="password">
  <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i> 
	<small style= "color:red;">password must have 8 characters*</small><br>
</div>
<div class="form-group">
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required onkeyup="validate_password()">
</div>
<span id="wrong_pass_alert"></span><br><br>
 <div class="button-container">
      <input type="submit" value="Signup"name="Signup" class="submit_btn" onclick="wrong_pass_alert()">
    </div>
	
</div>
  </form>
  <script>
   const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
<script>
function validate_password() {

			var pass = document.getElementById('password').value;
			var confirm_pass = document.getElementById('confirm_password').value;
			if (pass != confirm_pass) {
				document.getElementById('wrong_pass_alert').style.color = 'red';
				document.getElementById('wrong_pass_alert').innerHTML
					= ' Use same password';
				document.getElementById('create').disabled = true;
				document.getElementById('create').style.opacity = (0.4);
			} else {
				document.getElementById('wrong_pass_alert').style.color = 'green';
				document.getElementById('wrong_pass_alert').innerHTML =
					'Password Matched';
				document.getElementById('create').disabled = false;
				document.getElementById('create').style.opacity = (1);
			}
		}

		function wrong_pass_alert() {
			if (document.getElementById('pass').value != "" &&
				document.getElementById('confirm_pass').value != "") {
				alert("Your response is submitted");
			} else {
				alert("Please fill all the fields");
			}
		}
  </script>
</body>
</html>