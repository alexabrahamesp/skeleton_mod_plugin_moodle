<?php
defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2019121012; // Versión actual en formato fecha (YYYYMMDDXX) XX son digitos de versión.
$plugin->requires  = 2016120502; // Versión de moodle requerida [Se puede obtener del fichero version.php en la raiz].
$plugin->cron      = 0;
$plugin->component = 'mod_ads'; // contexto_nombrepluggin (directorio_nombrecarpeta) [El fichero en /lang/en/ debe llevar el mismo nombre].
$plugin->maturity  = MATURITY_ALPHA; //Opciones: MATURITY_ALPHA, MATURITY_BETA, MATURITY_RC or MATURITY_STABLE
$plugin->release = "0.0.1";
