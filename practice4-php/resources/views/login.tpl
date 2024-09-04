{extends file="layouts/main.tpl"}

{block name="title"}Login{/block}

{block name="css"}
  <link rel="stylesheet" href="{assets path='assets/css/utils/popup.css'}" />
  <link rel="stylesheet" href="{assets path='assets/css/login.css'}" />
{/block}

{block name="js"}
  <script src="{assets path='assets/js/components/popup.js'}"></script>
  <script src="{assets path='assets/js/login.js'}"></script>
{/block}

{block name="main"}
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <img class="w-100" src="{assets path='assets/img/login/login-banner.png'}"
          alt="" />
      </div>
      <div class="col-12 col-lg-6">
        <div class="login-header">
          <h1 class="login-title">Hello, Welcome Back</h1>
          <p class="login-desc">Hey, welcome back to your special place</p>
        </div>
        <form class="login-form" action="" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingUsername"
              placeholder="username123" />
            <label for="floatingUsername">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword"
              placeholder="********" />
            <label for="floatingPassword">Password</label>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value=""
                  id="checkRememberMe">
                <label class="form-check-label" for="checkRememberMe">
                  Remember me
                </label>
              </div>
            </div>
            <div class="col text-end">
              <a href="">Forgot Password ?</a>
            </div>
          </div>
          <button class="btn-submit btn btn-primary btn-lg"
            type="submit">Login</button>
        </form>
        <div class="login-footer">
          <p>Don't have an account? <a href="register.html">Register</a></p>
        </div>
      </div>
    </div>
  </div>
{/block}