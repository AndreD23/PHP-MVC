<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\User;
use Source\Support\Seo;

/**
 * Class Web
 * @package Source\App
 */
class Web
{
    /** @var Engine */
    private $view;

    /** @var Seo */
    private $seo;

    /**
     * Web constructor.
     */
    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../../theme", "php");
        $this->seo = new Seo();
    }

    /**
     *
     */
    public function home(): void
    {
        $users = (new User())->find()->fetch(true);
        $head = $this->seo->render(
            "Home | " . SITE_NAME,
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolor dolorum in nam non odit omnis quasi reprehenderit veniam voluptas.",
            url(),
            "https://via.placeholder.com/1200x628.png?text=Home+Cover"
        );
        echo $this->view->render("home", [
            "head" => $head,
            "users" => $users
        ]);
    }

    /**
     *
     */
    public function contact(): void
    {
        $head = $this->seo->render(
            "Contato | " . SITE_NAME,
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolor dolorum in nam non odit omnis quasi reprehenderit veniam voluptas.",
            url("contato"),
            "https://via.placeholder.com/1200x628.png?text=Contato+Cover"
        );
        echo $this->view->render("error", [
            "head" => $head
        ]);
    }

    /**
     * @param array $data
     */
    public function error(array $data): void
    {
        $head = $this->seo->render(
            "Erro {$data['errcode']} | " . SITE_NAME,
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolor dolorum in nam non odit omnis quasi reprehenderit veniam voluptas.",
            url("ops/{$data['errcode']}"),
            "https://via.placeholder.com/1200x628.png?text=Erro+{$data['errcode']}+Cover"
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $data["errcode"]
        ]);
    }
}