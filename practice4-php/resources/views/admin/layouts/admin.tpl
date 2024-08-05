<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{block name="title"}{/block} | Management | Limitless</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="{assets path='assets/admin/plugins/fontawesome-free/css/all.min.css'}">
  <!-- Theme style -->
  <link rel="stylesheet"
    href="{assets path='assets/admin/css/adminlte.min.css'}">
  {block name="css"}{/block}
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div
      class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake"
        src="{assets path='/assets/admin/img/AdminLTELogo.png'}"
        alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    {include file="admin/components/navbar.tpl"}

    <!-- Main Sidebar Container -->
    {include file="admin/components/sidebar.tpl"}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      {block name="main"}{/block}
    </div>

    <!-- Footer -->
    {include file="admin/components/footer.tpl"}

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
  </div>

  <!-- jQuery -->
  <script src="{assets path='assets/admin/plugins/jquery/jquery.min.js'}">
  </script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{assets path='assets/admin/plugins/jquery-ui/jquery-ui.min.js'}">
  </script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script
    src="{assets path='assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'}">
  </script>
  <!-- AdminLTE App -->
  <script src="{assets path='assets/admin/js/adminlte.min.js'}"></script>
  {block name="js"}{/block}
</body>

</html>