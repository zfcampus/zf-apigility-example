<?php

namespace ZF\ApiFirstExample;

use Zend\Validator\Uri as UriValidator;

class User
{
    protected $id;
    protected $name;
    protected $url;

    protected static $uriValidator;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUrl()
    {
        return $this->uurl;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setUrl($url)
    {
        $validator = static::getUriValidator();
        if (!$validator->isValid($url)) {
            throw new InvalidArgumentException(sprintf(
                'URI provided for user is invalid: %s',
                implode("\n", $validator->getMessages())
            ));
        }
        $this->url = $url;
        return $this;
    }

    protected static function getUriValidator()
    {
        if (static::$uriValidator instanceof UriValidator) {
            return static::$uriValidator;
        }
        static::$uriValidator = new UriValidator(array('allowRelative' => false));
        return static::$uriValidator;
    }
}
