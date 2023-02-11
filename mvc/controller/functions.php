<?php
    $newbie = true;
    function hud() {
        if ($logged) {
            // code here
            ?>
            <ul>
                <input type="checkbox" id="ul">
                <li class="upload"></li>
                <li class="profil"></li>
                <li class="album"></li>
            </ul>
            <?php
        } else {
            // code here
            ?>
            <input>
            <?php
        }
    }
?>