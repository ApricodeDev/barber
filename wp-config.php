<?php

define('DB_NAME',               'bogdan89_asn');
define('DB_USER',               'bogdan89_asn');
define('DB_PASSWORD',           'cz5rkvav');
define('DB_HOST',               'bogdan89.mysql.tools');
define('DB_CHARSET',            'utf8mb4');
define('DB_COLLATE',            '');

define('WP_DEBUG',              true);
define('AUTOSAVE_INTERVAL',     600);
define('WP_POST_REVISIONS',     false);
define('WP_DEFAULT_THEME',      'barber');
define('WPCF7_AUTOP',           false);

/* Multisite */
define('WP_ALLOW_MULTISITE',    true);
define('MULTISITE',             true);
define('SUBDOMAIN_INSTALL',     true);
define('DOMAIN_CURRENT_SITE',   'asn.org.ua');
define('PATH_CURRENT_SITE',     '/');
define('SITE_ID_CURRENT_SITE',  1);
define('BLOG_ID_CURRENT_SITE',  1);

define('AUTH_KEY',              'x,G3@wYmYamMWxUsKuNs:&~$q9)#%k~!1}r?GsNt<2T^rvwYhJjn>sy5KJNJPE4 ');
define('SECURE_AUTH_KEY',       '6-:nG#8<y3S258W/aX)j?59^|tP.a^xLFV}{k)U,^Tp|U;r1d;qw W5@]8}nVG<L');
define('LOGGED_IN_KEY',         'xI89NL%Of&3zLG %=<aEjm`|}P6Ir+?F_K+.}W?X(50Z>l.wYE}KfT]`o|LqKha,');
define('NONCE_KEY',             'mdPSRrC#0x[3[6:EqRYpTSwiO@.Rf0Ejhbs/*2)l0|y@{ sih;{1:C!%5YL+t%zX');
define('AUTH_SALT',             '1( j0s!2(c< 8yzr+S2tli{U+Ub$aV~AT7n/qE8Pu0k#*|5=^H6QPG$[wa(1R:-]');
define('SECURE_AUTH_SALT',      'i5e{T1^{bi5U/L!t4l::/up$MM#e8=sbn2%[&sDj t!aX[tvbGB|]E^tlaF$BNTI');
define('LOGGED_IN_SALT',        'Nz3^*?=pGXZ`^uu8wNrQt_(v=.eA{$S%gYm_%bc6}h ,iOtd4#!!PsOec%Q+s.Vg');
define('NONCE_SALT',            '.HrY7C<97[J^SrflW;ETTuPLg$0r)@ueO^UOSF$0v;<k4m&f-W7|^cA>}+&fVB3v');

$table_prefix  = 'brsh_';

if(!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__).'/');

require_once(ABSPATH . 'wp-settings.php');
