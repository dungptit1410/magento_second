<?php 
namespace AHT\Question\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('AHT_Question::question');
        $resultPage->addBreadcrumb(__('Question'), __('Question'));
        $resultPage->addBreadcrumb(__('Manage Question Customer'), __('Manage Question Customer'));
        $resultPage->getConfig()->getTitle()->prepend(__('List Question'));
        return $resultPage;
    }

    /* protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('AHT_Portfolio::index');
    } */
}