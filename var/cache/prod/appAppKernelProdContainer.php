<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container5gf5DC8\appAppKernelProdContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container5gf5DC8/appAppKernelProdContainer.php') {
    touch(__DIR__.'/Container5gf5DC8.legacy');

    return;
}

if (!\class_exists(appAppKernelProdContainer::class, false)) {
    \class_alias(\Container5gf5DC8\appAppKernelProdContainer::class, appAppKernelProdContainer::class, false);
}

return new \Container5gf5DC8\appAppKernelProdContainer([
    'container.build_hash' => '5gf5DC8',
    'container.build_id' => '43547103',
    'container.build_time' => 1741077413,
], __DIR__.\DIRECTORY_SEPARATOR.'Container5gf5DC8');
