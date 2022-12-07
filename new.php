<link rel="stylesheet" href="./public/login.css">
<?php include './layout/header.php' ?>
<?php
$name = $description = $imgs = '';
$price = $quantity = 0;
$name_err = $description_err = $price_err = $quantity_err = $err_message = $msg = '';

if (isset($_POST['submit'])) {
  if (empty($_POST['name'])) {
    $name_err = "Product name is required";
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_EMAIL);
  }
  if (empty($_POST['description'])) {
    $description_err = "Product Description is required";
  } else {
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($_POST['price'])) {
    $price_err = "Product Price is required";
  } else {
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
    $price = intval($price);
  }
  if (empty($_POST['quantity'])) {
    $quantity_err = "Product Quantity is required";
  } else {
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_SPECIAL_CHARS);
    $quantity = floatval($quantity);
  }



  // $allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];
  $files_moved = [];

  // var_dump($_FILES);

  if (!empty($_FILES['image']['name'])) {
    // print_r($_FILES);

    $total = count($_FILES['image']['name']);

    for ($i = 0; $i < $total; $i++) {

      $file_name = $_FILES['image']['name'][$i];
      $file_tmp = $_FILES['image']['tmp_name'][$i];
      $target_dir = "uploads/${file_name}";

      $img += $img . "//e-commerce/" . $target_dir . ";";

      // var_dump($file_tmp);
      // FILE EXT

      // $file_ext = explode('.', $file_name);
      // $file_ext = strtolower(end($file_ext));


      $mv = move_uploaded_file($file_tmp, $target_dir);
      array_push($files_moved, $mv);
      // $mv ? $err_message = 'File Uploaded': null;


      var_dump($mv);

      // VALIDATE FILE EXT AND SIZE

      // if(in_array($file_ext, $allowed_ext)){
      //   if ($file_size <= 1000000) {
      //   } else {
      //     $err_message = 'File too large';
      //   }
      // }else{
      //   $err_message = 'Invalid file';
      // }
    }
  } else {
    $err_message = 'Choose a valid file';
  }

  if (empty($name_err) && empty($description_err) && empty($price_err) && empty($quantity_err) && empty($err_message)) {
    $sql = "INSERT INTO product (name, description, price, quantity, image) VALUES ('$name', '$description', '$price', '$quantity', $imgs)";
    if (mysqli_query($conn, $sql)) {
      header('Location: login.php');
    } else {
      $err_message = 'Internal server error';
    }
  }
}

?>



<div class=" flex-r container my-login-container">
  <div class="flex-r login-wrapper">
    <div class="login-text">
      <div class="logo">
        <span><i class="fa-solid fa-upload"></i></span>
        <span>Upload a new product</span>

        <p class="err-msg text-danger"><?php echo $name_err ?: $description_err ?: $price_err ?: $quantity_err ?: $err_message ?: $msg ?> </p>
      </div>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="flex-c">
        <div class="input-box login-input-box">
          <span class="label">Product Name</span>
          <div class="flex-r input">
            <input class="form-control border-0" type="text" name="name" required placeholder="">
          </div>
        </div>
        <div class="input-box login-input-box">
          <span class="label">Description</span>
          <div class=" flex-r input">
            <textarea class="form-control border-0" id="body" name="description" placeholder="product description"></textarea>
          </div>
        </div>
        <div class="input-box login-input-box">
          <span class="label">Price</span>
          <div class=" flex-r input">
            <input class="form-control border-0" type="number" name="price" required placeholder="£5.89">
          </div>
        </div>
        <div class="input-box login-input-box">
          <span class="label">Available Quantity</span>
          <div class=" flex-r input">
            <input class="form-control border-0" type="number" onkeydown="if(event.key==='.'){event.preventDefault();}" name="quantity" required placeholder="5">
          </div>
        </div>
        <div class="input-box login-input-box">
          <span class="label">Product Images</span>
          <div class=" flex-r input">
            <input class="form-control border-0" type="file" name="image[]" required multiple accept="image/jpg, image/png, image/jpeg" onchange="fileValidation" />
          </div>
        </div>

        <input class="btn login-btn text-white" name="submit" type="submit" value="Upload">
      </form>

    </div>
  </div>
</div>
</body>