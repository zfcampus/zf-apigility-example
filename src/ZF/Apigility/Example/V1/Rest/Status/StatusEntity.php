<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2013 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Apigility\Example\V1\Rest\Status;

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
