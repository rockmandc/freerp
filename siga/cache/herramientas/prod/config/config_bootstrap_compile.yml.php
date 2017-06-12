<?php
// auto-generated by sfCompileConfigHandler
// date: 2017/02/13 05:35:01


$sf_symfony_lib_dir = sfConfig::get('sf_symfony_lib_dir');
if (!sfConfig::get('sf_in_bootstrap'))
{
    require_once($sf_symfony_lib_dir.'/util/sfYaml.class.php');
    require_once($sf_symfony_lib_dir.'/cache/sfCache.class.php');
  require_once($sf_symfony_lib_dir.'/cache/sfFileCache.class.php');
    require_once($sf_symfony_lib_dir.'/config/sfConfigCache.class.php');
  require_once($sf_symfony_lib_dir.'/config/sfConfigHandler.class.php');
  require_once($sf_symfony_lib_dir.'/config/sfYamlConfigHandler.class.php');
  require_once($sf_symfony_lib_dir.'/config/sfAutoloadConfigHandler.class.php');
  require_once($sf_symfony_lib_dir.'/config/sfRootConfigHandler.class.php');
  require_once($sf_symfony_lib_dir.'/config/sfLoader.class.php');
    require_once($sf_symfony_lib_dir.'/exception/sfException.class.php');
  require_once($sf_symfony_lib_dir.'/exception/sfAutoloadException.class.php');
  require_once($sf_symfony_lib_dir.'/exception/sfCacheException.class.php');
  require_once($sf_symfony_lib_dir.'/exception/sfConfigurationException.class.php');
  require_once($sf_symfony_lib_dir.'/exception/sfParseException.class.php');
    require_once($sf_symfony_lib_dir.'/util/sfParameterHolder.class.php');
}
else
{
  require_once($sf_symfony_lib_dir.'/config/sfConfigCache.class.php');
}
sfCore::initAutoload();
try
{
  $configCache = sfConfigCache::getInstance();
    if (function_exists('date_default_timezone_get'))
  {
    if ($default_timezone = sfConfig::get('sf_default_timezone'))
    {
      date_default_timezone_set($default_timezone);
    }
    else if (sfConfig::get('sf_force_default_timezone', true))
    {
      date_default_timezone_set(@date_default_timezone_get());
    }
  }
    $sf_app_config_dir_name = sfConfig::get('sf_app_config_dir_name');
  $sf_debug = sfConfig::get('sf_debug');
    if ($sf_debug)
  {
    require_once($sf_symfony_lib_dir.'/debug/sfTimerManager.class.php');
    require_once($sf_symfony_lib_dir.'/debug/sfTimer.class.php');
  }
    // 'config/settings.yml' config file
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2017/02/13 05:35:00
sfConfig::add(array(
  'sf_default_module' => 'default',
  'sf_default_action' => 'index',
  'sf_error_404_module' => 'generales',
  'sf_error_404_action' => 'error404',
  'sf_login_module' => 'generales',
  'sf_login_action' => 'nologin',
  'sf_secure_module' => 'generales',
  'sf_secure_action' => 'nocredentials',
  'sf_module_disabled_module' => 'generales',
  'sf_module_disabled_action' => 'disabled',
  'sf_unavailable_module' => 'generales',
  'sf_unavailable_action' => 'disabled',
  'sf_available' => true,
  'sf_use_database' => true,
  'sf_use_security' => true,
  'sf_use_flash' => true,
  'sf_i18n' => true,
  'sf_check_symfony_version' => false,
  'sf_use_process_cache' => true,
  'sf_compressed' => false,
  'sf_check_lock' => false,
  'sf_escaping_strategy' => 'bc',
  'sf_escaping_method' => 'ESC_ENTITIES',
  'sf_suffix' => '.',
  'sf_no_script_name' => false,
  'sf_validation_error_prefix' => ' &darr;&nbsp;',
  'sf_validation_error_suffix' => ' &nbsp;&darr;',
  'sf_validation_error_class' => 'form_error',
  'sf_validation_error_id_prefix' => 'error_for_',
  'sf_cache' => false,
  'sf_etag' => true,
  'sf_lazy_cache_key' => false,
  'sf_web_debug' => false,
  'sf_error_reporting' => 341,
  'sf_rich_text_js_dir' => 'js/tiny_mce',
  'sf_prototype_web_dir' => '/sf/prototype',
  'sf_admin_web_dir' => '/sf/sf_admin',
  'sf_web_debug_web_dir' => '/sf/sf_web_debug',
  'sf_calendar_web_dir' => '/sf/calendar',
  'sf_standard_helpers' => array (
  0 => 'Partial',
  1 => 'Cache',
  2 => 'Form',
  3 => 'SubmitClick',
),
  'sf_enabled_modules' => array (
  0 => 'default',
),
  'sf_charset' => 'utf-8',
  'sf_strip_comments' => true,
  'sf_autoloading_functions' => NULL,
  'sf_timeout' => 3600,
  'sf_max_forwards' => 5,
  'sf_path_info_array' => 'SERVER',
  'sf_path_info_key' => 'PATH_INFO',
  'sf_url_format' => 'PATH',
  'sf_orm' => 'propel',
));
  if (sfConfig::get('sf_logging_enabled', true))
  {
    // 'config/logging.yml' config file
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2017/02/13 05:35:00
sfConfig::add(array(
  'sf_logging_enabled' => false,
  'sf_logging_level' => 'err',
  'sf_logging_rotate' => true,
  'sf_logging_period' => 7,
  'sf_logging_history' => 10,
  'sf_logging_purge' => false,
));
  }
  if ($file = $configCache->checkConfig($sf_app_config_dir_name.'/app.yml', true))
  {
    include($file);
  }
  if (sfConfig::get('sf_i18n'))
  {
    // 'config/i18n.yml' config file
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2017/02/13 05:35:00
sfConfig::add(array(
  'sf_i18n_default_culture' => 'en_US',
  'sf_i18n_source' => 'XLIFF',
  'sf_i18n_debug' => false,
  'sf_i18n_cache' => true,
  'sf_i18n_untranslated_prefix' => '[T]',
  'sf_i18n_untranslated_suffix' => '[/T]',
));
  }
    foreach ((array) sfConfig::get('sf_autoloading_functions', array()) as $callable)
  {
    sfCore::addAutoloadCallable($callable);
  }
    ini_set('display_errors', $sf_debug ? 'on' : 'off');
  error_reporting(sfConfig::get('sf_error_reporting'));
    if (!sfConfig::get('sf_in_bootstrap') && !$sf_debug && !sfConfig::get('sf_test'))
  {
    $configCache->checkConfig($sf_app_config_dir_name.'/bootstrap_compile.yml');
  }
      if (!$sf_debug && !sfConfig::get('sf_test'))
  {
    $core_classes = $sf_app_config_dir_name.'/core_compile.yml';
    $configCache->import($core_classes, false);
  }
  // 'config/php.yml' config file
// auto-generated by sfPhpConfigHandler
// date: 2017/02/13 05:35:01
ini_set('log_errors', '1');
ini_set('arg_separator.output', '&amp;');
ini_set('memory_limit', '512M');
ini_set('display_errors', '1');
ini_set('session.name', 'cidesa');
ini_set('max_input_vars', '10000');
  // 'config/routing.yml' config file
// auto-generated by sfRoutingConfigHandler
// date: 2017/02/13 05:35:01
$routes = sfRouting::getInstance();
$routes->setRoutes(
array (
  'homepage' =>
  array (
    0 => '/',
    1 => '/^[\\/]*$/',
    2 =>
    array (
    ),
    3 =>
    array (
    ),
    4 =>
    array (
    ),
    5 =>
    array (
    ),
    6 => '',
  ),
  'catalogobuscar' =>
  array (
    0 => '/generales/catalogobuscar',
    1 => '#^/generales/catalogobuscar$#',
    2 =>
    array (
    ),
    3 =>
    array (
    ),
    4 =>
    array (
    ),
    5 =>
    array (
    ),
    6 => '',
  ),
  'catalogobuscarcheck' =>
  array (
    0 => '/generales/catalogobuscarcheck',
    1 => '#^/generales/catalogobuscarcheck$#',
    2 =>
    array (
    ),
    3 =>
    array (
    ),
    4 =>
    array (
    ),
    5 =>
    array (
    ),
    6 => '',
  ),
  'catalogo' =>
  array (
    0 => '/generales/catalogo',
    1 => '#^/generales/catalogo$#',
    2 =>
    array (
    ),
    3 =>
    array (
    ),
    4 =>
    array (
    ),
    5 =>
    array (
    ),
    6 => '',
  ),
  'autocomplete' =>
  array (
    0 => '/generales/autocomplete',
    1 => '#^/generales/autocomplete$#',
    2 =>
    array (
    ),
    3 =>
    array (
    ),
    4 =>
    array (
    ),
    5 =>
    array (
    ),
    6 => '',
  ),
  'default_symfony' =>
  array (
    0 => '/symfony/:action/*',
    1 => '#^/symfony(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 =>
    array (
      0 => 'action',
    ),
    3 =>
    array (
      'action' => 1,
    ),
    4 =>
    array (
      'module' => 'default',
    ),
    5 =>
    array (
    ),
    6 => '',
  ),
  'default_index' =>
  array (
    0 => '/:module',
    1 => '#^(?:\\/([^\\/]+))?$#',
    2 =>
    array (
      0 => 'module',
    ),
    3 =>
    array (
      'module' => 1,
    ),
    4 =>
    array (
      'action' => 'index',
    ),
    5 =>
    array (
    ),
    6 => '',
  ),
  'default' =>
  array (
    0 => '/:module/:action/*',
    1 => '#^(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 =>
    array (
      0 => 'module',
      1 => 'action',
    ),
    3 =>
    array (
      'module' => 1,
      'action' => 1,
    ),
    4 =>
    array (
    ),
    5 =>
    array (
    ),
    6 => '',
  ),
)
);
    sfLoader::loadPluginConfig();
    ob_start(sfConfig::get('sf_compressed') ? 'ob_gzhandler' : null);
}
catch (sfException $e)
{
  $e->printStackTrace();
}
catch (Exception $e)
{
  if (sfConfig::get('sf_test'))
  {
    throw $e;
  }
  try
  {
        $sfException = new sfException();
    $sfException->printStackTrace($e);
  }
  catch (Exception $e)
  {
    header('HTTP/1.0 500 Internal Server Error');
  }
}
