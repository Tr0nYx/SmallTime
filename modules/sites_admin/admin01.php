<?php
/********************************************************************************
 * Small Time
 * /*******************************************************************************
 * Version 0.9
 * Author:  IT-Master GmbH
 * www.it-master.ch / info@it-master.ch
 * Copyright (c), IT-Master GmbH, All rights reserved
 *******************************************************************************/
// Settings des Templates mit Bootstrap
if (strstr($_template->_bootstrap, 'true')) {
    ?>
    <ul class="nav nav-tabs adminmenu">
        <li class="nav-item<?php echo $_action == "anwesend" ? ' active' : ''; ?>">
            <a id="Home" class="nav-link"
               title="Home"
               href="?action=anwesend">Home</a>
        </li>
        <li class="nav-item<?php echo $_action == "user_add" ? ' active' : ''; ?>">
            <a id="Mitarbeiter" class="nav-link"
               title="Mitarbeiter erstellen"
               href="?action=user_add">new MA</a>
        </li>
        <li class="nav-item<?php echo $_action == "group" ? ' ctive"' : ''; ?>">
            <a id="Gruppen" class="nav-link"
               title="Gruppen verwalten"
               href="?action=group">Gruppe</a></li>
        <li class="nav-item<?php echo $_action == "design" ? ' active"' : ''; ?>">
            <a id="Design" class="nav-link"
               title="Design"
               href="?action=design">Design</a>
        </li>
        <li class="nav-item<?php echo $_action == "settings" ? ' active"' : ''; ?>">
            <a id="Settings" class="nav-link"
               title="Settings"
               href="?action=settings">Setting</a>
        </li>
        <li class="nav-item<?php echo $_action == "feiertage" ? ' active"' : ''; ?>">
            <a class="nav-link" id="Feiertag"
               title="Zus&auml;tzlicher Feiertag"
               href="?action=feiertage">Feiertage</a>
        </li>
        <li class="nav-item<?php echo $_action == "import" ? ' active"' : ''; ?>">
            <a id="Import" class="nav-link"
               title="Import von csv"
               href="?action=import">CSV
                Import</a></li>
        <li class="nav-item<?php echo $_action == "debug_info" ? ' active"' : ''; ?>">
            <a id="Status" class="nav-link"
               title="Status / Meldungen"
               href="?action=debug_info">Status</a>
        </li>
        <li class="nav-item<?php echo $_action == "idtime-generate" ? ' active"' : ''; ?>">
            <a id="Codes"
               class="nav-link"
               title="QR-Codes"
               href="?action=idtime-generate">QR-Codes</a>
        </li>
        <li class="nav-item<?php echo $_action == "pdfgenerate" ? ' active"' : ''; ?>">
            <a id="pdfgenerate"
               class="nav-link"
               title="pdfgenerate"
               href="?action=pdfgenerate">PDF</a>
        </li>
        <li class="nav-item<?php echo $_action == "logout" ? ' class="active"' : ''; ?>">
            <a id="Logout" title="Logout" class="nav-link"
               href="?action=logout">Logout</a>
        </li>
    </ul>
    <?php
//TODO : Template ohne Bootstrap -> löschen
} else { ?>
    <div class="pagination">
        <ul>
            <li><a id="Home" title="Home" href="?action=anwesend">Home</a></li>
            <li><a id="Mitarbeiter" title="Mitarbeiter erstellen" href="?action=user_add">new MA</a></li>
            <li><a id="Gruppen" title="Gruppen verwalten" href="?action=group">Gruppe</a></li>
            <li><a id="Design" title="Design" href="?action=design">Design</a></li>
            <li><a id="Settings" title="Settings" href="?action=settings">Setting</a></li>
            <li><a id="Feiertag" title="Zus&auml;tzlicher Feiertag" href="?action=feiertage">Feiertage</a></li>
            <li><a id="Import" title="Import von csv" href="?action=import">CSV Import</a></li>
            <li><a id="Status" title="Status / Meldungen" href="?action=debug_info">Status</a></li>
            <li><a id="Codes" title="QR-Codes" href="?action=idtime-generate">QR-Codes</a></li>
            <li><a id="Logout" title="Logout" href="?action=logout">Logout</a></li>
        </ul>
    </div>
<?php } ?>