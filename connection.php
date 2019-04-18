
            <?php

            //establish connection to the database
            $db = new mysqli("localhost", "root", "pwdpwd", "shop1");
            if (!$db) {
                echo "Sorry, there was a problem connecting";
                exit;
            }

            ?>

