<?php
/********************************************************************************
 * Small Time
 * /*******************************************************************************
 * Version 0.9.020
 * Author:  IT-Master GmbH
 * www.it-master.ch / info@it-master.ch
 * Copyright (c), IT-Master GmbH, All rights reserved
 *******************************************************************************/
$_ShowUsername = false;        // Anzeige des Usernamens
$_ShowUserOnline = false;        // Anzeige ob Anwesend oder Abwesend (grün oder rot)
$_ShowUserLastTime = false;        // letzte Stempelzeit von heute anzeigen
$_ShowUserAllTime = false;        // alle Stempelzeiten von heute anzeigen
$_ShowUserPic = false;        // Bid des users anzeigen
if (file_exists("./include/Settings/multilogin.xml")) {
    $multilogin = simplexml_load_file("./include/Settings/multilogin.xml");
} else {
    create_mulitsettings();
    $multilogin = simplexml_load_file("./include/Settings/multilogin.xml");
}
setGuest();
// falls eingeloogt, dann User - Einstellungen laden 
if (isset($_SESSION['admin'])) {
    setUser();
}
// admin-Pannel? (admin.php), dann Admin - Einstellungen laden
if ($_logcheck->_admins && isset($_SESSION['admin'])) {
    setAdmin();
}

function setGuest()
{
    global $multilogin;
    global $_ShowUsername;
    global $_ShowUserOnline;
    global $_ShowUserLastTime;
    global $_ShowUserAllTime;
    global $_ShowUserPic;

    if ($multilogin->guest->ShowUsername == "true") {
        $_ShowUsername = true;
    } else {
        $_ShowUsername = false;
    }
    if ($multilogin->guest->ShowUserOnline == "true") {
        $_ShowUserOnline = true;
    } else {
        $_ShowUserOnline = false;
    }
    if ($multilogin->guest->ShowUserLastTime == "true") {
        $_ShowUserLastTime = true;
    } else {
        $_ShowUserLastTime = false;
    }
    if ($multilogin->guest->ShowUserAllTime == "true") {
        $_ShowUserAllTime = true;
    } else {
        $_ShowUserAllTime = false;
    }
    if ($multilogin->guest->ShowUserPic == "true") {
        $_ShowUserPic = true;
    } else {
        $_ShowUserPic = false;
    }
}

function setUser()
{
    global $multilogin;
    global $_ShowUsername;
    global $_ShowUserOnline;
    global $_ShowUserLastTime;
    global $_ShowUserAllTime;
    global $_ShowUserPic;

    if ($multilogin->user->ShowUsername == "true") {
        $_ShowUsername = true;
    } else {
        $_ShowUsername = false;
    }
    if ($multilogin->user->ShowUserOnline == "true") {
        $_ShowUserOnline = true;
    } else {
        $_ShowUserOnline = false;
    }
    if ($multilogin->user->ShowUserLastTime == "true") {
        $_ShowUserLastTime = true;
    } else {
        $_ShowUserLastTime = false;
    }
    if ($multilogin->user->ShowUserAllTime == "true") {
        $_ShowUserAllTime = true;
    } else {
        $_ShowUserAllTime = false;
    }
    if ($multilogin->user->ShowUserPic == "true") {
        $_ShowUserPic = true;
    } else {
        $_ShowUserPic = false;
    }
}

function setAdmin()
{
    global $multilogin;
    global $_ShowUsername;
    global $_ShowUserOnline;
    global $_ShowUserLastTime;
    global $_ShowUserAllTime;
    global $_ShowUserPic;

    if ($multilogin->admin->ShowUsername == "true") {
        $_ShowUsername = true;
    } else {
        $_ShowUsername = false;
    }
    if ($multilogin->admin->ShowUserOnline == "true") {
        $_ShowUserOnline = true;
    } else {
        $_ShowUserOnline = false;
    }
    if ($multilogin->admin->ShowUserLastTime == "true") {
        $_ShowUserLastTime = true;
    } else {
        $_ShowUserLastTime = false;
    }
    if ($multilogin->admin->ShowUserAllTime == "true") {
        $_ShowUserAllTime = true;
    } else {
        $_ShowUserAllTime = false;
    }
    if ($multilogin->admin->ShowUserPic == "true") {
        $_ShowUserPic = true;
    } else {
        $_ShowUserPic = false;
    }

}

