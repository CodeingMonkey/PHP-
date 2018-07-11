<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/11
 * Time: 14:00
 */

abstract class ActiveRecode {

    protected static $table;
    protected $filedValues;
    public $select;

    static function findById($id) {
        $query = "select * from ".static::$table." where id = $id";
        return self::createDomain($query);
    }

    function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->filedValues[$name];
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     * Administrator lirongsheng
     * 2018/7/11
     * 调用不存在或者受保护的静态方法时，__callStatic方法会被调用
     */
    static function __callStatic($method, $arguments)
    {
        // TODO: Implement __callStatic() method.
        $field = preg_replace('/^findBy(\w*)$/', '${1}', $method);
        $query = "select * from ".static::$table." where $field = $arguments[0]";
        return self::createDomain($query);
    }

    private static function createDomain($query) {
        $klass = get_called_class();
        $domain = new $klass();
        $domain->filedValues = [];
        $domain->select = $query;

        foreach ($klass::$fields as $field => $value) {
            $domain->filedValues[$field] = 'TODO: set from sql result';
        }
        return $domain;
    }
}

class Customer extends ActiveRecode {
    protected static $table = 'custdb';
    protected static $fields = [
        'id' => 'int',
        'email' => 'varchar',
        'lastname' => 'varchar',
    ];
}

class Sales extends ActiveRecode {
    protected static $table = 'salesdb';
    protected static $fields = [
        'id' => 'int',
        'item' => 'varchar',
        'qty' => 'int'
    ];
}


exit(json_encode(assert("select * from custdb where id = 123" == Customer::findById(123)->select)));
die();
