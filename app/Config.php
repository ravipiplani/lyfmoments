<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public static function get_value($key) {
        try {
            $config = Config::where('key', $key)->firstOrFail();
            return $config->value;
        }
        catch(Exception $e) {
            return null;
        }
    }

    public static function update_value($key, $value) {
        $config = Config::where('key', $key)->firstOrFail();
        $config->value = $value;
        $config->save();
    }
}
