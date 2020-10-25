<?php
namespace AHT\Question\Controller\Index;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Controller\ResultFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    // / @var \Magento\Framework\View\Result\PageFactory /
    protected $resultPageFactory;
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;
    protected $_questionFactory;
    protected $_sessionManager;
    protected $_questionResourceModel;
    protected $_messageManager;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory,
        \Magento\Framework\Image\AdapterFactory $adapterFactory,
        \Magento\Framework\Filesystem $filesystem,
        \AHT\Question\Model\QuestionFactory $questionFactory,
        \Magento\Framework\Session\SessionManagerInterface $sessionManager,
        \AHT\Question\Model\ResourceModel\Question $questionResoureModel,
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        $this->resultPageFactory = $resultPageFactory;
        $this->_questionFactory = $questionFactory;
        $this->_sessionManager = $sessionManager;
        $this->_questionResourceModel = $questionResoureModel;
        $this->_messageManager = $messageManager;
        parent::__construct($context);
    }
    // /
    //  Index action
    
    // @return $this
    // /
    public function execute()
    {
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);  
            try{
                $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'image']);
                $uploaderFactory->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $imageAdapter = $this->adapterFactory->create();
                $uploaderFactory->addValidateCallback('custom_image_upload',
                    $imageAdapter,'validateUploadFile');
                $uploaderFactory->setAllowRenameFiles(true);
                $uploaderFactory->setFilesDispersion(true);
                $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $destinationPath = $mediaDirectory->getAbsolutePath('custom_image');
                $result = $uploaderFactory->save($destinationPath);
                if (!$result) {
                    throw new LocalizedException(
                        __('File cannot be saved to path: $1', $destinationPath)
                    );
                }
                /* you need yo save image 
                    $result['file'] at datbaseQQ 
                */
                //$imagepath = $result['file'];
            //
            } catch (\Exception $e) {
            }

            $imagepath = (isset($result)) ? $result['file'] : '';
 
            $data = $this->getRequest()->getPost();
            $id =  $this->getRequest()->getParam('id'); 

            $questionModel = $this->_questionFactory->create();
            $questionData = [
                                'name' => $data['name'],
                                'email' => $data['email'],
                                'question' => $data['question'],
                                'image' => $imagepath,
                                'product_id' => $id
                            ];
       /*      $questionModel->setData($questionData);
            $this->_questionResourceModel->save($questionModel); */
            try{
                $questionModel->setData($questionData);
                $this->_questionResourceModel->save($questionModel);
                $this->_messageManager->addSuccess(__("Submit question Success"));
            }catch (\Exception $e) {
                $this->_messageManager->addError($e->getMessage());            
            }
            //$this->messageManager->addSuccess(__('Submit question success'));
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;
    }
}