<?php

namespace Plugin\Checkin\Event;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Eccube\Annotation\PreUpdate;
use Eccube\Entity\Event\EntityEventListener;

/**
 * @PreUpdate("Plugin\Checkin\Entity\Checkin")
 */
class EntityCheckinListener implements EntityEventListener
{
    /**
     *
     * @param LifecycleEventArgs $eventArgs
     */
    public function execute(LifecycleEventArgs $eventArgs)
    {
        /** @var PreUpdateEventArgs $eventArgs */
        if ($eventArgs->hasChangedField('name')) {
            dump($eventArgs);    
            $new = $eventArgs->getNewValue('name');
            $old = $eventArgs->getOldValue('name');

            error_log($new);
            error_log($old);
        }
    }
}
