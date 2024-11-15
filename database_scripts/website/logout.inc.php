# October 18 2024
# IT202001
#Sports Equipment Website
#vss24@njit.edu


<?php
session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit();
