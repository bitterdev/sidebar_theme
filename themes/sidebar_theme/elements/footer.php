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

$logoUrl = $pkg->getRelativePath() . "/images/logo-light.svg";

$f = File::getByID($siteConfig->get("sidebar_theme.footer_logo_file_id"));

if ($f instanceof FileEntity) {
    $fv = $f->getApprovedVersion();

    if ($fv instanceof Version) {
        $logoUrl = $fv->getURL();
    }
}

$homePage = Page::getByID(Page::getHomePageID($c::getCurrentPage()));
$phoneNumber = $siteConfig->get("sidebar_theme.phone_number");
$email = $siteConfig->get("sidebar_theme.email");

?>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php if (strlen($phoneNumber) > 0 || strlen($email) > 0) { ?>
                        <ul class="social-links">
                            <?php if (strlen($phoneNumber) > 0) { ?>
                                <li>
                                    <a href="tel:<?php echo h($phoneNumber); ?>"
                                       title="<?php echo h(t("Phone Number")) ?>">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if (strlen($email) > 0) { ?>
                                <li>
                                    <a href="mailto:<?php echo h($email); ?>"
                                       title="<?php echo h(t("Email")) ?>">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>

                    <div class="logo">
                        <a href="<?php echo Url::to($homePage) ?>">
                            <div class="brand">
                                <img src="<?php echo $logoUrl; ?>"
                                     alt="<?php echo h($homePage->getCollectionName()) ?>">
                            </div>
                        </a>
                    </div>

                    <div class="navigation">
                        <?php
                        $a = new GlobalArea("Footer Navigation");
                        $a->display();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    </div>

<?php $this->inc("elements/footer_bottom.php"); ?>