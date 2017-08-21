<?php

namespace Plugin\Checkin\ServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use Silex\Api\BootableProviderInterface;
use Silex\Application;

use Plugin\Checkin\Event\EntityCheckinListener;
use Plugin\Checkin\Event\ServiceListener;
use Plugin\Checkin\Form\Type\CheckinType;

class CheckinServiceProvider implements ServiceProviderInterface, BootableProviderInterface
{
    public function register(Container $app)
    {
        //for Event/EntityCheckinListener
        $app['plugin.checkin.checkin_listener'] = function (Container $container) {
            return new EntityCheckinListener();
        };

        // Repository
        $app['plugin.checkin.repository.checkin'] = function () use ($app) {
            return $app['orm.em']->getRepository('\Plugin\Checkin\Entity\Checkin');
        };

        $app->extend('form.types', function ($types) use ($app) {
            $types[] = new \Plugin\Checkin\Form\Type\CheckinType();
            return $types;
        });

        // translator
        // $app['translator'] = $app->share($app->extend('translator', function (Translator $translator, Application $app) {
        //     $file = __DIR__.'/../Resource/locale/message.'.$app['locale'].'.yml';
        //     if (file_exists($file)) {
        //         $translator->addResource('yaml', $file, $app['locale']);
        //     }

        //     return $translator;
        // }));
    }

    public function boot(Application $app)
    {
        //for Event/EntityCheckinListener
        $app['eccube.entity.event.dispatcher']
            ->addEventListener($app['plugin.checkin.checkin_listener']);
    }
}
