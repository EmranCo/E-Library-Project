<?php

abstract class ORDERBY
{
    public const ASC = "ASC";
    public const DESC = "DESC";
}

class SelectQuery
{
    private $type;
    private $fields;
    private $tables;
    private $where;
    private $groupBy;
    private $having;
    private $orderBy;
    private $logic;
    private $count;
    private $sortType;
    private $innerJoin;
    private $leftJoin;
    private $rightJoin;


    public function __construct()
    {
        $this->type = "";
        $this->fields = [];
        $this->tables = [];
        $this->where = [];
        $this->groupBy = [];
        $this->having = [];
        $this->orderBy = [];
        $this->count = [];
        $this->innerJoin = [];
        $this->leftJoin = [];
        $this->rightJoin = [];
        $this->logic = " AND ";
        $this->sortType = ORDERBY::ASC;
    }

    public function settype($type)
    {
        if (strtoupper($type) === "ALL" || strtoupper($type) === "DISTINCT")
            $this->type = strtoupper($type);
        return $this;
    }

    public function setSortType($type)
    {
        if (strtoupper($type) === ORDERBY::ASC || strtoupper($type) === ORDERBY::DESC)
            $this->sortType = strtoupper($type);
        return $this;
    }

    public function setLogic($type)
    {
        if (strtoupper($type) === "AND" || strtoupper($type) === "OR")
            $this->logic = strtoupper(" " . $type . " ");
        return $this;
    }

    public function setJoin($type, $table, $fields)
    {
        if (in_array(strtoupper($type), ["INNER", "LEFT", "RIGHT"])) {
            switch (strtoupper($type)) {
                case "INNER":
                    array_push($this->innerJoin,[$table => $fields]);
                    break;

                case "LEFT":
                    array_push($this->leftJoin,[$table => $fields]);
                    break;

                case "RIGHT":
                    array_push($this->rightJoin,[$table => $fields]);
                    break;
            }
        }
    }

    public function __set($name, $value)
    {
        if (!in_array($name,["type","logic","innerJoin","leftJoin","rightJoin"])) {
            if (is_string($value))
                array_push($this->$name, $value);
            else
                array_merge($this->$name, $value);
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
