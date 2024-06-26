<?php

namespace App\Helpers;

class RoleHelper {

    public static function redirect() {
        switch (auth()->user()->role){
            case 'admin':
                return 'admins.index';
        }
    }
}
