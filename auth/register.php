<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php
  
  if(isset($_SESSION["username"])) {
    header("location: ".APPURL."");
  }

  if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
      echo "<script>alert('some input are empty');</script>";
    } else {
      
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $birthdate = $_POST['birthdate'];
      $gender = $_POST['gender'];
  
      $insert = $conn->prepare("INSERT INTO users (username, email, mypassword, birthdate, gender)
       VALUES (:username, :email, :mypassword, :birthdate, :gender)");
  
      $insert->execute([
        ":username" => $username,
        ":email" => $email,
        ":mypassword" => $password,
        ":birthdate" => $birthdate,
        ":gender" => $gender,
      ]);
  
      header("location: login.php");
    }
  }

?>


  <div class="reservation-form">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="POST" role="search" action="register.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Register</h4>
              </div>
              <div class="col-md-12">
                <fieldset>
                    <label for="Name" class="form-label">Username</label>
                    <input type="text" name="username" class="username" placeholder="username" autocomplete="on" required>
                </fieldset>
              </div>

              <div class="col-md-12">
                  <fieldset>
                      <label for="Name" class="form-label">Email</label>
                      <input type="text" name="email" class="email" placeholder="email" autocomplete="on" required>
                  </fieldset>
              </div>
           
              <div class="col-md-12">
                <fieldset>
                    <label for="Name" class="form-label">Password</label>
                    <input type="password" name="password" class="password" placeholder="password" autocomplete="on" required>
                </fieldset>
              </div>

              <div class="col-md-12">
                <fieldset>
                  <label for="Date" class="form-label">Birthdate</label>
                  <input type="date" name="birthdate" class="birthdate" placeholder="birthdate" autocomplete="on" required>
                </fieldset>
              </div>

              <div class="col-md-12">
                <fieldset>
                  <label for="Gender" class="form-label">Gender</label>
                  <select name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </fieldset>
              </div>

              <div class="col-lg-12">                        
                  <fieldset>
                      <button type="submit" name="submit" class="main-button">register</button>
                  </fieldset>
              </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php require "../includes/footer.php"; ?>