<?php

namespace Hiberus\DeLaCuesta\Model\ResourceModel;

use Hiberus\DeLaCuesta\Api\Data\NotasInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use \Magento\Framework\Model\ResourceModel\Db\Context;
use \Magento\Framework\EntityManager\MetadataPool;
use \Magento\Framework\EntityManager\EntityManager;

class  Notas extends AbstractDb
{

    /**
     * @var MetadataPool
     */
    private MetadataPool $metadataPool;
    /**
     * @var EntityManager
     */
    private EntityManager $entityManager;

    /**
     * @param Context $context
     * @param MetadataPool $metadataPool
     * @param EntityManager $entityManager
     * @param null $connectionName
     */
    public function __construct(Context $context, MetadataPool $metadataPool, EntityManager $entityManager, $connectionName = null) {
        $this->metadataPool = $metadataPool;
        $this->entityManager = $entityManager;

        parent::__construct($context, $connectionName);
    }

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(NotasInterface::TABLE_NAME, NotasInterface::COLUMN_ID);
    }

    /**
     * @param AbstractModel $object
     * @return $this|AbstractDb
     * @throws \Exception
     */
    public function save(AbstractModel $object) {
        $this->entityManager->save($object);

        return $this;
    }

    /**
     * @param AbstractModel $object
     * @param mixed $value
     * @param null $field
     * @return AbstractDb|mixed
     */
    public function load(AbstractModel $object, $value, $field = null) {
        return $this->entityManager->load($object, $value);
    }

    /**
     * @param AbstractModel $object
     * @return void
     * @throws \Exception
     */
    public function delete(AbstractModel $object) {
        $this->entityManager->delete($object);
    }

}
