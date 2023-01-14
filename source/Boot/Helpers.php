<?php


/**
 * ################
 * ###   DATE   ###
 * ################
 */

/**
 * @param string|null $date
 * @param string $format
 * @return string
 * @throws Exception
 */
function date_fmt(?string $date, string $format = "d/m/Y H\hi"): string
{
    $date = (!empty($date) ? 'now' : $date);
    return (new DateTime($date))->format($format);
}

/**
 * @param string $date
 * @return string
 */
function date_fmt_br(string $date): string
{
    $date = (!empty($date) ? 'now' : $date);
    return (new DateTime($date))->format(CONF_DATE_BR);
}

/**
 * @param string $date
 * @return string
 */
function date_fmt_app(?string $date): string
{
    $date = (!empty($date) ? 'now' : $date);
    return (new DateTime($date))->format(CONF_DATE_APP);
}

/**
 * @param string|null $date
 * @return string|null
 */
function date_fmt_back(?string $date): ?string
{
    if(!$date){
        return null;
    }

    if(strpos($date, ' ')){
        $date = explode(" ", $date);
        return implode("-", array_reverse(explode("/", $date[0]))). " " . $date[1];
    }

    return implode("-", array_reverse(explode("/", $date)));
}


#################
###   POSTS   ###
#################

/**
 * @param string $string
 * @return string
 */
function str_slug(string $string): string
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

    $slug = str_replace(["-----", "----", "---", "--"], "-",
        str_replace(" ", "-",
            trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))
        )
    );
    return $slug;
}



###############
###   URL   ###
###############

/**
 * @param string|null $path
 * @return string
 */
function url(string $path = null): string
{
    if ($_SERVER['HTTP_HOST'] == "localhost"){
        if($path){
            return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST;
    }


    if($path){
        return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE;
    
}

/**
 * ##################
 * ###   ASSETS   ###
 * ##################
 */

function asset(string $path = null, $theme = CONF_VIEW_THEME): string
{
    if ($_SERVER['HTTP_HOST'] == "localhost"){
        if($path){
            return CONF_URL_TEST . "/themes/{$theme}". "/assets/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST. "/themes/{$theme}/assets";
    }
    if($path){
        return CONF_URL_BASE . "/themes/{$theme}" . "/assets/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE. "/themes/{$theme}/assets";
}