<?php

namespace Hiberus\Curso\Plugin\Catalog;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Hiberus\Curso\Model\Author;


class ProductPlugin {

    /**
     * @var Author
     */
    protected $author;

    /**
     * @var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(Author $author, ScopeConfigInterface $scopeConfig){
        $this->scopeConfig = $scopeConfig;
        $this->author = $author;

    }

    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result){
        $nombreGeneral = $this->scopeConfig->getValue('hiberus_nombre/general/nombre_general', ScopeInterface::SCOPE_STORE); // Section id/group id/field id, valor de la configuracion por tienda
        $result = $result . ' ' . $this->author->GetAuthorName();
        return $result;
    }


    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return mixed
     */
    public function afterLoad(\Magento\Catalog\Model\Product $subject, $result){
        $descripcion = $this->scopeConfig->getValue('hiberus_nombre/general/descripcion_general', ScopeInterface::SCOPE_STORE);
        $numero = $this->scopeConfig->getValue('hiberus_nombre/general/numero', ScopeInterface::SCOPE_STORE);// Section id/group id/field id, valor de la configuracion por tienda
        $result->setDescription($descripcion . ' ' . $numero);

        return $result;
    }

}
