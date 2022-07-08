<?php
namespace Imran\Assignment\Model\Data;

use Imran\Assignment\Api\ViewRepositoryInterface;
use Imran\Assignment\Model\PostFactory;
use Imran\Assignment\Model\ResourceModel\Post as ResourceModel;
use Imran\Assignment\Model\ResourceModel\Post\CollectionFactory;

class ViewRepository implements ViewRepositoryInterface
{
    /**
     * @var PostFactory
     */
    protected PostFactory $postFactory;

    /**
     * @var ResourceModel
     */
    protected ResourceModel $resourceModel;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * Constructor
     * @param CollectionFactory $collectionFactory
     * @param PostFactory $postFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        PostFactory $postFactory,
        ResourceModel $resourceModel
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->postFactory = $postFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * GetDataById
     *
     * @param $id
     * @return \Imran\Assignment\Model\Post
     */
    public function getDataById($id): \Imran\Assignment\Model\Post
    {
        return $this->load($id);
    }

    /**
     * Load
     *
     * @param $value
     * @param null $field
     * @return \Imran\Assignment\Model\Post
     */
    public function load($value, $field = null): \Imran\Assignment\Model\Post
    {
        $model = $this->create();
        $this->resourceModel->load($model, $value, $field);
        return $model;
    }

    /**
     * Create
     */
    public function create(): \Imran\Assignment\Model\Post
    {
        return $this->postFactory->create();
    }

    /**
     * GetCollection
     */
    public function getCollection(): ?array
    {
        $post = $this->collectionFactory->create();
        return $post->getData();
    }
}
