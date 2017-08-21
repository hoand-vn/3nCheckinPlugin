<?php
/*
 * This file is part of the Related Product plugin
 *
 * Copyright (C) 2016 LOCKON CO.,LTD. All Rights Reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace Plugin\Checkin;

use Eccube\Application;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Eccube\Event\TemplateEvent;
use Eccube\Event\EventArgs;


class ServiceListener
{
    /**
     * @var Application
     */
    private $app;

    /**
     *
     * @param Application $app
     */
    public function __construct($app)
    { 
        $this->app = $app;
    }

    /**
     *
     * @param TemplateEvent $event
     */
    public function onRenderProductDetail(TemplateEvent $event)
    {   
        $snipet = $this->app['twig']->getLoader()->getSource('Checkin/Resource/template/front/product_detail.twig');
        $source = $event->getSource();

        $search = self::RELATED_PRODUCT_TAG;
        $replace = $search.$snipet;
      
        $source = str_replace($search, $replace, $source);
        $event->setSource($source);
    }

    /**
     *
     * @param EventArgs $event
     */
    public function onProductDetailInitialize(EventArgs $event)
    {
        $Product = $event->getArgument('Product');
        dump($Product);
    }
}
