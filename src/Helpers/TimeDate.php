<?php

namespace LaravelScaffold\Helpers;

class TimeDate
{
    protected static $defaultFormat = "d-m-Y H:i:s A";
    protected static $defaultEnvFormatKey = "GLOBAL_DATE_TIME_FORMAT";

    public static function setDefaultFormat(string $format)
    {
        self::$defaultFormat = $format;
    }

    public static function setDefaultEnvKey(string $key)
    {
        self::$defaultEnvFormatKey = $key;
    }

    public static function getDefaultFormat()
    {
        return env(self::$defaultEnvFormatKey, self::$defaultFormat);
    }
}
