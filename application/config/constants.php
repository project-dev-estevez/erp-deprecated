<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

defined('UID_ALMACEN_GENERAL') OR define('UID_ALMACEN_GENERAL', '25839864557600770'); // UID de almacen general
defined('ID_ALMACEN_GENERAL') OR define('ID_ALMACEN_GENERAL', '1'); // ID de almacen general
defined('UID_ALMACEN_ALTO_COSTO') OR define('UID_ALMACEN_ALTO_COSTO', '25839864557600771'); // UID de almacen alto costo
defined('ID_ALMACEN_ALTO_COSTO') OR define('ID_ALMACEN_ALTO_COSTO', '2'); // ID de almacen alto costo
defined('UID_ALMACEN_AREA_MEDICA') OR define('UID_ALMACEN_AREA_MEDICA', '5f3fcafad6a37'); // UID de almacen área médica
defined('UID_ALMACEN_KUALI') OR define('UID_ALMACEN_KUALI', '5e786c1641355'); // UID de almacen Kualis
defined('ID_ALMACEN_AREA_MEDICA') OR define('ID_ALMACEN_AREA_MEDICA', '23'); // ID de almacen alto costo
defined('UID_ALMACEN_AUTOS_CONTROL_VEHICULAR') OR define('UID_ALMACEN_AUTOS_CONTROL_VEHICULAR', '5f52c41ce8a7a'); // UID almacen autos control vehicular
defined('ID_ALMACEN_AUTOS_CONTROL_VEHICULAR') OR define('ID_ALMACEN_AUTOS_CONTROL_VEHICULAR', '28'); // ID almacen autos control vehicular
defined('UID_ALMACEN_REFACCIONES_CONTROL_VEHICULAR') OR define('UID_ALMACEN_REFACCIONES_CONTROL_VEHICULAR', '5f5661ca14d2f'); // UID almacen refacciones control vehicular
defined('ID_ALMACEN_REFACCIONES_CONTROL_VEHICULAR') OR define('ID_ALMACEN_REFACCIONES_CONTROL_VEHICULAR', '29'); // ID almacen refacciones control vehicular
defined('UID_ALMACEN_TARJETAS_GASOLINA') OR define('UID_ALMACEN_TARJETAS_GASOLINA', '7c01113a01212'); // UID almacen refacciones control vehicular
defined('ID_ALMACEN_TARJETAS_GASOLINA') OR define('ID_ALMACEN_TARJETAS_GASOLINA', '122'); // ID almacen refacciones control vehicular
defined('UID_ALMACEN_SISTEMAS') OR define('UID_ALMACEN_SISTEMAS', '5f85e418e5230'); // UID almacen sistemas
defined('ID_ALMACEN_SISTEMAS') OR define('ID_ALMACEN_SISTEMAS', '30'); // ID almacen sistemas



defined('ID_INE') OR define('ID_INE', 1); // UID de almacen general



defined('ID_HERRAMIENTA_ALTO_COSTO') OR define('ID_HERRAMIENTA_ALTO_COSTO', '1'); // ID tbl_categorias herramienta de alto costo
defined('ID_HERRAMIENTA_ALTO_COSTO_ESPECIAL') OR define('ID_HERRAMIENTA_ALTO_COSTO_ESPECIAL', '22'); // ID tbl_categorias herramienta de alto costo especial
defined('ID_CONSUMIBLE_ALTO_COSTO') OR define('ID_CONSUMIBLE_ALTO_COSTO', '3'); // ID tbl_categorias herramienta de alto costo
defined('ID_HERRAMIENTA_MEDIANO_COSTO') OR define('ID_HERRAMIENTA_MEDIANO_COSTO', '5'); // ID tbl_categorias herramienta de alto costo
defined('ID_HERRAMIENTA_HILTI') OR define('ID_HERRAMIENTA_HILTI', '7');
defined('ID_ACTIVO_FIJO') OR define('ID_ACTIVO_FIJO', '16');
defined('ID_HERRAMIENTA') OR define('ID_HERRAMIENTA', '10');


defined('ID_DOCUMENTO_NA') OR define('ID_DOCUMENTO_NA', '4'); // ID ctl_tipo_documento "no aplica"
defined('ID_DOCUMENTO_FACTURA') OR define('ID_DOCUMENTO_FACTURA', '1'); // ID ctl_tipo_documento "Factura"




