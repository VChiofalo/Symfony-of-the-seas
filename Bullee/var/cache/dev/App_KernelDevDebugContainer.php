<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container0MZuBGM\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container0MZuBGM/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container0MZuBGM.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container0MZuBGM\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container0MZuBGM\App_KernelDevDebugContainer([
    'container.build_hash' => '0MZuBGM',
    'container.build_id' => 'c5c4601c',
    'container.build_time' => 1670337607,
], __DIR__.\DIRECTORY_SEPARATOR.'Container0MZuBGM');