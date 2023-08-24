<?php

$options = get_option('ic_design_checkout');
$layout = $options['ic_checkout_layout'];

if ($layout == '1') {

    include ( IC_PLUGIN_PATH . '/templates/admin/previews/checkouts/c1.php');
    ?>
    <?php
} else if ($layout == '3') {
    include ( IC_PLUGIN_PATH . '/templates/admin/previews/checkouts/c3.php');
    ?>

<?php
}