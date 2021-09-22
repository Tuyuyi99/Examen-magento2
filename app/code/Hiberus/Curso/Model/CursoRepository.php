<?php

namespace Hiberus\Curso\Model;

use Hiberus\Curso\Api\CursoRepositoryInterface;
use Hiberus\Curso\Api\Data\CursoInterface;
use Magento\Framework\Exception\CouldNotSaveException;

class CursoRepository implements CursoRepositoryInterface
{

    protected ResourceModel\Curso $resourceCurso;
    protected \Hiberus\Curso\Api\Data\CursoInterfaceFactory $cursoInterfaceFactory;

    /**
     * @param ResourceModel\Curso $resourceCurso
     * @param \Hiberus\Curso\Api\Data\CursoInterfaceFactory $cursoInterfaceFactory
     */
    public function __construct(
        \Hiberus\Curso\Model\ResourceModel\Curso $resourceCurso,
        \Hiberus\Curso\Api\Data\CursoInterfaceFactory $cursoInterfaceFactory
    ) {
        $this->resourceCurso = $resourceCurso;
        $this->cursoInterfaceFactory = $cursoInterfaceFactory;
    }

    /**
     * @param CursoInterface $curso
     * @return CursoInterface
     * @throws CouldNotSaveException
     */
    public function save(
        CursoInterface $curso
    ) {

        try {
            $this->resourceCurso->save($curso);
        } catch(\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $curso;

    }

    /**
     * @param $entityId
     * @return mixed
     */
    public function getById($entityId)
    {
        try {
            $curso = $this->cursoInterfaceFactory->create();
            $curso->setEntityId($entityId);
            $this->resourceCurso->load($curso, $entityId);
        } catch (\Exception $e) {
            $curso = $this->cursoInterfaceFactory->create();
        }

        return $curso;
    }

    /**
     * @param \Hiberus\Curso\Api\Data\CursoInterface $curso
     * @return bool
     */
    public function delete(\Hiberus\Curso\Api\Data\CursoInterface $curso)
    {
        try {
            $this->resourceCurso->delete($curso);
        } catch (\Exception $e) {

            return false;
        }

        return true;
    }

    /**
     * @param int $entityId
     * @return bool
     */
    public function deleteById($entityId)
    {
        return $this->delete($this->getById($entityId));
    }

}
