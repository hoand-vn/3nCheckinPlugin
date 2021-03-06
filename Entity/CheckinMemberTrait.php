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


namespace Plugin\Checkin\Entity;

use Eccube\Annotation\EntityExtension;
use Doctrine\ORM\Mapping as ORM;

/**
 * @EntityExtension("Plugin\Checkin\Entity\Checkin")
 */
trait CheckinMemberTrait
{
    /**
     * @ORM\Column(name="member_id", type="string", length=255, nullable=true)
     */
    public $Member;

    /**
        * Set member.
        *
        * @param \Eccube\Entity\Member|null $member
        *
        * @return BaseInfo
        */
        public function setMember(\Eccube\Entity\Member $member = null)
        {
            $this->Member = $member;

            return $this;
        }

        /**
        * Get member.
        *
        * @return \Eccube\Entity\Member|null
        */
        public function getMember()
        {
            return $this->Member;
        }
}