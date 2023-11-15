<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

return [
    'title' => 'Settings',

    'permission'=> function()
    {
        return Auth::user()->hasRole('Founder');
    },

    // 站点配置的表单
    'edit_fields' => [
        'site_name' => [
            // 表单标题
            'title' => 'Title',

            // 表单条目类型
            'type' => 'text',

            // 字数限制
            'limit' => 50,
        ],
        'contact_email' => [
            'title' => 'Contact Email',
            'type' => 'text',
            'limit' => 50,
        ],
        'seo_description' => [
            'title' => 'SEO - Description',
            'type' => 'textarea',
            'limit' => 250,
        ],
        'seo_keyword' => [
            'title' => 'SEO - Keywords',
            'type' => 'textarea',
            'limit' => 250,
        ],
    ],

    // 表单验证规则
    'rules' => [
        'site_name' => 'required|max:50',
        'contact_email' => 'email',
    ],

    'messages' => [
        'site_name.required' => 'Site Name。',
        'contact_email.email' => 'Site Email',
    ],


    'before_save' => function(&$data)
    {

        if (strpos($data['site_name'], 'Powered by Student Social Media') === false) {
            $data['site_name'] .= ' - Powered by Student Social Media';
        }
    },

    'actions' => [

        'clear_cache' => [
            'title' => 'Clear Cache',

            'messages' => [
                'active' => 'Clearing Cache...',
                'success' => 'Clear Cache Success！',
                'error' => 'Error！',
            ],

            'action' => function(&$data)
            {
                Artisan::call('cache:clear');
                return true;
            }
        ],
    ],
];
