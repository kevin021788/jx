<?php
return [
    '超级管理员' => [
        'type' => 1,
        'description' => '拥有所有后台管理权限',
        'children' => [
            '所有权限',
            '新闻管理',
            '商家管理',
            '系统管理',
            '/admin/*',
            '/site/*',
            '/bemanage/album/*',
            '/bemanage/album-pics/*',
            '/bemanage/client/*',
            '/bemanage/competition/*',
            '/bemanage/index/*',
            '/bemanage/news/*',
            '/bemanage/rule/*',
            '/bemanage/score/*',
            '/bemanage/shop/*',
            '/bemanage/slider/*',
            '/bemanage/team/*',
            '/bemanage/team-member/*',
            '/bemanage/upload/*',
            '/bemanage/user/*',
            '/bemanage/vote/*',
            '/admin/user/login',
            '/admin/user/logout',
            '/admin/user/signup',
            '/admin/user/change-password',
            '/bemanage/system/index',
            '/bemanage/system/view',
            '/bemanage/system/create',
            '/bemanage/system/update',
            '/bemanage/system/delete',
            '/bemanage/system/*',
            '/bemanage/team-leader/index',
            '/bemanage/team-leader/view',
            '/bemanage/team-leader/create',
            '/bemanage/team-leader/update',
            '/bemanage/team-leader/delete',
            '/bemanage/team-leader/*',
            '/bemanage/share/index',
            '/bemanage/share/view',
            '/bemanage/share/create',
            '/bemanage/share/update',
            '/bemanage/share/delete',
            '/bemanage/share/*',
            '/bemanage/team-competition/index',
            '/bemanage/team-competition/view',
            '/bemanage/team-competition/create',
            '/bemanage/team-competition/update',
            '/bemanage/team-competition/delete',
            '/bemanage/team-competition/*',
        ],
    ],
    '所有权限' => [
        'type' => 2,
        'children' => [
            '新闻管理',
            '商家管理',
            '系统管理',
            '/admin/*',
            '/site/*',
            '/bemanage/album/*',
            '/bemanage/album-pics/*',
            '/bemanage/client/*',
            '/bemanage/competition/*',
            '/bemanage/index/*',
            '/bemanage/news/*',
            '/bemanage/rule/*',
            '/bemanage/score/*',
            '/bemanage/shop/*',
            '/bemanage/slider/*',
            '/bemanage/team/*',
            '/bemanage/team-member/*',
            '/bemanage/upload/*',
            '/bemanage/user/*',
            '/bemanage/vote/*',
            '/admin/user/login',
            '/admin/user/logout',
            '/admin/user/signup',
            '/admin/user/change-password',
            '/bemanage/system/index',
            '/bemanage/system/view',
            '/bemanage/system/create',
            '/bemanage/system/update',
            '/bemanage/system/delete',
            '/bemanage/system/*',
            '/bemanage/team-leader/index',
            '/bemanage/team-leader/view',
            '/bemanage/team-leader/create',
            '/bemanage/team-leader/update',
            '/bemanage/team-leader/delete',
            '/bemanage/team-leader/*',
            '/bemanage/share/index',
            '/bemanage/share/view',
            '/bemanage/share/create',
            '/bemanage/share/update',
            '/bemanage/share/delete',
            '/bemanage/share/*',
            '/bemanage/team-competition/index',
            '/bemanage/team-competition/view',
            '/bemanage/team-competition/create',
            '/bemanage/team-competition/update',
            '/bemanage/team-competition/delete',
            '/bemanage/team-competition/*',
            '/bemanage/about/index',
            '/bemanage/about/view',
            '/bemanage/about/create',
            '/bemanage/about/update',
            '/bemanage/about/delete',
            '/bemanage/about/*',
            '/bemanage/contact/index',
            '/bemanage/contact/view',
            '/bemanage/contact/create',
            '/bemanage/contact/update',
            '/bemanage/contact/delete',
            '/bemanage/contact/*',
            '/bemanage/category/index',
            '/bemanage/category/view',
            '/bemanage/category/create',
            '/bemanage/category/update',
            '/bemanage/category/delete',
            '/bemanage/category/*',
            '/lang/language',
            '/lang/*',
            '/bemanage/product/*',
            '/bemanage/config/index',
            '/bemanage/config/view',
            '/bemanage/config/create',
            '/bemanage/config/update',
            '/bemanage/config/delete',
            '/bemanage/config/*',
            '/bemanage/config/delete-all',
            '/bemanage/config/change-status',
            '/bemanage/category/delete-all',
            '/bemanage/category/change-status',
            '/bemanage/service/*',
            '/bemanage/banner/index',
            '/bemanage/banner/view',
            '/bemanage/banner/create',
            '/bemanage/banner/update',
            '/bemanage/banner/delete',
            '/bemanage/banner/*',
            '/bemanage/banner/delete-all',
            '/bemanage/banner/change-status',
        ],
    ],
    '/admin/*' => [
        'type' => 2,
    ],
    '/site/*' => [
        'type' => 2,
    ],
    '/bemanage/album/*' => [
        'type' => 2,
    ],
    '/bemanage/album-pics/*' => [
        'type' => 2,
    ],
    '/bemanage/client/*' => [
        'type' => 2,
    ],
    '/bemanage/competition/*' => [
        'type' => 2,
    ],
    '/bemanage/index/*' => [
        'type' => 2,
    ],
    '/bemanage/news/*' => [
        'type' => 2,
    ],
    '/bemanage/rule/*' => [
        'type' => 2,
    ],
    '/bemanage/score/*' => [
        'type' => 2,
    ],
    '/bemanage/shop/*' => [
        'type' => 2,
    ],
    '/bemanage/slider/*' => [
        'type' => 2,
    ],
    '/bemanage/team/*' => [
        'type' => 2,
    ],
    '/bemanage/team-member/*' => [
        'type' => 2,
    ],
    '/bemanage/upload/*' => [
        'type' => 2,
    ],
    '/bemanage/user/*' => [
        'type' => 2,
    ],
    '/bemanage/vote/*' => [
        'type' => 2,
    ],
    '新闻管理' => [
        'type' => 2,
        'children' => [
            '/bemanage/news/*',
        ],
    ],
    '商家管理' => [
        'type' => 2,
        'children' => [
            '/bemanage/shop/*',
        ],
    ],
    '系统管理' => [
        'type' => 2,
        'children' => [
            '/bemanage/client/*',
            '/bemanage/rule/*',
            '/bemanage/slider/*',
            '/bemanage/upload/*',
            '/bemanage/user/*',
            '/bemanage/vote/*',
            '/bemanage/system/*',
            '/bemanage/share/*',
            '/bemanage/team-leader/*',
        ],
    ],
    '普通访客' => [
        'type' => 1,
        'description' => '没有后台管理权限的访客',
        'children' => [
            '/site/*',
        ],
    ],
    '内容编辑' => [
        'type' => 1,
        'description' => '拥有一般的内容编辑权限',
        'children' => [
            '新闻管理',
            '商家管理',
            '/bemanage/slider/*',
            '/bemanage/rule/*',
            '/bemanage/index/*',
            '/admin/user/login',
            '/admin/user/logout',
            '/admin/user/change-password',
        ],
    ],
    '/admin/user/login' => [
        'type' => 2,
    ],
    '/admin/user/logout' => [
        'type' => 2,
    ],
    '/admin/user/signup' => [
        'type' => 2,
    ],
    '/admin/user/change-password' => [
        'type' => 2,
    ],
    '/bemanage/system/index' => [
        'type' => 2,
    ],
    '/bemanage/system/view' => [
        'type' => 2,
    ],
    '/bemanage/system/create' => [
        'type' => 2,
    ],
    '/bemanage/system/update' => [
        'type' => 2,
    ],
    '/bemanage/system/delete' => [
        'type' => 2,
    ],
    '/bemanage/system/*' => [
        'type' => 2,
    ],
    '/bemanage/team-leader/index' => [
        'type' => 2,
    ],
    '/bemanage/team-leader/view' => [
        'type' => 2,
    ],
    '/bemanage/team-leader/create' => [
        'type' => 2,
    ],
    '/bemanage/team-leader/update' => [
        'type' => 2,
    ],
    '/bemanage/team-leader/delete' => [
        'type' => 2,
    ],
    '/bemanage/team-leader/*' => [
        'type' => 2,
    ],
    '/bemanage/share/index' => [
        'type' => 2,
    ],
    '/bemanage/share/view' => [
        'type' => 2,
    ],
    '/bemanage/share/create' => [
        'type' => 2,
    ],
    '/bemanage/share/update' => [
        'type' => 2,
    ],
    '/bemanage/share/delete' => [
        'type' => 2,
    ],
    '/bemanage/share/*' => [
        'type' => 2,
    ],
    '/bemanage/team-competition/index' => [
        'type' => 2,
    ],
    '/bemanage/team-competition/view' => [
        'type' => 2,
    ],
    '/bemanage/team-competition/create' => [
        'type' => 2,
    ],
    '/bemanage/team-competition/update' => [
        'type' => 2,
    ],
    '/bemanage/team-competition/delete' => [
        'type' => 2,
    ],
    '/bemanage/team-competition/*' => [
        'type' => 2,
    ],
    '/bemanage/about/index' => [
        'type' => 2,
    ],
    '/bemanage/about/view' => [
        'type' => 2,
    ],
    '/bemanage/about/create' => [
        'type' => 2,
    ],
    '/bemanage/about/update' => [
        'type' => 2,
    ],
    '/bemanage/about/delete' => [
        'type' => 2,
    ],
    '/bemanage/about/*' => [
        'type' => 2,
    ],
    '/bemanage/contact/index' => [
        'type' => 2,
    ],
    '/bemanage/contact/view' => [
        'type' => 2,
    ],
    '/bemanage/contact/create' => [
        'type' => 2,
    ],
    '/bemanage/contact/update' => [
        'type' => 2,
    ],
    '/bemanage/contact/delete' => [
        'type' => 2,
    ],
    '/bemanage/contact/*' => [
        'type' => 2,
    ],
    '/bemanage/category/index' => [
        'type' => 2,
    ],
    '/bemanage/category/view' => [
        'type' => 2,
    ],
    '/bemanage/category/create' => [
        'type' => 2,
    ],
    '/bemanage/category/update' => [
        'type' => 2,
    ],
    '/bemanage/category/delete' => [
        'type' => 2,
    ],
    '/bemanage/category/*' => [
        'type' => 2,
    ],
    '/lang/language' => [
        'type' => 2,
    ],
    '/lang/*' => [
        'type' => 2,
    ],
    '/bemanage/product/*' => [
        'type' => 2,
    ],
    '/bemanage/config/index' => [
        'type' => 2,
    ],
    '/bemanage/config/view' => [
        'type' => 2,
    ],
    '/bemanage/config/create' => [
        'type' => 2,
    ],
    '/bemanage/config/update' => [
        'type' => 2,
    ],
    '/bemanage/config/delete' => [
        'type' => 2,
    ],
    '/bemanage/config/*' => [
        'type' => 2,
    ],
    '/bemanage/config/delete-all' => [
        'type' => 2,
    ],
    '/bemanage/config/change-status' => [
        'type' => 2,
    ],
    '/bemanage/category/delete-all' => [
        'type' => 2,
    ],
    '/bemanage/category/change-status' => [
        'type' => 2,
    ],
    '/bemanage/service/*' => [
        'type' => 2,
    ],
    '/bemanage/banner/index' => [
        'type' => 2,
    ],
    '/bemanage/banner/view' => [
        'type' => 2,
    ],
    '/bemanage/banner/create' => [
        'type' => 2,
    ],
    '/bemanage/banner/update' => [
        'type' => 2,
    ],
    '/bemanage/banner/delete' => [
        'type' => 2,
    ],
    '/bemanage/banner/*' => [
        'type' => 2,
    ],
    '/bemanage/banner/delete-all' => [
        'type' => 2,
    ],
    '/bemanage/banner/change-status' => [
        'type' => 2,
    ],
    '/bemanage/service/upload' => [
        'type' => 2,
    ],
    '/bemanage/service/index' => [
        'type' => 2,
    ],
    '/bemanage/service/view' => [
        'type' => 2,
    ],
    '/bemanage/service/create' => [
        'type' => 2,
    ],
    '/bemanage/service/update' => [
        'type' => 2,
    ],
    '/bemanage/service/delete' => [
        'type' => 2,
    ],
    '/bemanage/service/delete-all' => [
        'type' => 2,
    ],
    '/bemanage/service/change-status' => [
        'type' => 2,
    ],
];
