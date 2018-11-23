<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

/*
Singleton (Синглтон, одиночка) - порождающий шаблон проектирования, гарантирует, что в приложении(однопоточном)
будет использоваться только один(единственный) экземпляр класса. Объекты класса Singleton будут созданы только один раз
и при последующих обращениях будет использоваться уже созданный объект, а не будут создаваться новые экземпляры.
Это очень удобно и экономно. Например: соединение к БД - нам не нужно каждый раз создавать новое соединение;
доступ к объекту конфигурации; в MVC - порождение главного контроллера; объект логирования.';
*/

class Singleton
{
    private $props = [];
    private static $instance;

    protected function __construct(){}

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setProperty($key, $val){
        $this->props[$key] = $val;
    }

    public function getProperty($key){
        return $this->props[$key];
    }

//    private function __clone(){}
//    private function __wakeup(){}

}

# Свойство $instance закрытое и статическое - нельзя получить доступ из-за пределов класса
# У метода getInstance есть к нему доступ

# $pref = new Singleton();
# > Error: Call to protected Singleton::__construct()

$pref = Singleton::getInstance();
$pref->setProperty('test', 'is good');
echo $pref->getProperty('test');



//$obj = Singleton::getInstance();
//var_dump($obj === Singleton::getInstance());             // bool(true)
//$anotherObj = SingletonChild::getInstance();
//var_dump($anotherObj === Singleton::getInstance());      // bool(false)
//var_dump($anotherObj === SingletonChild::getInstance()); // bool(true


