<?php

use Shared\Traits\EnumerableTrait;

enum TypesRequest: int
{
    use EnumerableTrait;

    case LICENSE = 5; // licencia
    case VACATION = 6; // Vacaciones
    case ABSENCE = 12; // ausencia
    case CHANGE_ACCOMMODATION = 13; // cambio de alojamiento
    case UNIFORMITY = 14; // uniformidad
    case CARD = 15; // tarjeta
}

define("TYPES_REQUEST", [
    5 => "Licencia",
    6 => "vacaciones",
    12 => "Ausencia",
    13 => "Cambio de alojamiento",
    14 => "Uniformidad",
    15 => "Carta"
]);


define("TYPE_DAYS", [
    1 => "Días laborales",
    2 => "Días calendario",
    3 => "Semanas",
    4 => "Meses"
]);
