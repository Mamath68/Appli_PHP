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

    public function findTotalGeneral()
    {
        $sql = "SELECT SUM(a.total)
                FROM " . $this->tableName . " a
                ";

        return $this->getOneOrNullResult(
            DAO::select($sql,),
            $this->className
        );
    }
}
