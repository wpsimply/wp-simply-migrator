<?php

namespace WPSimply\Migrator;

class Token
{
    public static function get()
    {
        $token = get_option("wpsimplymigrator_token");
        if (empty($token)) {
            $token = wp_generate_password(42, false);
            update_option("wpsimplymigrator_token", $token);
        }
        return $token;
    }
}
