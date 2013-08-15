<?php

namespace ZF\ApiFirstExample;

use Zend\Db\TableGateway\TableGatewayInterface as TableGateway;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Math\Rand;
use Zend\Paginator\Adapter\DbTableGateway as TableGatewayPaginator;
use ZF\Rest\AbstractResourceListener;

class StatusListener extends AbstractResourceListener
{
    protected $statusTable;

    public function __construct(TableGateway $statusTable)
    {
        $this->statusTable = $statusTable;
    }

    public function create($data)
    {
        $data = (array) $data;

        $id = Rand::getString(32, 'abcdef0123456789');
        $data['id'] = $id;

        $this->statusTable->insert($data);
        return $this->fetch($id);
    }

    public function update($id, $data)
    {
        $data = (array) $data;

        $this->statusTable->update($data, array('id' => $id));
        return $this->fetch($id);
    }

    public function patch($id, $data)
    {
        return $this->update($id, $data);
    }

    public function delete($id)
    {
        $status = $this->statusTable->delete(array('id' => $id));
        return ($status > 0);
    }

    public function fetch($id)
    {
        $resultSet = $this->statusTable->select(array('id' => $id));
        if (0 === $resultSet->count()) {
            throw new \Exception('Status not found', 404);
        }
        return $resultSet->current();
    }

    public function fetchAll($data = array())
    {
        $adapter = new TableGatewayPaginator($this->statusTable);
        return new Statuses($adapter);
    }
}
