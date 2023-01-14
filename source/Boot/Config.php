<?php

####################
#### DB CONNECT ####
####################
define("CONF_DB_HOST","localhost");
define("CONF_DB_NAME","api");
define("CONF_DB_USER","root");
define("CONF_DB_PASS","");

####################
### PROJECT URLs ###
####################
define("CONF_URL_BASE", "https://www.localhost/newfullstackphp");
define("CONF_URL_TEST", "http://localhost/apiblog");
define("CONF_URL_ADMIN", "/admin");


##############
### UPLOAD ###
##############
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

##############
### IMAGES ###
##############
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

###############
### MESSAGE ###
###############
define("CONF_MESSAGE_CLASS", "message");
define("CONF_MESSAGE_INFO", "info icon-info");
define("CONF_MESSAGE_SUCCESS", "success icon-check-square-o");
define("CONF_MESSAGE_WARNING", "warning icon-warning");
define("CONF_MESSAGE_ERROR", "error icon-warning");


#############
### DATES ###
#############
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");


##############
#### VIEW ####
##############
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", 'web');
define("CONF_VIEW_ASSET", 'asset');
define("CONF_VIEW_APP", 'cafeapp');
define("CONF_VIEW_ADM", 'cafeadm');



