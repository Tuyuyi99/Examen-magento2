<?php

namespace Hiberus\DeLaCuesta\Block;

use Hiberus\DeLaCuesta\Api\NotasRepositoryInterface;
use Hiberus\DeLaCuesta\Model\ResourceModel\Notas as ResourceNotas;
use Hiberus\DeLaCuesta\Model\Notas;
use Hiberus\DeLaCuesta\Api\Data\NotasInterfaceFactory;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\Registry;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

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
                                ScopeConfigInterface     $scopeConfig,
                                array                    $data = []
    ) {
        $this->registry = $registry;
        $this->notas = $notas;
        $this->notasRepository = $notasRepository;
        $this->notasInterfaceFactory = $notasInterfaceFactory;
        $this->notasResource = $notasResource;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getAlumno() {
        $crearAlumno = $this->notasInterfaceFactory->create();
        return $crearAlumno->getCollection();

    }

    public function getElementos() {
        $elementos = $this->scopeConfig->getValue( 'hiberus_elementos/general/elementos', ScopeInterface::SCOPE_STORE);
        return $elementos;
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

    public function getNota() {
        $nota = $this->scopeConfig->getValue( 'hiberus_elementos/general/aprobados', ScopeInterface::SCOPE_STORE);
        if(is_null($nota)){
            $nota = 5;
        }
        return $nota;
    }

    public function getMaxMarks(){
        $total = $this->getAlumno();
        $marks = [];
        $maxMarks = [];
        foreach ($total as $item){
            $marks[] = $item->getMark();
        }
        $max = max($marks);
        foreach ($marks as $mark){
            $nota = $mark;
            if($nota <= $max && count($maxMarks) < 3){
                $notaMax = $nota;
                $maxMarks[] = $notaMax;
            }
        }
        return $maxMarks;
    }

    public function getMaxMark() {
        $alumnos = $this->notasInterfaceFactory->create()->getCollection()->getData();
        $maxMark = 0;
        foreach ($alumnos as $alumno) {
            if ($alumno['mark'] > $maxMark) {
                $maxMark = $alumno['mark'];
            }
        }
        return $maxMark;
    }
}
