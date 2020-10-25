<?php
namespace AHT\HelloWorld\Controller\Index;
class Event extends \Magento\Framework\App\Action\Action {
    // / @var \Magento\Framework\View\Result\PageFactory /
    protected $resultPageFactory;
    public function __construct(
   	 \Magento\Framework\App\Action\Context $context,
   	 \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
   	 $this->resultPageFactory = $resultPageFactory;
   	 parent::__construct($context);
    }
    public function execute() {
        // $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza'));
		// $this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['mp_text' => $textDisplay]);
		// echo $textDisplay->getText();
        // exit;
        // //echo '123';
        $resultPage = $this->resultPageFactory->create();
            $parameters = [
            'product' => $this->_objectManager->create('Magento\Catalog\Model\Product')->load(50),
            'category' => $this->_objectManager->create('Magento\Catalog\Model\Product')->load(10)
            ];
            $this->_eventManager->dispatch('helloworld_register_visit', $parameters);
            return $resultPage;
    }
}
