<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2017 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace Plugin\Checkin\Controller;

use Eccube\Application;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Symfony\Component\HttpFoundation\Request;

use Plugin\Checkin\Entity\Checkin;
use Plugin\Checkin\Repository\CheckinRepository;

use Plugin\Checkin\Form\Type\CheckinType;

/**
 * @Route("/checkin")
 */
class FrontController
{
    /**
     * @Route("/", name="checkin/index")
     * @Template("Checkin/Resource/template/index.twig")
     */
    public function index(Application $app)
    {
        $data = $app['plugin.checkin.repository.checkin']->findAll();
        // $data = $app['plugin.checkin.repository.checkin']->test();
        return ['data'=>$data];
    }

    /**
     * @Route("/{id}", requirements={"id" = "\d+"}, name="checkin/detail")
     * @Method("GET")
     * @ParamConverter("item")
     * @Template("Checkin/Resource/template/detail.twig")
     */
    public function detail(Application $app, Checkin $item)
    {
        // $data = $app['orm.em']->getClassMetadata(get_class($item))->discriminatorValue;
        // dump($data);exit;
        return ['data'=>$item];
    }

    /**
     * @Route("/create", name="checkin/create")
     * @Template("Checkin/Resource/template/create.twig")
     */
     public function create(Application $app, Request $request)
     {
         $item = new Checkin();
         $form = $app['form.factory']->createBuilder(CheckinType::class, $item)->getForm();
         $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
            $app['orm.em']->save($item);
            $app['orm.em']->flush($item);

            $app->addSuccess('admin.plugin.maker.save.complete', 'admin');
            return $app->redirect($app->url('checkin/index'));
        }

         return ['item' => $item, 'form' => $form->createView()];
     }

    /**
     * @Route("/form")
     * @Method("POST")
     */
    public function submit(Application $app, Request $request)
    {
        return $app->escape('Hello, '.$request->get('value'));
    }

    /**
     * @Route("/{id}", requirements={"id" = "\d+"})
     * @Method("DELETE")
     * @ParamConverter("item")
     * @Template("Checkin/Resource/template/index.twig")
     */
     public function delete(Application $app, Checkin $item)
     {   
         // $repos = $app['plugin.checkin.repository.checkin']->delete($item); //have to setDelFlag in table
         $app['orm.em']->remove($item);
         $app['orm.em']->flush($item);
         $data = $app['plugin.checkin.repository.checkin']->findAll();
         return ['data'=>$data];
     }
}