<div class="container-fluid">
  <div class="jumbotron">
    <h1 class="display-4">Signup</h1>
    <p class="lead">This is the signup process</p>
    <hr class="my-4">
  </div>
  <form method="post" action="user/register" enctype="multipart/form-data">
    <div class="error">
      <?php echo $error_msg; ?>
    </div>
    <div class="form-group">
      <label for="name">First Name</label>
      <input id="name" class="form-control" type="text" name="firstName">
    </div>
    <div class="form-group">
      <label for="last-name">Last Name</label>
      <input id="last-name" class="form-control" type="text" name="lastName">
    </div>
    <div class="form-group">
      <label for="province">Provincia</label>
      <select id="province" class="form-control" name="province">
        <?php
        foreach ($provinces as $province) {
          echo "<option value=\"{$province['id']}\">{$province['name']}</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Email Address</label>
      <input id="email" class="form-control" type="text" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" class="form-control" type="password" name="password">
    </div>
    <div class="form-group">
      <label for="profilePic">Profile Picture</label>
      <input type="file" class="form-control" name="profilePic" id="profilePic" accept="image/png, image/jpeg" multiple="true">
    </div>
    <button type="submit" class="btn btn-primary"> Sign up </button>
  </form>
</div>