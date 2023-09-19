<?php

namespace Models\Managers;

use Core\Manager;
use Core\DAO;

class BoutiqueManager extends Manager
{

    protected $className = "Models\Entities\Articles";
    protected $tableName = "articles";

    public function __construct()
    {
        parent::connect();
    }

    public function deleteAll()
    {
        $sql = "Delete 
                FROM " . $this->tableName . " a
                ";

        return $this->getMultipleResults(
            DAO::select($sql),
            $this->className
        );
    }
    public function deleteById($id)
    {
        $sql = "Delete 
                FROM " . $this->tableName . " a
                WHERE a.id_articles = :id
                ";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }
}
