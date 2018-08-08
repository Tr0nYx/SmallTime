<?php
/********************************************************************************
 * Small Time
 * /*******************************************************************************
 * Version 0.896
 * Author:  IT-Master GmbH
 * www.it-master.ch / info@it-master.ch
 * Copyright (c), IT-Master GmbH, All rights reserved
 *******************************************************************************/
?>
<form action="?action=insert_absenz&timestamp=<?php echo $_time->_timestamp ?>&token=<?php echo $token ?>" method="post"
      target="_self" name="form">
    <div class="form-group">
        <label for="grundlabel">Absenzen Grund f&uuml;r den: <?php echo date("d.m.y", $_time->_timestamp); ?></label>

        <?php
        echo "<select id='grundlabel' class='form-control' name='_grund' size='1'>\n";
        foreach ($_absenz->_filetext as $_tmp) {
            $_tmp = explode(";", $_tmp);
            echo "       <option value='$_tmp[1]'>$_tmp[0]</option>\n";
        }
        echo "      </select>\n";
        ?>
    </div>
    <div class="form-group">
        <label for="anzahllabel">Anzahl (1 oder 0.5):</label>
        <input class="form-control" type="text" id="anzahllabel" name="_anzahl" value="1" size="3">
    </div>
    <?php if (!strstr($_template->_jquery, 'true')) { ?>
        <input type='hidden' name='absenden' value='CANCEL'>
    <?php } ?>
    <input type="hidden" name="absenden" value="OK">
    <button type="submit" class="btn btn-primary mb-2">Absenden</button>
</form>