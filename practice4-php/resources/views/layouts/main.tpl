<!DOCTYPE html>
<html lang="en">

<head>
  <title>{block name="title"}{/block} - Limitless</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="/assets/img/logo/logo-orange.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
    rel="stylesheet" />
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link rel="stylesheet"
    href="/assets/vendors/bootstrap-5.3.3/css/bootstrap.min.css" />
  {block name="css"}{/block}
</head>

<body>
  <div id="wrapper">
    <!-- HEADER SECTION -->
    {include file="components/header.tpl"}

    <!-- MAIN SECTION -->
    <main id="main">
      {block name="main"}{/block}
    </main>

    <!-- FOOTER SECTION -->
    {include file="components/footer.tpl"}
  </div>

  <script src="/assets/vendors/bootstrap-5.3.3/js/bootstrap.bundle.min.js">
  </script>
  <script src="/assets/vendors/jquery/jquery-3.7.1.min.js"></script>
  {block name="js"}{/block}
</body>

</html>