//vSettings - Einstellungen : Anwesenheitsliste anzeigen
if ($_settings->_array[13][1] OR $_SESSION['admin']) {
    //template unsterstützt Bootstrap
    if (strstr($_template->_bootstrap, 'true')) {
        //-------------------------------------------------------------------------------------------------------------
        // Anzeige der Anwesenheitsliste
        //-------------------------------------------------------------------------------------------------------------
        if (!$_grpwahl) {
            $_grpwahl = 1;
        }
        if ($_grpwahl == -1) {
            $_grpwahl = 1;
        }
        $_group = new time_group($_grpwahl);
        if (@$id) {
            $_grpwahl = $_group->get_usergroup($id);
        }
        $anzMA = count($_group->_array[1][$_grpwahl]);
        echo '<table border="0" cellspacing="1" cellpadding="3" width=100%>';
        for ($x = 0; $x < $anzMA; $x++) {
            //Anwesend oder nicht
            $count_time = count($_group->_array[5][$_grpwahl][$x]);
            $anwesend = $count_time % 2;
            if ($_ShowUserOnline or $_ShowUserAllTime) {
                $alertclass = $anwesend ? "alert alert-success table-success" : "alert alert-error table-danger";
            } else {
                $alertclass = $anwesend ? "alert alert-error table-error" : "alert alert-error table-danger";
            }
            echo '<tr>';
            // Mitarbeiter - Bild anzeigen
            if ($_ShowUserPic) {
                if (file_exists("./Data/".$_group->_array[2][$_grpwahl][$x]."/img/bild.jpg")) {
                    echo '<td class="'.$alertclass.'" width="50">';
                    echo '<img src="./Data/'.$_group->_array[2][$_grpwahl][$x].'/img/bild.jpg" alt="" width="50" />';
                    echo '</td>';
                } else {
                    echo '<td class="'.$alertclass.'" width="50">';
                    echo '<img src="./images/ico/user-icon.png" alt="" width="50" />';
                    echo '</td>';
                }
            }
            // Mitarbeiter - Name
            if ($_ShowUsername) {
                echo '<td class="'.$alertclass.'">';
                echo $_group->_array[4][$_grpwahl][$x];
                echo '</td>';
            }
            if ($_ShowUserLastTime && !$_ShowUserAllTime) {
                echo '<td class="'.$alertclass.'">';
                if ($anwesend) {
                    echo "Anwesend seit : ".$_group->_array[5][$_grpwahl][$x][count($_group->_array[5][$_grpwahl][$x]) - 1];
                } else {
                    echo "Abwesend";
                }
                echo '</td>';
            } elseif ($_ShowUserAllTime) {
                echo '<td class="'.$alertclass.'">';
                if ($anwesend) {
                    echo "Anwesend : ";

                    $str = implode(" - ", $_group->_array[5][$_grpwahl][$x]);
                    echo $str;

                } else {
                    echo "Abwesend";
                }
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        // TODO : Template ohne Bootstrap -> löschen
    } else {
        if (!isset($_SESSION['admin'])) {
            //-------------------------------------------------------------------------------------------------------------
            //Falls keins Session existiert, nur Userliste anzeigen ohne Onlinestatus
            //-------------------------------------------------------------------------------------------------------------
            if (!$_grpwahl) {
                $_grpwahl = 1;
            }
            if ($_grpwahl == -1) {
                $_grpwahl = 1;
            }
            $_group = new time_group($_grpwahl);
            if ($id) {
                $_grpwahl = $_group->get_usergroup($id);
            }
            $anzMA = count($_group->_array[1][$_grpwahl]);
            echo '<table border="0" cellspacing="1" cellpadding="3" width=100%>';
            for ($x = 0; $x < $anzMA; $x++) {
                $count_time = count($_group->_array[5][$_grpwahl][$x]);
                $anwesend = $count_time % 2;
                if ($anwesend) {
                    $pic = "green";
                } else {
                    $pic = "red";
                }
                echo '<tr>';
                echo '<td class="td_background_tag" height="32px">';
                echo $_group->_array[4][$_grpwahl][$x];
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            //-------------------------------------------------------------------------------------------------------------
            //Userliste mit Anwesend seit - neu bei Login anzeigen
            //-------------------------------------------------------------------------------------------------------------
            if (!$_grpwahl) {
                $_grpwahl = 1;
            }
            if ($_grpwahl == -1) {
                $_grpwahl = 1;
            }
            $_group = new time_group($_grpwahl);
            if ($id) {
                $_grpwahl = $_group->get_usergroup($id);
            }
            $anzMA = count($_group->_array[1][$_grpwahl]);
            echo '<table border="0" cellspacing="1" cellpadding="3" width=100%>';
            for ($x = 0; $x < $anzMA; $x++) {
                $count_time = count($_group->_array[5][$_grpwahl][$x]);
                $anwesend = $count_time % 2;
                if ($anwesend) {
                    $pic = "green";
                } else {
                    $pic = "red";
                }
                echo '<tr>';
                echo '<td class="td_background_tag" width="40">';
                echo '<img width="32" height="32" border="0" alt="" src="images/'.$pic.'.png">';
                echo '</td>';
                echo '<td class="td_background_tag">';
                echo $_group->_array[4][$_grpwahl][$x];
                echo '</td>';
                echo '<td class="td_background_tag">';
                if ($anwesend) {
                    echo "Anwesend seit : ".$_group->_array[5][$_grpwahl][$x][count($_group->_array[5][$_grpwahl][$x]) - 1];
                } else {
                    echo "Abwesend";
                }
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }

} else {
    echo $_infotext04;
}
$_group = null;