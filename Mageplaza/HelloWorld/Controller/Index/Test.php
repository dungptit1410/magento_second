<?php

namespace Mageplaza\HelloWorld\Controller\Index;

use \Magento\Framework\App\Action\Context as Content;
use \Magento\Framework\View\Result\PageFactory as PageFactory;

class Test extends \Magento\Framework\App\Action\Action
{
    
    protected $_pageFactory;

    public function __construct(Content $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        echo "Hello World 123";
        exit;
    }
   
}
