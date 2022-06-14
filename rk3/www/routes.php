<?php
    return [
        '~^hello/(.*)$~' => [MyProject\Controllers\MainController::class, 'sayHello'],
        '~^$~' => [MyProject\Controllers\MainController::class, 'main'],
        '~^article/(\d+)$~' => [MyProject\Controllers\ArticleController::class, 'view'],
        '~^article/add$~' => [MyProject\Controllers\ArticleController::class, 'add'],
        '~^article/(\d+)/edit$~' => [MyProject\Controllers\ArticleController::class, 'edit'],
        '~^article/(\d+)/delete$~' => [MyProject\Controllers\ArticleController::class, 'delete'],
        '~^article/(\d+)/comments$~' => [MyProject\Controllers\CommentController::class, 'add'],
        '~^comments/(\d+)/edit$~' => [MyProject\Controllers\CommentController::class, 'edit']
    ]
?>