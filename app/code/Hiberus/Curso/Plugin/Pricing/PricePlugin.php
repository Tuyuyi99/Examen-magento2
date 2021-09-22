<?php

namespace Hiberus\Curso\Plugin\Pricing;

class PricePlugin
{
    /**
     * @param \Magento\Catalog\Model\ProductRender $subject
     * @param $result
     * @return string
     */
    public function afterFormatCurrency(\Magento\Framework\Pricing\Render\Amount $subject, $result){
        $result = $result . "/por unidad";
        return $result;
    }
}
