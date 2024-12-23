<?php

class SingleTon
{
    /**
     * The Singleton's instance is stored in a static field. This field is an
     * array, because we'll allow our Singleton to have subclasses. Each item in
     * this array will be an instance of a specific Singleton's subclass. You'll
     * see how this works in a moment.
     */
    protected static $instances = [];

    /**
     * The Singleton's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    protected function __construct(){}

    /**
     * Singletons should not be cloneable.
     */
    protected function __clone(){}

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup(){
        throw new Exception("Cannot unserialize a singleton");
    }
            
    /**
     * This is the static method that controls the access to the singleton
     * instance. On the first run, it creates a singleton object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Singleton class while keeping
     * just one instance of each subclass around.
     */
    public static function getInstance()
    {
        $class = static::class;

        if(!isset(self::$instances[$class])){
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }
}

$class_1 = SingleTon::getInstance();
$class_2 = SingleTon::getInstance();


if($class_1 === $class_2){
    echo "Singleton works, both variables the same instance.";
}else{
    echo "Singleton failed, variables contain different instances.";
}