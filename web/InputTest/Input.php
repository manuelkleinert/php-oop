<?php

class Input
{
    protected $inputs = [
      'get' => [],
      'post' => []
    ];

    public static function createFromGlobals()
    {
        return new static(['get' => $_GET, 'post' => $_POST]);
    }

    public function replace($inputs = []) {
        foreach ($this->inputs as $key => $input) {
            if (isset($inputs[$key])){
                $this->inputs[$key] = $inputs[$key];
            }
        }
    }

    public function get($key)
    {
        return $this->fetch('get', $key);
    }

    public function post($key)
    {
        return $this->fetch('post', $key);
    }

    protected function fetch($input, $key)
    {
        $result = null;

        if (isset($this->inputs[$input][$key])) {
            $result = $this->inputs[$input][$key];
        }

        return $result;
    }
}