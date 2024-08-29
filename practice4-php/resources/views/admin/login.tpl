<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="{assets path='assets/admin/plugins/fontawesome-free/css/all.min.css'}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet"
    href="{assets path='assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css'}">
  <!-- Theme style -->
  <link rel="stylesheet"
    href="{assets path='assets/admin/css/adminlte.min.css'}">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h2 class="h1"><b>Admin</b>LTE</h2>
      </div>
      <div class="card-body">
        <p
          class="login-box-msg {empty($smarty.session.msg_err) ? "" : "text-danger"}">
          {empty($smarty.session.msg_err) ? "Sign in to start your session" : $smarty.session.msg_err}
        </p>

        <form action="" method="post" id="loginForm">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Enter Username"
              name="username" autocomplete="off"
              {empty($smarty.session.old_username) ? "autofocus" : "" }
              value="{empty($smarty.session.old_username) ? "" : $smarty.session.old_username }">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control"
              placeholder="Enter Password" name="password" autocomplete="off"
              {empty($smarty.session.old_username) ? "" : "autofocus" }>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="checkbox icheck-peterriver">
                <input type="checkbox" id="remember" name="remember" checked>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">
                Sign In
              </button>
            </div>
          </div>
        </form>

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{assets path='assets/admin/plugins/jquery/jquery.min.js'}">
  </script>
  <!-- Bootstrap 4 -->
  <script
    src="{assets path='assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'}">
  </script>
  <script
    src="{assets path='assets/admin/plugins/jquery-validation/jquery.validate.min.js'}">
  </script>
  <!-- AdminLTE App -->
  <script src="{assets path='assets/admin/js/adminlte.min.js'}"></script>
  <script src="{assets path='assets/admin/js/pages/login.js'}"></script>
</body>

</html>