<?php
$aclList = [
    ['name' => '后台管理', 'model' => 'admin', 'child' => [
        ['name' => '公共', 'controller' => 'public', 'child' => [
            ['name' => '登陆', 'action' => 'login'],
            ['name' => '退出', 'action' => 'logout'],
        ]],
    ]],
];
