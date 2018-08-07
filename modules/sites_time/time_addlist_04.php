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
<form name="insert"
      action="?action=insert_time_list&timestamp=<?php echo $_time->_timestamp ?>&token=<?php echo $token ?>"
      method="post" target="_self">
    <div class="form-group">
        <label for="inputtag">Tag:</label>
        <input class="form-control" id="inputtag" type="text" name="_w_tag" value="<?php echo $_time->_tag; ?>"/>
    </div>
    <div class="form-group">
        <label for="inputmonat">Monat:</label>
        <input class="form-control" id="inputmonat" type="text" name="_w_monat" value="<?php echo $_time->_monat; ?>"/>
    </div>
    <div class="form-group">
        <label for="inputjahr">Jahr</label>
        <input class="form-control" id="inputjahr" type="text" name="_w_jahr" value="<?php echo $_time->_jahr; ?>"/>

    </div>
    <div class="form-group">
        <label for="inputmultiple">Mehrere Zeitangaben : z.B</label>
        <input class="form-control" type="text" placeholder="7.51-12.05-13-16.20" readonly>
    </div>
    <div class="form-group">
        <label for="inputinput">Eingabe:</label>
        <input class="form-control" id="inputinput" type="text" name="_zeitliste" value=""/>
    </div>
    <div class="form-group">
        <?php if (!strstr($_template->_jquery, 'true')) { ?>
            <input type='hidden' name='absenden' value='CANCEL'>
        <?php } ?>
        <input type="hidden" name="absenden" value="OK">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>