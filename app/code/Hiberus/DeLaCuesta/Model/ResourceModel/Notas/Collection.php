<?php

namespace Hiberus\DeLaCuesta\Model\ResourceModel\Notas;
use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends AbstractCollection
{

    /**
     * Define resource model     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Hiberus\DeLaCuesta\Model\Notas', 'Hiberus\DeLaCuesta\Model\ResourceModel\Notas');
    }

}

