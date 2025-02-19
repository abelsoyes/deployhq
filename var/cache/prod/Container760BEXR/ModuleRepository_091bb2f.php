<?php

class ModuleRepository_091bb2f extends \PrestaShop\PrestaShop\Core\Module\ModuleRepository implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolderf4ebe = null;
    private $initializer54c56 = null;
    private static $publicProperties7a0af = [
        
    ];
    public function getList() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getList', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getList();
    }
    public function getInstalledModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getInstalledModules', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getInstalledModules();
    }
    public function getMustBeConfiguredModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getMustBeConfiguredModules', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getMustBeConfiguredModules();
    }
    public function getUpgradableModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getUpgradableModules', array(), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getUpgradableModules();
    }
    public function getModule(string $moduleName) : \PrestaShop\PrestaShop\Core\Module\ModuleInterface
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getModule', array('moduleName' => $moduleName), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getModule($moduleName);
    }
    public function getModulePath(string $moduleName) : ?string
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'getModulePath', array('moduleName' => $moduleName), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->getModulePath($moduleName);
    }
    public function setActionUrls(\PrestaShop\PrestaShop\Core\Module\ModuleCollection $collection) : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'setActionUrls', array('collection' => $collection), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->setActionUrls($collection);
    }
    public function clearCache(?string $moduleName = null, bool $allShops = false) : bool
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, 'clearCache', array('moduleName' => $moduleName, 'allShops' => $allShops), $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        return $this->valueHolderf4ebe->clearCache($moduleName, $allShops);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $instance, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($instance);
        $instance->initializer54c56 = $initializer;
        return $instance;
    }
    public function __construct(\PrestaShop\PrestaShop\Adapter\Module\ModuleDataProvider $moduleDataProvider, \PrestaShop\PrestaShop\Adapter\Module\AdminModuleDataProvider $adminModuleDataProvider, \Doctrine\Common\Cache\CacheProvider $cacheProvider, \PrestaShop\PrestaShop\Adapter\HookManager $hookManager, string $modulePath, int $contextLangId)
    {
        static $reflection;
        if (! $this->valueHolderf4ebe) {
            $reflection = $reflection ?? new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
            $this->valueHolderf4ebe = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
        }
        $this->valueHolderf4ebe->__construct($moduleDataProvider, $adminModuleDataProvider, $cacheProvider, $hookManager, $modulePath, $contextLangId);
    }
    public function & __get($name)
    {
        $this->initializer54c56 && ($this->initializer54c56->__invoke($valueHolderf4ebe, $this, '__get', ['name' => $name], $this->initializer54c56) || 1) && $this->valueHolderf4ebe = $valueHolderf4ebe;
        if (isset(self::$publicProperties7a0af[$name])) {
            return $this->valueHolderf4ebe->$name;
        }
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
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
