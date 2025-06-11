<?php
if (extension_loaded('pdo_mysql')) {
    echo "PDO MySQL driver is installed and loaded.";
} else {
    echo "PDO MySQL driver is not installed or not loaded.";
}
?>
