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


    public function __construct(Context                  $context,
                                Registry                 $registry,
                                Notas                    $notas,
                                NotasRepositoryInterface $notasRepository,
                                NotasInterfaceFactory    $notasInterfaceFactory,
                                ResourceNotas            $notasResource,
                                array                    $data = []
    ) {
        $this->registry = $registry;
        $this->notas = $notas;
        $this->notasRepository = $notasRepository;
        $this->notasInterfaceFactory = $notasInterfaceFactory;
        $this->notasResource = $notasResource;
        parent::__construct($context, $data);
    }

    public function getAlumno() {

        $crearAlumno = $this->notasInterfaceFactory->create();

        return $crearAlumno->getCollection();

    }

    public function getAverageMarks(){
        $resultPage = $this->notasInterfaceFactory->create();
        $total = $resultPage->getCollection();
        $notas = [];
        foreach ($total as $item){
            $notas[] = $item->getMark();
        }
        $mediaNotas = array_sum($notas)/count($notas);
        return $mediaNotas;
    }


}
