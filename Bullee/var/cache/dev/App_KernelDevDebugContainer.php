<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container7Z51FNu\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container7Z51FNu/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container7Z51FNu.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container7Z51FNu\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container7Z51FNu\App_KernelDevDebugContainer([
    'container.build_hash' => '7Z51FNu',
    'container.build_id' => '0f033f01',
    'container.build_time' => 1670421073,
], __DIR__.\DIRECTORY_SEPARATOR.'Container7Z51FNu');
