<?php

class Core_Model_Resource_Collection_Abstract
{
    protected $_resource = null;
    protected $_select = [];
    protected $_data = [];
    protected $_model = null;
    public function setResource($resource)
    {
        $this->_resource = $resource;
        return $this;
    }
    public function setModelClass($model)
    {
        $this->_model = $model;
        return $this;
    }
    public function select()
    {
        $this->_select['FROM'] = $this->_resource->getTableName();
        return $this;
    }
    public function addOrderBy($field, $direction = 'ASC')
    {
        $this->_select['ORDER BY'][] = array(
            'field' => $field,
            'direction' => strtoupper($direction)
        );
        return $this;
    }
    public function addFieldToFilter($field, $value)
    {
        $this->_select['WHERE'][$field][] = $value;
        return $this;
    }
    public function load()
    {
        $sql = "SELECT * FROM {$this->_select['FROM']}";
        if (isset ($this->_select["WHERE"])) {
            $whereCondition = [];
            foreach ($this->_select["WHERE"] as $column => $value) {
                foreach ($value as $_value) {
                    if (!is_array($_value)) {
                        $_value = array('eq' => $_value);
                    }
                    foreach ($_value as $_condition => $_v) {
                        if (is_array($_v)) {
                            $_v = array_map(function ($v) {
                                return "'{$v}'";
                            }, $_v);
                            $_v = implode(',', $_v);
                        }
                        switch ($_condition) {
                            case 'eq':
                                $whereCondition[] = "{$column} = '{$_v}'";
                                break;
                            case 'in':
                                $whereCondition[] = "{$column} IN ({$_v})";
                                break;
                            case 'like':
                                $whereCondition[] = "{$column} LIKE '{$_v}'";
                                break;
                        }
                    }
                }
            }
            $sql .= " WHERE " . implode(" AND ", $whereCondition);
            // echo $sql;
            // die();
        }
        if(isset($this->_select['ORDER BY'])){
            $orderBy = [];
            foreach ($this->_select['ORDER BY'] as $order) {
                $orderBy[] = "{$order['field']} {$order['direction']}";
            }
            $sql .= " ORDER BY " . implode(', ', $orderBy);
        }
        $result = $this->_resource->getAdapter()->fetchAll($sql);
        foreach ($result as $row) {
            $modelObj = new $this->_model;
            $this->_data[] = $modelObj->setData($row);
        }
    }
    public function getData()
    {
        $this->load();
        return $this->_data;
    }
    public function getFirstItem()
    {
        $this->load();
        return (isset ($this->_data[0])) ? $this->_data[0] : null;
    }
}