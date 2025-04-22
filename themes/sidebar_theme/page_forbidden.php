<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Page\Page;
use Concrete\Core\View\View;

/** @var Page $c */
/** @var View $this */
?>

<?php /** @noinspection PhpUnhandledExceptionInspection */
$this->inc('elements/header.php'); ?>

    <main>
        <?php echo t('You are not allowed to access this page.') ?>
    </main>

<?php /** @noinspection PhpUnhandledExceptionInspection */
$this->inc('elements/footer.php'); ?>