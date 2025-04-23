<?php

namespace Concrete\Package\SidebarTheme\Controller\SinglePage\Dashboard\SidebarTheme;

use Concrete\Core\Config\Repository\Repository;
use Concrete\Core\Error\ErrorList\ErrorList;
use Concrete\Core\Form\Service\Validation;
use Concrete\Core\Page\Controller\DashboardSitePageController;

class Settings extends DashboardSitePageController
{
    /** @var Repository */
    protected $config;
    /** @var Validation */
    protected $formValidator;

    public function on_start()
    {
        parent::on_start();
        $this->config = $this->getSite()->getConfigRepository();
        $this->formValidator = $this->app->make(Validation::class);
    }

    public function view()
    {
        if ($this->request->getMethod() === "POST") {
            $this->formValidator->setData($this->request->request->all());
            $this->formValidator->addRequiredToken("update_settings");

            if ($this->formValidator->test()) {
                $this->config->save("sidebar_theme.regular_logo_file_id", (int)$this->request->request->get("regularLogoFileId"));
                $this->config->save("sidebar_theme.footer_logo_file_id", (int)$this->request->request->get("footerLogoFileId"));
                $this->config->save("sidebar_theme.phone_number", (string)$this->request->request->get("phoneNumber"));
                $this->config->save("sidebar_theme.email", (string)$this->request->request->get("email"));

                if (!$this->error->has()) {
                    $this->set("success", t("The settings has been successfully updated."));
                }
            } else {
                /** @var ErrorList $errorList */
                $errorList = $this->formValidator->getError();

                foreach ($errorList->getList() as $error) {
                    $this->error->add($error);
                }
            }
        }

        $this->set("regularLogoFileId", (int)$this->config->get("sidebar_theme.regular_logo_file_id"));
        $this->set("footerLogoFileId", (int)$this->config->get("sidebar_theme.footer_logo_file_id"));
        $this->set("phoneNumber", (string)$this->config->get("sidebar_theme.phone_number"));
        $this->set("email", (string)$this->config->get("sidebar_theme.email"));
    }
}