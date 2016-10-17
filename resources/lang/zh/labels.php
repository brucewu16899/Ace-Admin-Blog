<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/18/16
 * Time: 13:09
 */
return [
    'add' => '添加',
    'edit' => '编辑',
    'delete' => '删除',
    'submit' => '提交',
    'reset' => '重置',
    'save' => '保存',
    'user' => [
        'systemManage' => '系统管理',
        'userManage' => '用户管理',
        'list' => '用户列表',
        'id' => 'ID',
        'name' => '用户名',
        'username' => '用户名',
        'password' => '密码',
        'role' => '权限',
        'email' => '电子邮箱',
        'status' => '状态',
        'created_at' => '创建时间',
        'updated_at' => '更新时间',
        'action' => '操作',
    ],
    'role' => [
        'systemManage' => '系统管理',
        'roleManage' => '角色管理',
        'list' => '角色列表',
        'name' => '名称',
        'description' => '描述',
        'status' => '状态',
        'slug' => '权限',
        'module' => '模块',
        'permission' => '权限',
        'level' => '级别',
        'created_at' => '创建时间',
        'updated_at' => '更新时间',
        'action' => '操作',
    ],
    'permission' => [
        'systemManage' => '系统管理',
        'permissionManage' => '权限管理',
        'list' => '权限列表',
        'name' => '名称',
        'slug' => '权限',
        'description' => '描述',
        'model' => '模型',
        'status' => '状态',
        'created_at' => '创建时间',
        'updated_at' => '更新时间',
    ],
    'menu' => [
        'topMenu' => '顶级菜单',
        'systemManage' => '系统管理',
        'menuManage' => '菜单管理',
        'list' => '菜单列表',
        'name' => '名称',
        'language' => '语言',
        'icon' => '图标',
        'slug' => '权限',
        'pid' => '父级分类',
        'url' => '链接',
        'description' => '描述',
        'sort' => '排序',
        'status' => '状态',
        'created_at' => '创建时间',
        'updated_at' => '更新时间',
        'add' => '添加菜单',
    ],
    'blog' => [
        'article' => [
            'id' => '文章ID',
            'cate_id' => '分类',
            'blogManage' => '博客管理',
            'articleManage' => '文章管理',
            'list' => '文章列表',
            'thumb' => '缩略图',
            'title' => '标题',
            'user_id' => '用户UID',
            'content_md' => '内容',
            'sort' => '排序',
            'tag' => '标签',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'action' => '操作',
        ],
        'tag' => [
            'id' => '标签ID',
            'blogManage' => '博客管理',
            'tagManage' => '标签管理',
            'list' => '标签列表',
            'name' => '标签名称',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'action' => '操作',
        ],
        'cate' => [
            'top' => '顶级分类',

            'id' => '分类ID',
            'blogManage' => '博客管理',
            'cateManage' => '分类管理',
            'list' => '分类列表',
            'name' => '分类名称',
            'sort' => '排序',
            'pid' => '父ID',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'action' => '操作',
        ],
        'picture'=>[
            'blogManage'=>'博客管理',
            'pictureManage'=>'图片管理',
            'list'=>'图片列表'
        ]
    ]
];