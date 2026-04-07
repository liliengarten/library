<?php
namespace App\Actions;

class LogoutAction {
    public static function execute() {
        request()->user()->tokens()->delete();
    }
}
