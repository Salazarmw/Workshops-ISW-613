<?php
  $name = @$_REQUEST['name'];
  $lastName = @$_REQUEST['lastname'];
  $phone = @$_REQUEST['phone'];
  $email = @$_REQUEST['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Name</title>
</head>
<body>
<form action=".\utils\database.php" method="POST">
  <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>"  placeholder="Your name">
    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $lastName; ?>"  placeholder="Your last name">
    <label for="">Datos Personales</label>
    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>"  placeholder="Your phone number">
    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>"  placeholder="Your email">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
