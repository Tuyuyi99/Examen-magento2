<?php

namespace Hiberus\Curso\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use \Magento\Framework\View\Result\PageFactory;
use \Magento\Framework\App\Action\Context;
use \Hiberus\Curso\Model\CursoFactory;

class Index implements HttpGetActionInterface {

    protected PageFactory $pageFactory;
    private CursoFactory $cursoFactory;

    public function __construct(Context $context, PageFactory $pageFactory, CursoFactory $cursoFactory){
        $this->pageFactory = $pageFactory;
        $this->cursoFactory = $cursoFactory;
    }

    public function execute(){
        $curso = $this->cursoFactory->create();
        $collection = $curso->getCollection();
        foreach($collection as $item){
            echo $item->getData();
        }

        return $this->pageFactory->create();
}
}
