<?php
namespace AHT\HelloWorld\Block;
use Magento\Framework\View\Element\Template;
class Newproducts extends Template
{
    private $_productCollectionFactory;
    public function __construct(
        Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_productCollectionFactory = $productCollectionFactory;
    }
    public function getProducts() {
        // $collection = $this->_productCollectionFactory->create();
        // $collection->addAttributeToSelect('*')
        //     ->setOrder('created_at')
        //     ->setPageSize(5);
        // return $collection;
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');

        $connection = $resource->getConnection();

        $tableName = $resource->getTableName('AHT_helloworld_subscription');

        

        $sql = "SELECT * FROM " . $tableName;

        $result = $connection->fetchAll($sql);

        return $result;
    }
}