<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\GlobalArea;
use Concrete\Core\Entity\File\Version;
use Concrete\Core\File\File;
use Concrete\Core\Package\PackageService;
use Concrete\Core\Page\Page;
use Concrete\Core\Site\Service;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Support\Facade\Url;
use Concrete\Core\View\View;
use Concrete\Package\SidebarTheme\Controller;
use Concrete\Core\Entity\File\File as FileEntity;

/** @var Page $c */
/** @var View $this */

$app = Application::getFacadeApplication();
/** @var PackageService $pkgService */
/** @noinspection PhpUnhandledExceptionInspection */
$pkgService = $app->make(PackageService::class);
/** @var Service $siteService */
/** @noinspection PhpUnhandledExceptionInspection */
$siteService = $app->make(Service::class);
$site = $siteService->getActiveSiteForEditing();
$siteConfig = $site->getConfigRepository();
$pkgEntity = $pkgService->getByHandle("sidebar_theme");
/** @var Controller $pkg */
$pkg = $pkgEntity->getController();

$logoUrl = $pkg->getRelativePath() . "/images/logo.svg";

$f = File::getByID($siteConfig->get("sidebar_theme.regular_logo_file_id"));

if ($f instanceof FileEntity) {
    $fv = $f->getApprovedVersion();

    if ($fv instanceof Version) {
        $logoUrl = $fv->getURL();
    }
}

/** @var Page $c */
/** @var View $this */

$phoneNumber = $siteConfig->get("sidebar_theme.phone_number");
$email = $siteConfig->get("sidebar_theme.email");
$homePage = Page::getByID(Page::getHomePageID($c::getCurrentPage()));
/** @noinspection PhpUnhandledExceptionInspection */
$this->inc("elements/header_top.php");

?>

<button class="navbar-toggle"><i></i></button>

<nav id="sidebar">
    <a href="<?php echo Url::to($homePage) ?>" class="logo">
        <img src="<?php echo $logoUrl; ?>" alt="<?php echo h($homePage->getCollectionName()) ?>">
    </a>

    <nav class="main-menu">
        <?php
        $a = new GlobalArea("Header Navigation");
        $a->display();
        ?>
    </nav>

    <div class="contact-links">
        <?php if (strlen($phoneNumber) > 0 || strlen($email) > 0) { ?>
            <ul>
                <?php if (strlen($phoneNumber) > 0) { ?>
                    <li>
                        <a href="tel:<?php echo h($phoneNumber); ?>">
                            <?php echo $phoneNumber; ?>
                        </a>
                    </li>
                <?php } ?>

                <?php if (strlen($email) > 0) { ?>
                    <li>
                        <a href="mailto:<?php echo h($email); ?>">
                            <?php echo $email; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</nav>

<div class="content-section">
