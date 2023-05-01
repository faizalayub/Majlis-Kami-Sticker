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
                            <h3><strong>My Account</strong> Details</h3>
                        </div>

                        <div class="col-auto ms-auto text-end mt-n1">
							<a href="#" class="btn btn-primary">Edit Account</a>
						</div>
                    </div>
                    <!--#END HEADER -->

                    <!--#START BODY -->
                    <div class="row">
						<div class="col-xl-12 col-xxl-12">
							<div class="card flex-fill w-100">
                                <!--#START Content -->
								<div class="card-body pt-4 pb-3">
                                
                                    content

								</div>
                                <!--#END Content -->
							</div>
						</div>
					</div>
                    <!--#END BODY -->

                </div>
            </main>

            <?php echo $TEMPLATE->landing_footer(); ?>
        </div>
    </div>

    <script src="public/js/dashboard.js"></script>
</body>
</html>