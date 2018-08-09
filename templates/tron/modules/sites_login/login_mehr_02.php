<?php
/********************************************************************************
 * Small Time
 * /*******************************************************************************
 * Version 0.896
 * Author:  IT-Master GmbH
 * www.it-master.ch / info@it-master.ch
 * Copyright (c), IT-Master GmbH, All rights reserved
 *******************************************************************************/
if ($_settings->_array[13][1]) {
    get_gruppen();
} else {
    echo $_infotext02;
}
function get_gruppen()
{
    global $_groups;
    global $_grpwahl;
    global $_action;
    echo "<div class=\"row\"><div class=\"col-md-6 mb-4\"><table width='100%' hight='100%' border='0' cellpadding='3' cellspacing='1'  ><tr>";
    $y = 1;
    $breite = round((100 / count($_groups->_array)), 1);
    foreach ($_groups->_array as $_group) {
        // Administratorengruppe nicht anzeigen, dann ist $y ==1
        if ($y > 1) {
            //$_group = explode(";", $_group);
            if ($_grpwahl == -1) {
                $_grpwahl = 1;
            }

            if ($_grpwahl == $_group[0] - 1) {
                echo "        <td class='td_background_heute' align ='center' valign='middle' width='".$breite."%'>";
            } else {
                echo "        <td class='td_background_top' align ='center' valign='middle' width='".$breite."%'>";
            }
            echo "                <a href='?action=$_action&group=$y'>";
            echo "                <img src='./images/icons/group_go.png'> ";
            //echo $_group[0];
            echo $_group[1];
            //echo $_grpwahl;
            //echo $_group[2];
            echo "                </a>    ";
            echo "                </td>";
        }
        $y++;
    }
    echo "        </tr></table></div></div>";
}

if (strstr($_template->_bootstrap, 'true')) {
    ?>
    <div class="row">
        <div class="col-md-6 mb-4">
            <form class="text-center border border-light p-5" name="login"
                  action='index.php?action=login_mehr&timestamp=<?php echo time() ?>&token=<?php echo $token ?>&group=<?php echo $_grpwahl + 1; ?>'
                  method='post' target='_self'>
                <div class="alert alert-block">
                    <h4>
                        Schnell-Stempeln!
                    </h4>
                </div>
                <label for="inputname">
                    Name:
                </label>
                <input class="form-control" id="inputname" type='text' name='_n' value='' size='20'
                       onfocus="this.value=''">
                <i style="margin-left: 5px;" class="icon-user">
                </i>

                <label style="margin-top: 10px;" for="inputpasswd">
                    Passwort:
                </label>
                <input class="form-control" id="inputpasswd" type='password' name='_p' value='' size='20'
                       onfocus="this.value=''">
                <i style="margin-left: 5px;" class="icon-lock">
                </i>

                <input class="btn primary-color-dark" type='submit' name='login' value='Stempelzeit eintragen'>
                <input type='hidden' name='tmp_log' value='<?php echo $_SESSION['tmp_login']; ?>'>

            </form>
            <?php
            if ($_infotext04) {
                echo '<div id="mehrlogininfo">';
                echo $_infotext04;
                echo '</div>';
            }

            if ($_POST['login']) {
                $_SESSION['admin'] = array();
                $_SESSION['admin'] = "";
                $_Userpfad = "";
            }
            ?>
            <a class="btn btn-danger" href="admin.php">
                <img style="width: 50%;" src="images/ico/admin.png" alt=""/>
                <br>
                Admin - Login
            </a>
            <a class="btn btn-elegant" href="index.php?group=-1">
                <img style="width: 50%" src="images/ico/user-icon.png" alt=""/>
                <br>
                Single - Login
            </a>
        </div>
    </div>
    <?php
} else {
    ?>
    <form name="login"
          action='index.php?action=login_mehr&timestamp=<?php echo $_time->_timestamp ?>&token=<?php echo $token ?>&group=<?php echo $_grpwahl + 1; ?>'
          method='post' target='_self'>
        <table width=100% border=0 cellpadding=3 cellspacing=1>
            <tr>
                <td align=left COLSPAN=2 class=td_background_top width=60>
                    Stempelzeit eintragen :
                </td>
            </tr>
            <tr>
                <td align=left class=td_background_tag width=100>
                    Name :
                </td>
                <td align=left class=td_background_tag>
                    <input type='text' name='_n' value='' size='20' onfocus="this.value=''">
                </td>
            </tr>
            <tr>
                <td align=left class=td_background_tag width=100>
                    Passwort :
                </td>
                <td align=left class=td_background_tag>
                    <input type='password' name='_p' value='' size='20' onfocus="this.value=''">
                </td>
            </tr>
            <tr>
                <td align=center COLSPAN=2 width=60>
                    <input type='submit' name='login' value='Stempelzeit eintragen'>
                    <input type='hidden' name='tmp_log' value='<?php echo $_SESSION['tmp_login']; ?>'>
                </td>
            </tr>
        </table>
    </form>
    <?php
    if ($_POST['login']) {
        $_SESSION['admin'] = array();
        $_SESSION['admin'] = "";
        $_Userpfad = "";
    }
    ?>
    <br><br><br>
    <a href="?group=-1">
        <img height="80" src="images/ico/user-icon.png" alt=""/><br> Einzel - Login ...
    </a>
    <hr>
    <a href="admin.php">
        <img height="80'" src="images/ico/admin.png" alt=""/>
        <br>
        Admin - Login ...
    </a><?php
}