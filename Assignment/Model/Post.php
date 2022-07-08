<?php

namespace Imran\Assignment\Model;

use Magento\Framework\Model\AbstractModel;
use Imran\Assignment\Model\ResourceModel\Post as ResourceModel;

class Post extends AbstractModel
{
    /**
     * _construct
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }
}
