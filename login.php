<?php include './layout/header.php' ?>

<?php 

  function compare_password ($password, $hash){
    return password_verify($password, $hash) ? true: false;
  };

 $email = $password = $email_err = $password_err = $err_msg = '';

 if(isset($_POST['submit'])){
  if(empty($_POST['email'])) {
    $email_err= "Email is required";
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }
  if(empty($_POST['password'])) {
    $password_err= "Password is required";
  } else {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if(empty($email_err) && empty($password_err)){
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_object($result);
    
    if(!empty($user)){
      if(compare_password($password, $user->password)){
        $err_msg = '';
        $_SESSION['first_name'] = $user->first_name;
        $_SESSION['last_name'] = $user->last_name;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['is_admin'] = $user->is_admin;

        echo 'Welcome ' . $_SESSION['first_name'] . '!';
        header('Location: index.php');

      } else {
        $err_msg = "Invalid email or password!";
      }
    } else {
      $err_msg = "Invalid email or password!";
    }
    
    
  } else{
  }
  $result->close();
 }
?>
<link rel="stylesheet" href="./public/login.css">
<div class=" flex-r container my-login-container">
    <div class="flex-r login-wrapper">
      <div class="login-text">
        <div class="logo">
          <span><i class="fab fa-speakap"></i></span>
          <span>Sign in to buy products</span>
          <p class="err-msg text-danger"><?php echo $email_err?: $password_err ?: $err_msg ?> </p>

        </div>
        <!-- <h1>Sign Up</h1>,
        <p>It's not long before you embark on this journey! </p> -->

        <form class="flex-c" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
          <div class="input-box login-input-box">
            <span class="label">E-mail</span>
            <div class=" flex-r input">
              <input type="text" name="email" required placeholder="name@abc.com">
              <i class="fas fa-at"></i>
            </div>
          </div>

          <div class="input-box login-input-box">
            <span class="label">Password</span>
            <div class="flex-r input">
              <input type="password" name="password" required placeholder="(a, A, 1, #)">
              <i class="fas fa-lock"></i>
            </div>
          </div>

          <!-- <div class="check">
            <input type="checkbox" name="" id="">
            <span>I've read and agree with T&C</span>
          </div> -->

          <input class="btn login-btn" type="submit" name="submit" value="Login">
          <span class="extra-line">
            <span>Already have an account?</span>
            <a href="./signup.php">Sign Up</a>
          </span>
        </form>

      </div>
    </div>
  </div>
</body>

<?php include './layout/footer.php' ?>