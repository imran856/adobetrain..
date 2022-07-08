<?php

namespace Imran\Assignment\Controller\Index;

use Imran\Assignment\Api\ViewRepositoryInterface;
use Imran\Assignment\Model\ResourceModel\Post\CollectionFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;

class Index extends Action
{
    /**
     * @var JsonFactory
     */
    private JsonFactory $resultJsonFactory;

    /**
     * @var CollectionFactory $employeeFactory
     */
    public CollectionFactory $collectionFactory;

    /**
     * @var ViewRepositoryInterface
     */
    public ViewRepositoryInterface $viewRepository;
    /**
     * @var ResourceConnection $_resource;
     */
    protected ResourceConnection $_resource;

    /**
     * Constructor
     *
     * @param JsonFactory $resultJsonFactory
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param ViewRepositoryInterface $viewRepository
     */
    public function __construct(
        JsonFactory $resultJsonFactory,
        Context $context,
        CollectionFactory $collectionFactory,
        ViewRepositoryInterface $viewRepository,
        ResourceConnection $resource
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->collectionFactory = $collectionFactory;
        $this->viewRepository = $viewRepository;
        $this->_resource = $resource;
    }

    /**
     * Execute
     *
     * @return Json
     */
    public function execute(): Json
    {
        $connection = $this->_resource->getConnection();
        $tableName = $this->_resource->getTableName('imran');
        $query = $connection->select()
            ->from($tableName)
            ->where('id IN (?)', [1,2]);
        $results = $connection->fetchAll($query);
        $resultJson = $this->resultJsonFactory->create();
        $collection = $this->viewRepository->getDataById(1);
        return $resultJson->setData($collection);
    }
}
