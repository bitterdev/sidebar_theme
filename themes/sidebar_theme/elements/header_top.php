<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Localization\Localization;
use Concrete\Core\Page\Page;
use Concrete\Core\View\View;

/** @var Page $c */
/** @var View $view */

?>
<!DOCTYPE html>
<html lang="<?php echo Localization::activeLanguage() ?>">
<!--suppress HtmlRequiredTitleElement -->
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <?php echo $view->getThemeStyles(); ?>

    <?php
    /** @noinspection PhpUnhandledExceptionInspection */
    View::element('header_required', [
        'pageTitle' => $pageTitle ?? '',
        'pageDescription' => $pageDescription ?? '',
        'pageMetaKeywords' => $pageMetaKeywords ?? ''
    ]);
    ?>
</head>
<body>
<div class="<?php echo $c->getPageWrapperClass() ?>">
