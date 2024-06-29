<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--TÍTULO-->
  <title>Coins</title>

  <!--BOOTSTRAP CSS-->
  <link href="<?= base_url('assets/libs/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">

  <!--FONTAWESOME CSS-->
  <link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome/all.min.css') ?>">

  <!--APP CSS-->
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">

  <!--PAGE CSS-->
  <?= $this->renderSection('page_css') ?>

  <!--FAVICON-->
  <link rel="shortcut icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon">

</head>

<body class="poppins-regular">

  <!--PRE-LOADER-->
  <div id="loader" class="col-6 loader"style=" background-color: white;">
    <div class="inner"></div>
  </div>

  <!--PAGE CONTENT-->  

  <div class="bg-secondary body">
    <?= $this->renderSection('content') ?>
  </div>

  <!--BOOTSTRAP JS-->
  <script src="<?= base_url('assets/libs/bootstrap/bootstrap.bundle.min.js') ?>"></script>

  <!--FONTAWESOME JS-->
  <script src="https://kit.fontawesome.com/29d69f2549.js" crossorigin="anonymous"></script>

</body>

</html>