<?php

if (!function_exists('is_uint')) {
    function is_uint()
    {
        foreach (func_get_args() as $arg) {
            if (!is_int($arg)) return false;
            if ($arg < 0) return false;
        }
        return true;
    }
}

if (!function_exists('ref')) {
  function ref($v)
  {
    return $v;
  }
}

if (!function_exists('puts')) {
  function puts()
  {
    $args = func_get_args();
    foreach ($args as $arg) echo $arg . PHP_EOL;
    if (!count($args)) echo PHP_EOL;
  }
}

if (!function_exists('d')) {
  function d() {
    $args = func_get_args();
    foreach ($args as $v) var_dump($v);
  }
}

if (!function_exists('array_val')) {
  function array_val($v, $key, $default = null)
  {
    return isset($v[$key]) ? $v[$key] : $default;
  }
}


if (!function_exists('include_relative')) {
  function include_relative()
  {
    $args = func_get_args();
    while ($path = array_shift($args)) {
      if (substr($path, -1, 1) === '/' || substr($path, -1, 1) === '\\') $path = substr($path, 0, -1);
      $trace = debug_backtrace();
      $dir = dirname($trace[0]['file']);
      $path = $dir . '/' . $path;
      
      if (is_dir($path) && file_exists($path . '/__init__.php')) 
        include_once $path . '/__init__.php';
      elseif (is_dir($path)) foreach (glob($path . '/*.php') as $path)
        include_once $path;
      elseif (!count($args))
        return include_once $path;
      else 
        include_once $path;
    }
  }
}

if (!function_exists('is_main')) {
  function is_main()
  {
    return count(debug_backtrace()) === 1;
  }
}

if (!function_exists('raise')) {
  function raise($e) { throw $e; }
}
