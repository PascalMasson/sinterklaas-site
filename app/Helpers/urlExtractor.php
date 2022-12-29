<?php

if (!function_exists('extract_url_name')) {
    function extract_url_name($url)
    {
        $url = substr($url, 0, 4) == 'http' ? $url : 'http://' . $url;
        $d = parse_url($url);
        $tmp = explode('.', $d['host']);
        $n = count($tmp);
        if ($n >= 2) {
            if ($n == 4 || ($n == 3 && strlen($tmp[($n - 2)]) < 3)) {
                $d['domainX'] = $tmp[($n - 3)];
            } else {
                $d['domainX'] = $tmp[($n - 2)];
            }
        }
        return $d['domainX'];
    }
}

?>
