<?php

namespace AppBundle\LateStaticBinding;


/**
 * Class OtherUser
 * @package AppBundle\LateStaticBinding
 */
class OtherUser extends DomainObject
{
    /**
     * @return string
     */
    public static function getGroup()
    {
        return 'other group';
    }
}