<?php

namespace AppBundle\Services;

/**
 * Class ReflectionService
 * @package AppBundle\Services
 */
class ReflectionService
{
    /**
     * @param \ReflectionClass $class
     * @return string
     */
    public function classData(\ReflectionClass $class) : string
    {
        $details = '';
        $name = $class->getName();

        if($class->isUserDefined()) {
            $details .= " $name - определен пользователем \n";
        }

        if($class->isInternal()) {
            $details .= " $name - встроенный \n";
        }

        if($class->isInterface()) {
            $details .= " $name - интерфейс \n";
        }

        if($class->isAbstract()) {
            $details .= " $name - абстрактный \n";
        }

        if($class->isFinal()) {
            $details .= " $name - завершенный \n";
        }

        if($class->isInstantiable()) {
            $details .= " $name - можно создать экземпляр \n";
        }

        if($class->isCloneable()) {
            $details .= " $name - можно клонировать \n";
        } else {
            $details .= " $name - нельзя клонировать \n";
        }

        return $details;
    }

    public function methodData(\ReflectionMethod $method)
    {
        $details = "";
    }


    /**
     * @param \ReflectionParameter $parameter
     * @return string
     */
    public function argData(\ReflectionParameter $parameter) : string
    {
        $details = '';
//        $declaringClass = $parameter->getDeclaringClass();
        $position = $parameter->getPosition();
        $name = $parameter->getName();
        $class = $parameter->getClass();

        $details .= "\$$name находиться в позиции $position \n";

        if(!empty($class)) {
            $classname = $class->getName();
            $details .= "\$$name должен быть объектом типа $classname \n";
        }

        if($parameter->isPassedByReference()) {
            $details .= "\$$name передан по ссылке \n";
        }

        if($parameter->isDefaultValueAvailable()) {
            $default = $parameter->getDefaultValue();
            $details .= "\$$name по умолчанию равно: $default \n";
        }

        return $details;
    }
}