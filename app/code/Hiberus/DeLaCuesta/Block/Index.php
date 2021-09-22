<?php

namespace Hiberus\DeLaCuesta\Block;

use Hiberus\DeLaCuesta\Api\NotasRepositoryInterface;
use Hiberus\DeLaCuesta\Model\ResourceModel\Notas as ResourceNotas;
use Hiberus\DeLaCuesta\Model\Notas;
use Hiberus\DeLaCuesta\Api\Data\NotasInterfaceFactory;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\Registry;

class Index extends \Magento\Framework\View\Element\Template
{

    protected Registry $registry;
    protected Notas $notas;
    protected NotasRepositoryInterface $notasRepository;
    protected NotasInterfaceFactory $notasInterfaceFactory;
    protected ResourceNotas $notasResource;

    public function __construct(Context $context, Registry $registry,
                                Notas $notas,
                                NotasRepositoryInterface $notasRepository,
                                NotasInterfaceFactory $notasInterfaceFactory,
                                ResourceNotas $notasResource,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->notas = $notas;
        $this->notasRepository = $notasRepository;
        $this->notasInterfaceFactory = $notasInterfaceFactory;
        $this->notasResource = $notasResource;
        parent::__construct($context, $data);
    }

    public function getAlumno() {

        $crearAlumno = $this->insertAlumno('pablo', 'de la cuesta');

        return $this->notasRepository->getById($crearAlumno);

    }

    public function insertAlumno($firstname, $lastname) {

        $alumno = $this->notasInterfaceFactory->create();
        $alumno->setFirstName($firstname);
        $alumno->setLastname($lastname);

        $this->notasResource->save($alumno);
        return $alumno->getIdExam();

    }

}
