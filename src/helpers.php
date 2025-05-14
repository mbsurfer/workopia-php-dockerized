<?php

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
function basePath(string $path = ''): string
{
  return __DIR__ . '/' . $path;
}

/**
 * Load a view
 *
 * @param string $name
 * @param array $data
 * @return void
 */
function loadView(string $name, array $data = [])
{
  $viewPath = basePath("App/views/{$name}.view.php");

  if (file_exists($viewPath)) {
    extract($data);
    require $viewPath;
  } else {
    echo "View '{$name} not found!'";
  }
}


/**
 * Load a partial
 *
 * @param string $name
 * @param array $data
 * @return void
 */
function loadPartial(string $name = '', array $data = [])
{
  $partialPath = basePath("App/views/partials/{$name}.php");

  if (file_exists($partialPath)) {
    extract($data);
    require $partialPath;
  } else {
    echo "Partial '{$name} not found!'";
  }
}

/**
 * Inspect a value(s)
 * 
 * @param mixed $value
 * @return void
 */
function inspect($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}

/**
 * Inspect a value(s) and die
 * 
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
  echo '<pre>';
  die(var_dump($value));
  echo '</pre>';
}

/**
 * Format salary
 * 
 * @param string $salary
 * @return string Formatted Salary
 */
function formatSalary(string $salary): string
{
  return '$' . number_format(floatval($salary));
}

/**
 * Sanitize Data
 * 
 * @param string $dirty
 * @return string
 */
function sanitize(string $dirty): string
{
  return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * Redirect to a given url
 * 
 * @param string $url
 * @return void
 */
function redirect(string $url)
{
  header("Location: {$url}");
  exit;
}
