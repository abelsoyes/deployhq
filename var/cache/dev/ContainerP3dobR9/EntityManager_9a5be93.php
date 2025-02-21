<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder56028 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer05ff2 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties4c9c5 = [
        
    ];

    public function getConnection()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getConnection', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getMetadataFactory', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getExpressionBuilder', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'beginTransaction', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getCache', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getCache();
    }

    public function transactional($func)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'transactional', array('func' => $func), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'wrapInTransaction', array('func' => $func), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'commit', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->commit();
    }

    public function rollback()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'rollback', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getClassMetadata', array('className' => $className), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'createQuery', array('dql' => $dql), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'createNamedQuery', array('name' => $name), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'createQueryBuilder', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'flush', array('entity' => $entity), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'clear', array('entityName' => $entityName), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->clear($entityName);
    }

    public function close()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'close', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->close();
    }

    public function persist($entity)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'persist', array('entity' => $entity), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'remove', array('entity' => $entity), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'refresh', array('entity' => $entity), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'detach', array('entity' => $entity), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'merge', array('entity' => $entity), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getRepository', array('entityName' => $entityName), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'contains', array('entity' => $entity), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getEventManager', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getConfiguration', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'isOpen', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getUnitOfWork', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getProxyFactory', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'initializeObject', array('obj' => $obj), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getFilters', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'isFiltersStateClean', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'hasFilters', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer05ff2 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder56028) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder56028 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder56028->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, '__get', ['name' => $name], $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        if (isset(self::$publicProperties4c9c5[$name])) {
            return $this->valueHolder56028->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56028;

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

        $targetObject = $this->valueHolder56028;
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
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56028;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder56028;
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
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, '__isset', array('name' => $name), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56028;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder56028;
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
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, '__unset', array('name' => $name), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56028;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder56028;
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
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, '__clone', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        $this->valueHolder56028 = clone $this->valueHolder56028;
    }

    public function __sleep()
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, '__sleep', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return array('valueHolder56028');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer05ff2 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer05ff2;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'initializeProxy', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder56028;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder56028;
    }
}
