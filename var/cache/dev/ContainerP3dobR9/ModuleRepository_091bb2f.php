<?php

class ModuleRepository_091bb2f extends \PrestaShop\PrestaShop\Core\Module\ModuleRepository implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \PrestaShop\PrestaShop\Core\Module\ModuleRepository|null wrapped object, if the proxy is initialized
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

    public function getList() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getList', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getList();
    }

    public function getInstalledModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getInstalledModules', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getInstalledModules();
    }

    public function getMustBeConfiguredModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getMustBeConfiguredModules', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getMustBeConfiguredModules();
    }

    public function getUpgradableModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getUpgradableModules', array(), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getUpgradableModules();
    }

    public function getModule(string $moduleName) : \PrestaShop\PrestaShop\Core\Module\ModuleInterface
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getModule', array('moduleName' => $moduleName), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getModule($moduleName);
    }

    public function getModulePath(string $moduleName) : ?string
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'getModulePath', array('moduleName' => $moduleName), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->getModulePath($moduleName);
    }

    public function setActionUrls(\PrestaShop\PrestaShop\Core\Module\ModuleCollection $collection) : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'setActionUrls', array('collection' => $collection), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->setActionUrls($collection);
    }

    public function clearCache(?string $moduleName = null, bool $allShops = false) : bool
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, 'clearCache', array('moduleName' => $moduleName, 'allShops' => $allShops), $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        return $this->valueHolder56028->clearCache($moduleName, $allShops);
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

        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $instance, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($instance);

        $instance->initializer05ff2 = $initializer;

        return $instance;
    }

    public function __construct(\PrestaShop\PrestaShop\Adapter\Module\ModuleDataProvider $moduleDataProvider, \PrestaShop\PrestaShop\Adapter\Module\AdminModuleDataProvider $adminModuleDataProvider, \Doctrine\Common\Cache\CacheProvider $cacheProvider, \PrestaShop\PrestaShop\Adapter\HookManager $hookManager, string $modulePath, int $contextLangId)
    {
        static $reflection;

        if (! $this->valueHolder56028) {
            $reflection = $reflection ?? new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
            $this->valueHolder56028 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);

        }

        $this->valueHolder56028->__construct($moduleDataProvider, $adminModuleDataProvider, $cacheProvider, $hookManager, $modulePath, $contextLangId);
    }

    public function & __get($name)
    {
        $this->initializer05ff2 && ($this->initializer05ff2->__invoke($valueHolder56028, $this, '__get', ['name' => $name], $this->initializer05ff2) || 1) && $this->valueHolder56028 = $valueHolder56028;

        if (isset(self::$publicProperties4c9c5[$name])) {
            return $this->valueHolder56028->$name;
        }

        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');

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

        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');

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

        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');

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

        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');

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
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
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
