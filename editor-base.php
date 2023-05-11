<?php
    include 'controllers/StickerController.php';
    include 'controllers/TemplateController.php';
    
    $API = new StickerController('RETURN');
    $TEMPLATE = new TemplateController('RETURN');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $TEMPLATE->landing_metaheader(); ?>
</head>
<body>
    <div class="wrapper">
        <?php echo $TEMPLATE->landing_sidebar(); ?>

        <div class="main">
            <?php echo $TEMPLATE->landing_navigation(); ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <!--#START HEADER -->
                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>Create Sticker</strong> Setting</h3>
                        </div>
                    </div>
                    <!--#END HEADER -->
                
                    <div class="card vh-100">
                        <div class="card-body" id="base-content"></div>
                    </div>

                </div>
            </main>

            <?php echo $TEMPLATE->landing_footer(); ?>
        </div>
    </div>

    <script src="public/js/dashboard.js"></script>
    <script src="public/js/base-editor.js"></script>
</body>
</html>