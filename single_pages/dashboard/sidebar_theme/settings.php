<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\Application\Service\FileManager;
use Concrete\Core\Form\Service\Form;
use Concrete\Core\Form\Service\Widget\PageSelector;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Validation\CSRF\Token;
use Concrete\Core\View\View;

/** @var string $phoneNumber */
/** @var string $email */
/** @var int $regularLogoFileId */
/** @var int $footerLogoFileId */

$app = Application::getFacadeApplication();
/** @var Form $form */
$form = $app->make(Form::class);
/** @var Token $token */
$token = $app->make(Token::class);
/** @var FileManager $fileManager */
$fileManager = $app->make(FileManager::class);
/** @var PageSelector $pageSelector */
$pageSelector = $app->make(PageSelector::class);

?>

<div class="ccm-dashboard-header-buttons">
    <?php \Concrete\Core\View\View::element("dashboard/help", [], "sidebar_theme"); ?>
</div>

<form action="#" method="post">
    <?php echo $token->output("update_settings"); ?>

    <fieldset>
        <legend>
            <?php echo t("General"); ?>
        </legend>

        <div class="form-group">
            <?php echo $form->label("phoneNumber", t("Phone Number")); ?>
            <?php echo $form->text("phoneNumber", $phoneNumber); ?>
        </div>

        <div class="form-group">
            <?php echo $form->label("email", t("Email")); ?>
            <?php echo $form->text("email", $email); ?>
        </div>

        <div class="form-group">
            <?php echo $form->label("regularLogoFileId", t("Logo")); ?>
            <?php echo $fileManager->image("regularLogoFileId", "regularLogoFileId", t("Please select a file"), $regularLogoFileId); ?>
        </div>

        <div class="form-group">
            <?php echo $form->label("footerLogoFileId", t("Footer Logo")); ?>
            <?php echo $fileManager->image("footerLogoFileId", "footerLogoFileId", t("Please select a file"), $footerLogoFileId); ?>
        </div>
    </fieldset>

    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <?php echo $form->submit('save', t('Save'), ['class' => 'btn btn-primary float-end']); ?>
        </div>
    </div>
</form>