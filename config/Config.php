<?php

namespace Config;

final class Config
{
    protected static Config|null $instance = null;
    protected array $configs = [];

    private function __construct() {}
    private function __clone() {}

    public static function get(string $name): string|null {
        if(is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance->getParam($name);
    }

    public function getParam(string $name):string|null {
        $keys = explode('.', $name);
        return $this->findParamsByKeys($keys, $this->readConfigs());
    }

    protected function readConfigs(): array {
        if(empty($this->configs)) {
            $this->configs = require_once  CONFIG_DIR . '/configurations.php';
        }

        return $this->configs;
    }

    protected function findParamsByKeys(array $keys = [], array $configs = []): string|null {
        $value = null;

        if(empty($keys)) return $value;

        $search = array_shift($keys);

        if(array_key_exists($search, $configs)) {
            $value = is_array($configs[$search])
                ? $this->findParamsByKeys($keys, $configs[$search])
                : $configs[$search];
        }
        return $value;
    }
}