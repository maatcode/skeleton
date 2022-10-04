<?php

namespace Application\Factory\Controller;

use Application\Controller\IndexController;
use Maatcode\Application\Factory\FactoryInterface;
use League\Container\Container;

class IndexControllerFactory implements FactoryInterface
{
    public static function create(Container $container): IndexController
    {
        return new IndexController();
    }
}
