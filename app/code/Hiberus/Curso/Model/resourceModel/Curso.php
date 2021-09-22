<?php

namespace Hiberus\Curso\Model\resourceModel;

use Hiberus\Curso\Api\Data\CursoInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use \Magento\Framework\Model\ResourceModel\Db\Context;
use \Magento\Framework\EntityManager\MetadataPool;
use \Magento\Framework\EntityManager\EntityManager;

class Curso extends AbstractDb {

    /**
     * @param Context $context
     * @param MetadataPool $metadataPool
     * @param EntityManager $entityManager
     * @param null $connectionName
     */
    public function __construct(Context $context, MetadataPool $metadataPool, EntityManager $entityManager, $connectionName = NULL){
        $this->metadataPool = $metadataPool;
        $this->entityManager = $entityManager;

        parent::__construct($context, $connectionName);

    }

    /**
     * @InheritDoc
     */
    protected function _construct()
    {
        $this->_init(CursoInterface::TABLE_NAME, CursoInterface::COLUMN_ID);
    }

    /**
     * @param AbstractModel $object
     * @return $this|AbstractDb
     * @throws \Exception
     */
    public function save(AbstractModel $object){
        $this->entityManager->save($object);

        return $this;
    }

    /**
     * @param AbstractModel $object
     * @param mixed $value
     * @param null $field
     * @return AbstractDb|mixed
     */
    public function load(AbstractModel $object, $value, $field = NULL){
       return   $this->entityManager->load($object, $value);
    }

    /**
     * @param AbstractModel $object
     * @return AbstractDb|void
     * @throws \Exception
     */
    public function delete(AbstractModel $object){
        $this->entityManager->delete($object);
    }
}
