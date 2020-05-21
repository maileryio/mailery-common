<?php

namespace Mailery\Common\Mapper;

use Mailery\Cycle\Mapper\ChainItemList;
use Mailery\Cycle\Mapper\ChainItem\Timestamped;
use Mailery\Cycle\Mapper\ChainedMapper;

/**
 * @Cycle\Annotated\Annotation\Table(
 *      columns = {
 *          "created_at": @Cycle\Annotated\Annotation\Column(type = "datetime"),
 *          "updated_at": @Cycle\Annotated\Annotation\Column(type = "datetime")
 *      }
 * )
 */
class BaseMapper extends ChainedMapper
{
    /**
     * {@inheritdoc}
     */
    protected function getChainItemList(): ChainItemList
    {
        $itemList = parent::getChainItemList();
        $itemList->add(new Timestamped('created_at', 'updated_at'));

        return $itemList;
    }
}