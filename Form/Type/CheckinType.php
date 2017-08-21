<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
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


namespace  Plugin\Checkin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class CheckinType extends AbstractType
{
    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'required' => true,
                'constraints' => array(
                    new Assert\NotBlank(),
                ),
            ))
            ->add('latitude', TextType::class, array(
                'required' => false,
            ))
            ->add('longitude', TextType::class, array(
                'required' => false,
            ));
    }

    /**
     * {@inheritdoc}
     */
    // public function configureOptions(OptionsResolver $resolver)
    // {
    //     $resolver->setDefaults(array(
    //         'data_class' => Maker::class,
    //     ));
    // }

    /**
     * {@inheritdoc}
     */
     public function getName()
     {
         return 'admin_maker';
     }
}
