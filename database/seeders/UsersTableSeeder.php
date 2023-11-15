<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // 生成数据集合
        User::factory()->count(10)->create();

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'administrator';
        $user->email = 'administrator@example.com';
        $user->avatar = 'https://play-lh.googleusercontent.com/DXwvOFxp_F8N9jw4FW8kCD0SWj8ba9YqDmMPphgkoG7qqEET_yV3vxuQcVcWQJkHX18=w240-h480-rw';
        $user->save();

        // 初始化用户角色，将 1 号用户指派为『站长』
        $user->assignRole('Founder');

        // 将 2 号用户指派为『管理员』
        $user = User::find(2);
        $user->assignRole('Maintainer');
    }
}
