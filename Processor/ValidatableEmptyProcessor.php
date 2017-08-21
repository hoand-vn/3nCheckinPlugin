<?php

namespace Plugin\PurchaseProcessors\Processor;

use Eccube\Entity\ItemInterface;
use Eccube\Service\PurchaseFlow\ItemValidateException;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Eccube\Service\PurchaseFlow\ValidatableItemProcessor;

class ValidatableEmptyProcessor extends ValidatableItemProcessor
{
    protected function validate(ItemInterface $item, PurchaseContext $context)
    {
        $error = false;
        if ($error) {
            throw new ItemValidateException('ValidatableEmptyProcessorのエラーです');
        }
    }

    protected function handle(ItemInterface $item, PurchaseContext $context)
    {
        $item->setQuantity(100);
    }
}
