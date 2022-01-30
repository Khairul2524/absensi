<!DOCTYPE html>

<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Pro Bootstrap Admin Template</title>

    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
    <meta name="robots" content="noindex">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-118965717-1');
    </script>
</head>

<body class="c-app flex-row align-items-center">
    <?= $view ?>

    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            setTimeout(function() {
                document.body.classList.remove('c-no-layout-transition')
            }, 2000);
        });
    </script>
</body>

</html>