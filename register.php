<?php include("requires/header.php");?>
<section class="container">
<h2>Register</h2>

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
    <div class="col-md-4 mb-3">
      <label for="validateFirstname">First name</label>
      <input type="text" class="form-control" id="validateFirstname" placeholder="First name" value="" required>
      <div class="invalid-feedback">
        Please choose a First Name.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validateLastname">Last name</label>
      <input type="text" class="form-control" id="validateLastname" placeholder="Last name" value="" required>
      <div class="invalid-feedback">
      Please choose a Last Name.
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validateDNI">DNI</label>
      <input type="number" class="form-control" id="validateDNI" placeholder="123456789" required>
      <div class="invalid-feedback">
        Please choose a DNI.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validateEmail">Email</label>
      <input type="email" class="form-control" id="validateEmail" placeholder="email@server.com" required>
      <div class="invalid-feedback">
        Please choose a Email.
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions & privacy.
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="validate-register">Submit form</button>
  </div>
    
</form>
</section>
<?php include("requires/footer.php");?>