<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolderf4ebe = null;
    private $initializer54c56 = null;
    private static $publicProperties7a0af = [
        
    ];
    public function getConnection()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getConnection', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getMetadataFactory', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getExpressionBuilder', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'beginTransaction', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->beginTransaction();
    }
    public function getCache()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getCache', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getCache();
    }
    public function transactional($func)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'transactional', array('func' => $func), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'wrapInTransaction', array('func' => $func), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'commit', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->commit();
    }
    public function rollback()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'rollback', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getClassMetadata', array('className' => $className), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'createQuery', array('dql' => $dql), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'createNamedQuery', array('name' => $name), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'createQueryBuilder', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'flush', array('entity' => $entity), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'clear', array('entityName' => $entityName), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->clear($entityName);
    }
    public function close()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'close', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->close();
    }
    public function persist($entity)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'persist', array('entity' => $entity), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'remove', array('entity' => $entity), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'refresh', array('entity' => $entity), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'detach', array('entity' => $entity), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'merge', array('entity' => $entity), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getRepository', array('entityName' => $entityName), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'contains', array('entity' => $entity), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getEventManager', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getConfiguration', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'isOpen', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getUnitOfWork', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getProxyFactory', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'initializeObject', array('obj' => $obj), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getFilters', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'isFiltersStateClean', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'hasFilters', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializer54c56 = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolderf4ebe) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderf4ebe = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolderf4ebe->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, '__get', ['name' => $name], $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        if (isset(self::$publicProperties7a0af[$name])) {
            return $this->valueHolderf4ebe->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf4ebe;
            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolderf4ebe;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf4ebe;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolderf4ebe;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, '__isset', array('name' => $name), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf4ebe;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolderf4ebe;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, '__unset', array('name' => $name), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf4ebe;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolderf4ebe;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }
    public function __clone()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, '__clone', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        $this->valueHolderf4ebe = clone $this->valueHolderf4ebe;
    }
    public function __sleep()
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, '__sleep', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return array('valueHolderf4ebe');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer54c56 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer54c56;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'initializeProxy', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderf4ebe;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderf4ebe;
    }
}
