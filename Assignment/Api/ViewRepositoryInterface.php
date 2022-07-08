<?php
namespace Imran\Assignment\Api;

/**
 * Interface ViewRepositoryInterface
 */
interface ViewRepositoryInterface
{
    /**
     * GetDataById
     *
     * @param $id
     */
    public function getDataById($id);

    /**
     * Load
     *
     * @param $value
     * @param null $field
     */
    public function load($value, $field = null);

    /**
     * Create
     */
    public function create();


    /**
     * GetCollection
     */
    public function getCollection();
}
