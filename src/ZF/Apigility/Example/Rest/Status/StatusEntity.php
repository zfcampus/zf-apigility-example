<?php

namespace ZF\Apigility\Example\Rest\Status;

class StatusEntity
{
    protected $id;
    protected $text;
    protected $user;

    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @todo Hydration of user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
}
