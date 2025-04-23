<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\Area;
use Concrete\Core\Page\Page;
use Concrete\Core\View\View;

/** @var Page $c */
/** @var View $this */
?>

<?php /** @noinspection PhpUnhandledExceptionInspection */
$this->inc('elements/header.php'); ?>

    <main>
        <div id="map">
            <?php
            $a = new Area('Map');
            $a->enableGridContainer();
            $a->display($c);
            ?>
        </div>

        <div class="text-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <?php
                        $a = new Area('Main');
                        $a->enableGridContainer();
                        $a->display($c);
                        ?>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <?php
                        $a = new Area('Contact Details');
                        $a->enableGridContainer();
                        $a->display($c);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php /** @noinspection PhpUnhandledExceptionInspection */
$this->inc('elements/footer.php'); ?>