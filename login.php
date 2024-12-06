<?php include("requires/header.php");?>
<section class="container">
<h2>Login</h2>

<form action="" method="post" class="row g-3 needs-validation" novalidate>


<div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validateUsername">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validateUsername" placeholder="Username" required>
        <div class="invalid-feedback">
          Please choose a Username.
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validatePassword">Password</label>
      <input type="password" class="form-control" id="validatePassword" placeholder="Password" value="" required>
      <div class="invalid-feedback">
        Please choose a Password.
      </div>
    </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="validate-register">Submit form</button>
  </div>
    
</form>
</section>
<?php include("requires/footer.php");?>