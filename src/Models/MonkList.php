<?php

namespace AdnanHussainTurki\ListMonk\Models;

class MonkList {
    private $id;
    private $created_at;
    private $updated_at;
    private $uuid;
    private $name;
    private $type;
    private $optin;
    private $tags = [];
    private $subscriber_count;
    private $allowed_types = ["public", "private"];
    private $allowed_options = ["single", "double"];

    public function __construct(object $list = null) {
        if ($list == null) return;
        $this->id = $list->id;
        $this->created_at = $list->created_at;
        $this->updated_at = $list->updated_at;
        $this->uuid = $list->uuid;
        $this->name = $list->name;
        $this->type = $list->type;
        $this->optin = $list->optin;
        $this->tags = $list->tags;
        $this->subscriber_count = $list->subscriber_count;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($createdAt) {
        $this->created_at = $createdAt;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updated_at = $updatedAt;
    }

    public function getUuid() {
        return $this->uuid;
    }

    public function setUuid($uuid) {
        $this->uuid = $uuid;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        if (!in_array($type, $this->allowed_types)) {
            throw new \Exception("Invalid list type. Allowed types are: " . implode(", ", $this->allowed_types));
        }
        $this->type = $type;
    }

    public function getOptin() {
        return $this->optin;
    }

    public function setOptin($optin) {
        if (!in_array($optin, $this->allowed_options)) {
            throw new \Exception("Invalid optin type. Allowed types are: " . implode(", ", $this->allowed_options));
        }
        $this->optin = $optin;
    }

    public function getTags() {
        return $this->tags;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }

    public function getSubscriberCount() {
        return $this->subscriber_count;
    }

    public function setSubscriberCount($subscriber_count) {
        $this->subscriber_count = $subscriber_count;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'type' => $this->type,
            'optin' => $this->optin,
            'tags' => $this->tags,
            'subscriber_count' => $this->subscriber_count
        ];
    }

}

    
?>
