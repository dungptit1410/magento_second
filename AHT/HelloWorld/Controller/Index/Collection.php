<?php
namespace AHT\HelloWorld\Controller\Index;
use Zend_Debug;

class Collection extends \Magento\Framework\App\Action\Action {
    public function execute() {
        // $productCollection = $this->_objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection')->setPageSize(10,1);
        // $output = '';
        // foreach ($productCollection as $product) {
        //     $output .= "<pre>".var_dump($product->debug())."</pre>";
        // }
        // $this->getResponse()->setBody($output);
            
            $productCollection = $this->_objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect([
                '*'
            ])
            //->setPageSize(10,1);
            ->addAttributeToFilter('name', 'Joust Duffle Bag');
        $output = '';
        echo "<pre>";
        foreach ($productCollection as $product) {
            $output .= var_dump($product->debug());
        }
        $this->getResponse()->setBody($output);
        echo "</pre>";

    }
}