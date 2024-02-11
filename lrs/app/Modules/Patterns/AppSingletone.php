<?php

namespace App\Modules\Patterns;

class AppSingletone
{
    private static ?self $instance = null;
    // Закрытый конструктор, чтобы предотвратить создание новых экземпляров
    private function __construct()
    {
    }

    // Метод для получения единственного экземпляра класса
    public static function getInstance(): AppSingletone
    {
        if (!self::$instance) {
            self::$instance = new self();
            dump(self::$instance);
        }

        return self::$instance;
    }

}
