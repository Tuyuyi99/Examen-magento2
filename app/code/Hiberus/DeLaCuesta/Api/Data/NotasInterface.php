<?php

namespace Hiberus\DeLaCuesta\Api\Data;
use Magento\Framework\Api\ExtensibleDataInterface;

interface NotasInterface extends ExtensibleDataInterface {

    const TABLE_NAME = 'hiberus_exam';

    const COLUMN_ID = 'id_exam';

    /**
     * @return int
     */
    public function getIdExam();

    /**
     * @param int $idExam
     * @return $this
     */
    public function setIdExam($idExam);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstName($firstname);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param string $lastname
     * @return $this
     */
    public function setLastName($lastname);

    /**
     * @return float
     */
    public function getMark();

    /**
     * @param float $mark
     * @return $this
     */
    public function setMark($mark);

}
