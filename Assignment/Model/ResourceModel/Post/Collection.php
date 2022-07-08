<?php

namespace Imran\Assignment\Model\ResourceModel\Post;

use Imran\Assignment\Model\Post as Model;
use Imran\Assignment\Model\ResourceModel\Post as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
