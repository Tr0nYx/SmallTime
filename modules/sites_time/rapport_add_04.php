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
<form action="?action=insert_rapport&timestamp=<?php echo $_time->_timestamp ?>&token=<?php echo $token ?>"
      method="post" target="_self">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Rapport</label>
        <textarea cols="120" rows="5" name="rapport" class="form-control" id="exampleFormControlTextarea1"
                  rows="3"><?php echo $_rapport->get_rapport($_user->_ordnerpfad,
                $_time->_timestamp); ?></textarea>
        <input type="hidden" name="absenden" value="UPDATE">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>