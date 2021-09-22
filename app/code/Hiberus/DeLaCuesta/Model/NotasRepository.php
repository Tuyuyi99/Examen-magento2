<?php

namespace Hiberus\DeLaCuesta\Model;

use Hiberus\DeLaCuesta\Api\NotasRepositoryInterface;
use Hiberus\DeLaCuesta\Api\Data\NotasInterface;
use Magento\Framework\Exception\CouldNotSaveException;

class NotasRepository implements NotasRepositoryInterface
{

    protected ResourceModel\Notas $resourceNotas;
    protected NotasRepositoryInterface $notasRepository;

    /**
     * @param ResourceModel\Notas $resourceNotas
     * @param NotasRepositoryInterface $notasRepository
     */
    public function __construct(
        \Hiberus\DeLaCuesta\Model\ResourceModel\Notas $resourceNotas,
        \Hiberus\DeLaCuesta\Api\Data\NotasInterfaceFactory $notasInterfaceFactory
    ) {
        $this->resourceNotas = $resourceNotas;
        $this->notasInterfaceFactory = $notasInterfaceFactory;
    }

    /**
     * @param NotasInterface $notas
     * @return NotasInterface
     * @throws CouldNotSaveException
     */
    public function save(NotasInterface $notas) {

        try {
            $this->resourceNotas->save($notas);
        } catch(\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $notas;

    }

    /**
     * @param $examId
     * @return mixed
     */
    public function getById($examId)
    {
        try {
            $notas = $this->notasInterfaceFactory->create();
            $notas->setIdExam($examId);
            $this->resourceNotas->load($notas, $examId);
        } catch (\Exception $e) {
            $notas = $this->notasInterfaceFactory->create();
        }

        return $notas;
    }

    /**
     * @param NotasInterface $notas
     * @return bool
     */
    public function delete(NotasInterface $notas)
    {
        try {
            $this->resourceNotas->delete($notas);
        } catch (\Exception $e) {

            return false;
        }

        return true;
    }

    /**
     * @param int $examId
     * @return bool
     */
    public function deleteById($examId)
    {
        return $this->delete($this->getById($examId));
    }

}
