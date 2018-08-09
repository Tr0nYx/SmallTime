<?php
/********************************************************************************
 * Small Time - Template
 * /*******************************************************************************
 * Version 0.9.021
 * Author:  IT-Master GmbH
 * www.it-master.ch / info@it-master.ch
 * Copyright (c), IT-Master GmbH, All rights reserved
 *******************************************************************************/
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <?php
    $_template->set_modulpfad('modules');
    include($_template->get_templatepfad().'/defaultheader.php');
    echo "\n";
    $package = json_decode(file_get_contents($_template->get_templatepfad().'/package.json'));
    $css = 'css/' . $package->name . '-' . $package->version . '.min.css';
    $libsjs = 'js/libs-' . $package->version . '.min.js';
    $js = 'js/' . $package->name . '-' . $package->version . '.min.js';
    ?>
    <link rel="stylesheet" type="text/css" media="screen"
          href="<?php echo $_template->get_templatepfad() . $css ?>" >
    <script src="<?php echo $_template->get_templatepfad() . $libsjs ?>"></script>
</head>
<?php //if($_modal == false)
if ($_modal == false) {
    ?>
    <body>
	<!--[if lt IE 8>
		<p class="browsehappy">
			You are using an <strong>outdated</strong> browser.
			Please <a href="http://browsehappy.com/">upgrade your browser</a>
			to improve your experience.
		</p>
	<![endif]-->
    <!--Anfang DIV für die InfoBox -->
    <div id="InfoBox" style="z-index: 1; visibility: hidden; left: 0px; top: 0px;">
        <div id="BoxInnen">
            <span id="BoxInhalte"></span>
        </div>
    </div>
    <!--Ende DIV für die InfoBox 	-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-12">
                <img style="width:100%" src="<?php echo $_template->get_templatepfad() ?>images/smalltime.jpg">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <div id='div_plugin'>
                    <?php include($_template->get_plugin()); ?>
                </div>
            </div>
            <div class="col-lg-9 col-xs-12">
                <div id="div_user01" class="float-right">
                    <!-- Hauptmenue !-->
                    <?php //echo " <pre> ".$_template->get_user01()."</pre> "; ?>
                    <?php include($_template->get_user01()); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <!-- Statistik / Bearbeitung / Infos !-->
                <div id='div_user03'>
                    <?php //echo " <pre> ".$_template->get_user03()."</pre> "; ?>
                    <?php include($_template->get_user03()); ?>
                </div>
            </div>
            <div class="col-lg-9 col-xs-12">
                <!-- Menue - für Content (Kalender) !-->
                <div id='div_user02'>
                    <?php //echo " <pre> ".$_template->get_user02()."</pre> "; ?>
                    <?php include($_template->get_user02()); ?>
                </div>
                <!-- Content / Monatsansicht / Eintragen, Edit usw. !-->
                <div id='div_user04'>
                    <?php //echo " <pre> ".$_template->get_user04()."</pre> "; ?>
                    <?php include($_template->get_user04()); ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer font-small blue pt-4">
        <div class="container-fluid text-center text-md-left">
            <?php echo $_copyright; ?>
        </div>
    </footer>
    <div id="mainModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Edit:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div id="modalBody" class="modal-body">
                </div>
                <div class="modal-footer">
                    <div id="scheduleModalMsg" class="alert alert-block alert-error d-none">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h3>Warning!</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo $_template->get_templatepfad() . $js ?>"></script>
    </body>
    <?php
} elseif ($_modal == true) {
    ?>
    <body>
    <div id='div_user04'>
        <?php include($_template->get_user04()); ?>
    </div>
    </body>
    <?php
} ?>
</html>