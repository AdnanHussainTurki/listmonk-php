<?php

namespace AdnanHussainTurki\ListMonk\Controllers;

use AdnanHussainTurki\ListMonk\ListMonk;
use AdnanHussainTurki\ListMonk\Models\MonkList;

class ListsController {
    protected $listMonk;

    function __construct(ListMonk $listMonk)
    {
        $this->listMonk = $listMonk;
    }

    function getAll($page=1, $perPage=100) : array
    {
        $response = $this->listMonk->http('/api/lists' . '?page=' . $page . '&per_page=' . $perPage);
        $lists = json_decode($response)->data->results;
        $listObjects = [];
        foreach ($lists as $key => $list) {
            $listObjects[$key] = new MonkList($list);  
        }
        return $listObjects;
    }

    function get($id) {
        $response = $this->listMonk->http('/api/lists/' . $id);
        return new MonkList(json_decode($response)->data);
    }

    function create(MonkList $list) {
        $response = $this->listMonk->http('/api/lists', 'post', [
            'name' => $list->getName(),
            'type' => $list->getType(),
            'optin' => $list->getOptin(),
            'tags' => $list->getTags()
        ]);
        return new MonkList(json_decode($response)->data);
    }

    function update(MonkList $list) {
        if ($list->getId() == null) throw new \Exception("List id is required");
        $response = $this->listMonk->http('/api/lists/' . $list->getId(), 'put', [
            'list_id' => $list->getId(),
            'name' => $list->getName(),
            'type' => $list->getType(),
            'optin' => $list->getOptin(),
            'tags' => $list->getTags()
        ]);
        return new MonkList(json_decode($response)->data);
    }

    function delete($id) {
        $stored = $this->get($id);
        if ($stored == null) throw new \Exception("List not found");
        $response = $this->listMonk->http('/api/lists/' . $id, 'delete');
        try {
            $this->get($id);
            
        } catch (\Throwable $th) {
            return $stored;        
        }
        throw new \Exception("List not deleted");       
    }

}