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


namespace Plugin\Checkin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Checkin
 *
 * @ORM\Table(name="dtb_Checkin")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator_type", type="string", length=255)
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="Plugin\Checkin\Repository\CheckinRepository")
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE")
 */
class Checkin extends \Eccube\Entity\AbstractEntity
{
    use \Plugin\Checkin\Entity\CheckinPlaceTrait;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Checkin_name", type="string", length=255, nullable=true)
     */
    private $name;

  
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetimetz")
     */
    private $update_date;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude", type="decimal", precision=9, scale=6, nullable=true)
     */
    private $latitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude", type="decimal", precision=9, scale=6, nullable=true)
     */
    private $longitude;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set CheckinName.
     *
     * @param string|null $companyName
     *
     * @return BaseInfo
     */
    public function setName($companyName = null)
    {
        $this->name = $companyName;

        return $this;
    }

    /**
     * Get CheckinName.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set updateDate.
     *
     * @param \DateTime $updateDate
     *
     * @return BaseInfo
     */
    public function setUpdateDate($updateDate)
    {
        $this->update_date = $updateDate;

        return $this;
    }

    /**
     * Get updateDate.
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * Set latitude.
     *
     * @param string|null $latitude
     *
     * @return BaseInfo
     */
    public function setLatitude($latitude = null)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude.
     *
     * @return string|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude.
     *
     * @param string|null $longitude
     *
     * @return BaseInfo
     */
    public function setLongitude($longitude = null)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude.
     *
     * @return string|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

}
