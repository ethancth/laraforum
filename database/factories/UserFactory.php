<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        $avatars = [
            'https://act.hoyoverse.com/hk4e/e20200928calculate/item_icon_uceddf/75ca49c5563a7660f52f1101d1075028.png',
            'https://act.hoyoverse.com/hk4e/e20200928calculate/item_icon_uceddf/cc8b7cb7601cdae9f25493ed0f03e89b.png',
            'https://act.hoyoverse.com/hk4e/e20200928calculate/item_icon_uceddf/59fd5c9be5274f8827d19f895ba218f3.png',
            'https://act.hoyoverse.com/hk4e/e20200928calculate/item_icon_uceddf/4da8d9d663e2e59f63c19815074074de.png',
            'https://act.hoyoverse.com/hk4e/e20200928calculate/item_icon_uceddf/965af2f32a5376affcb99afb9915a23d.png',
            'https://act.hoyoverse.com/hk4e/e20200928calculate/item_icon_uceddf/bb7915afe35b31af4287e3402ed9426f.png',
            'https://act.hoyoverse.com/hk4e/e20200928calculate/item_icon_uceddf/fccb452bd22446e8d8f4eb6e019abdab.png',
        ];

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'introduction' => $this->faker->sentence(),
            'avatar' => $this->faker->randomElement($avatars),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
