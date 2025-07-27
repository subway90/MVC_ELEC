<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="/assets/file/system/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <title><?= $title ? $title : WEB_NAME ?></title>
</head>

<?= toast_show() // Hiện thị toast nếu có ?>

<style>
    .img-heading {
        filter: drop-shadow(0.2px 0.3px 0.5px #000000);
    }
</style>

<body>

<div class="d-flex flex-column align-items-center">
    <!-- LOGO -->
    <img class="col-6 col-md-5 col-lg-4 mt-5" src="<?= URL_STORAGE ?>system/logo.png" alt="logo">
    <!-- HEADER -->
    <div class="heading-1 text-main">
        Private Event
    </div>
    <div class="heading-2 text-uppercase text-main">
        Hội nghị thân mật khách hàng
    </div>
</div>