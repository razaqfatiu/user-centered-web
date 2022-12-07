<link rel="stylesheet" href="./public/login.css">
<?php include './layout/header.php' ?>

<?php
 $first_name = $last_name = $email = $password = '';
 $first_name_err = $last_name_err = $email_err = $password_err = $err_message = '' ;

 if(isset($_POST['submit'])) {
  if(empty($_POST['first_name'])) {
    $first_name_err = 'First Name is required';
  } else {
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if(empty($_POST['last_name'])) {
    $last_name_err = 'Last Name is required';
  } else {
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if(empty($_POST['email'])) {
    $email_err = 'Email is required';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }
  if(empty($_POST['password']) || strlen($_POST['password']) < 6)  {
    $password_err = 'Password is required and must be greater than 6 characters';
  } else {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = password_hash($password, PASSWORD_DEFAULT);
  }

  if(empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($err_message)) {
    $sql_user_exists = "SELECT * FROM `user` WHERE email = '$email'";
    $user_exists = mysqli_query($conn, $sql_user_exists);

    if($user_exists->num_rows > 0) {
      // var_dump( $user_exist->result['num_rows']);
      $err_message = "User Already exist";
    } else {
      $sql = "INSERT INTO user (first_name, last_name, email, password, is_admin) VALUES ('$first_name', '$last_name', '$email', '$password', false)";
      if(mysqli_query($conn, $sql)) {
        header('Location: login.php');
      } else {
        $err_message = 'Internal server error';
      }
    }
  }
 }
?>

<div class=" flex-r container my-login-container">
    <div class="flex-r login-wrapper">
      <div class="login-text">
        <div class="logo">
          <span><i class="fab fa-speakap"></i></span>
          <span>Create a new account</span>

          <p class="err-msg text-danger"><?php echo $first_name_err ?: $last_name_err ?: $email_err ?: $password_err ?: $err_message ?> </p>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="flex-c">
          <div class="input-box login-input-box">
            <span class="label">First Name</span>
            <div class="flex-r input">
              <input type="text" name="first_name" required placeholder="John" >
              <i class="fa-solid fa-user"></i>
            </div>
          </div>
          <div class="input-box login-input-box">
            <span class="label">Last Name</span>
            <div class=" flex-r input">
              <input type="text" name="last_name" required placeholder="Doe">
              <i class="fa-solid fa-user"></i>
            </div>
          </div>
          <div class="input-box login-input-box">
            <span class="label">E-mail</span>
            <div class=" flex-r input">
              <input type="email" name="email" required placeholder="name@abc.com">
              <i class="fas fa-at"></i>
            </div>
          </div>

          <div class="input-box login-input-box">
            <span class="label">Password</span>
            <div class="flex-r input">
              <input type="password" name="password" required placeholder="5+ (a, A, 1, #)">
              <i class="fas fa-lock"></i>
            </div>
          </div>

          <input class="btn login-btn text-white" name="submit" type="submit" value="Create an Account">
          <span class="extra-line">
            <span>Already have an account?</span>
            <a href="./login.php">Sign In</a>
          </span>
        </form>

      </div>
    </div>
  </div>
</body>