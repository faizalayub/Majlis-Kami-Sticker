<?php
    include 'controllers/StickerController.php';
    include 'controllers/TemplateController.php';
    
    $API = new StickerController('RETURN');
    $TEMPLATE = new TemplateController('RETURN');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Experiment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $TEMPLATE->landing_metaheader(); ?>

    <style>
        @font-face {
            font-family: afterglow;
            src: url('./assets/js/banner-stage/fonts/Afterglow-Regular.ttf');
        }

        @font-face {
            font-family: mirage;
            src: url('./assets/js/banner-stage/fonts/Made-Mirage-Regular.otf');
        }
    </style>
</head>
<body>
    <div id="app" class="bg-light d-flex p-3 align-items-center justify-content-center" style="height: 100%; width: 100%;"></div>

    <script src="public/js/dashboard.js"></script>
    <script src="public/js/konva-banner.js?3"></script>
</body>
</html>