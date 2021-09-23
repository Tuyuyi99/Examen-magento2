<?php

namespace Hiberus\DeLaCuesta\Model;

use Hiberus\DeLaCuesta\Api\Data\NotasInterface;
use Magento\Framework\Model\AbstractModel;


class Notas extends AbstractModel implements NotasInterface
{

    protected function _construct() {
        $this->_init(\Hiberus\DeLaCuesta\Model\ResourceModel\Notas::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdExam() {
        return $this->getData('id_exam');
    }

    /**
     * @inheritDoc
     */
    public function setIdExam($idExam) {
        return $this->setData('id_exam', $idExam);
    }

    /**
     * @inheritDoc
     */
    public function getFirstName()
    {
        return $this->getData('firstname');
    }

    /**
     * @inheritDoc
     */
    public function setFirstName($firstname)
    {
        return $this->setData('firstname', $firstname);
    }

    /**
     * @inheritDoc
     */
    public function getLastName()
    {
        return $this->getData('lastname');
    }

    /**
     * @inheritDoc
     */
    public function setLastName($lastname)
    {
        return $this->setData('lastname', $lastname);
    }

    /**
     * @inheritDoc
     */
    public function getMark()
    {
        return $this->getData('mark');
    }

    /**
     * @inheritDoc
     */
    public function setMark($mark)
    {
        return $this->setData('mark', $mark);
    }
}
