<?php

if (!function_exists('extract_number')) {
    function extract_number($text)
    {
        return preg_replace('/[^0-9]/', '', $text);
    }
}

if (!function_exists('set_date_format')) {
    function set_date_format($date, $format = 'd/m/Y')
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}

if (!function_exists('get_array_value')) {
    function get_array_value($array, $key) {
        if (!is_array($array) || empty($key)) {
            return null;
        }

        // Manejar la notación de punto para acceder a valores anidados
        if (strpos($key, '.') !== false) {
            $keys = explode('.', $key);
            foreach ($keys as $keyPart) {
                if (isset($array[$keyPart])) {
                    $array = $array[$keyPart];
                } else {
                    return null;
                }
            }
            return $array;
        }

        // Devolver el valor si la clave existe
        return $array[$key] ?? null;
    }
}

if (!function_exists('get_date_formatted')) {
    function get_date_formatted($date = null)
    {
        return \Carbon\Carbon::parse($date ?? \Carbon\Carbon::now())->format('Ymd');
    }
}

if (!function_exists('get_toast')) {
    function get_toast()
    {
        if (session('success') || session('error')) {
            toast(session('success') ?? session('error'), session('success') ? 'success' : 'error');
        }
    }
}

if (!function_exists('add_days_to_date')) {
    function add_days_to_date($date, $days)
    {
        return date('Y-m-d', strtotime("+" . $days . " days", strtotime($date)));
    }
}


if (!function_exists('convert_in_time')) {
    function convert_in_time($numero) {
        $horas = floor($numero / 100);
        $minutos = $numero % 100;

        // Formatear la hora en formato HH:mm
        return sprintf('%02d:%02d', $horas, $minutos);
    }
}
