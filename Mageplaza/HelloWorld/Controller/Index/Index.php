<?php
namespace Mageplaza\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	//protected $_pageFactory;
	protected $title;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
	   $this->setTitle('Welcome');
		echo $this->getTitle();
	}

	public function setTitle($title)
	{
		return $this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}
}