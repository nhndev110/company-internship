{extends file="layouts/main.tpl"}

{block name="title"}Login{/block}

{block name="css"}
  <link rel="stylesheet" href="{assets path='assets/css/utils/popup.css'}" />
  <link rel="stylesheet" href="{assets path='assets/css/register.css'}" />
{/block}

{block name="js"}
  <script src="{assets path='assets/js/components/popup.js'}"></script>
  <script src="{assets path='assets/js/register.js'}"></script>
{/block}

{block name="main"}
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="register-header mb-4">
          <h1 class="register-title">Create your account</h1>
          <p class="register-desc">
            Fil the form below to create an account.
          </p>
        </div>
        <form class="row g-3">
          <div class="col-md-6">
            <label for="inputFirstName" class="form-label">
              First Name
              <span class="text-danger">*</span>
            </label>
            <input name="firstName" type="text" class="form-control"
              id="inputFirstName" placeholder="Jane" />
          </div>
          <div class="col-md-6">
            <label for="inputLastName" class="form-label">
              Last Name
              <span class="text-danger">*</span>
            </label>
            <input name="lastName" type="text" class="form-control"
              id="inputLastName" placeholder="Pollock" />
          </div>
          <div class="col-md-12">
            <label for="inputEmail" class="form-label">
              Email
              <span class="text-danger">*</span>
            </label>
            <input name="email" type="email" class="form-control" id="inputEmail"
              placeholder="name@gmail.com" />
          </div>
          <div class="col-md-6">
            <label for="inputPassword" class="form-label">
              Password
              <span class="text-danger">*</span>
            </label>
            <input name="password" type="password" class="form-control"
              id="inputPassword" />
          </div>
          <div class="col-md-6">
            <label for="inputConfirmPassword" class="form-label">
              Confirm Password
              <span class="text-danger">*</span>
            </label>
            <input name="confirmPassword" type="password" class="form-control"
              id="inputConfirmPassword" />
          </div>
          <div class="col-12">
            <div class="form-text">
              We want you to know exactly how our sevice works and why we
              need your details. Please confirm that you hav read,
              undertood and accept the terms and conditions.
            </div>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck" />
              <label class="form-check-label" for="gridCheck">
                I have read, understood and accept the terms and
                conditions
              </label>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-lg">
              Register
            </button>
          </div>
        </form>
      </div>
      <div class="col-12 col-lg-6">
        <img class="w-100"
          src="{assets path='assets/img/register/register-banner.jpg'}" alt="" />
      </div>
    </div>
  </div>
{/block}