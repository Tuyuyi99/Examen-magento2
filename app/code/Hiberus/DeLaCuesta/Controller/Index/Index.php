<?php

namespace Hiberus\DeLaCuesta\Controller\Index;

use Hiberus\DeLaCuesta\Api\NotasRepositoryInterface;
use Hiberus\DeLaCuesta\Api\Data\NotasInterfaceFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Hiberus\DeLaCuesta\Model\ResourceModel\Notas;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{

    protected \Magento\Framework\View\Result\PageFactory $pageFactory;
    protected NotasRepositoryInterface $notasRepository;
    protected NotasInterfaceFactory $notasInterfaceFactory;
    protected Notas $notasResource;

    public function __construct(Context $context,
                                PageFactory $pageFactory,
                                NotasRepositoryInterface
                                $notasRepository,
                                NotasInterfaceFactory
                                $notasInterfaceFactory,
                                Notas $notasResource) {
        $this->pageFactory = $pageFactory;
        $this->notasRepository = $notasRepository;
        $this->NotasInterfaceFactory = $notasInterfaceFactory;
        $this->notasResource = $notasResource;
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }

    /**
     * @throws \Exception
     */
    public function insertAlumno($firstname, $lastname) {

        $alumno = $this->NotasInterfaceFactory->create();
        $alumno->setFirstname($firstname);
        $alumno->setLastname($lastname);

        $this->notasResource->save($alumno);
        return $alumno->getIdExam();

    }
}
