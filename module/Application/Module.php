<?php
namespace Application;

use Maatcode\Application\Module\AbstractModule;
use Maatcode\Application\Module\ModuleInterface;
use Application\Controller\IndexController;
use Application\Factory\Controller\IndexControllerFactory;
use Maatcode\Db\Adapter;


class Module extends AbstractModule implements ModuleInterface {

    public function getConfig () {
        return require __DIR__ . '/config/module.config.php';
    }

    public function getRouting(): array
    {
        return [
            '\/' => [
                'controller' => IndexController::class,
                'action' => 'index'
            ]
        ];
    }

    public function initServices()
    {

        //controllers
        $this->container->add(IndexController::class,
            IndexControllerFactory::create($this->container)
        );

        $this->container
            ->add(Adapter::class)
            ->addMethodCall('setAdapter', [
                \Laminas\Db\Adapter\Adapter::class
            ]);

        $this->container
            ->add(\Laminas\Db\Adapter\Adapter::class)
            ->addArgument([
                'driver' => 'mysqli',
                'database' => 'db_name',
                'username' => 'usernaam',
                'password' => 'password',
                'host' => 'localhost',
                'options' => ['buffer_results' => true],
            ]);    }

}
