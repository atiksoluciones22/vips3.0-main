<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\{TypeAction, RequestAction};

class VacationService
{
    protected $DBService;

    public function __construct()
    {
        $this->DBService = new DBService;
    }

    public function run($data)
    {
        try {
            DB::beginTransaction();

            $user = auth()->user();

            $typeAction = TypeAction::where('COD', 60000)->first();

            $NIVAPR = $typeAction ? $typeAction->NIVAPR + 1 : 0;

            $effectiveDate = set_date_format(get_array_value($data, 'effectiveDate'), 'Ymd');

            $day = get_array_value($data, 'day');

            $this->DBService->insert(model: RequestAction::class, array: [[
                'TRAB' => $user->COD,
                'CODACC' => 60000,
                'NIVAPR' => $NIVAPR,
                'TEXBEN' => get_array_value($data, 'periodName'),
                'FECSOL' => get_date_formatted(),
                'DIAS' => $day,
                'TIPDIA' => get_array_value($data, 'typeDay'),
                'DIAFIN' => set_date_format(add_days_to_date($effectiveDate, $day), 'Ymd'),
                'FECEFE' => $effectiveDate,
                'COMP' => $user->COMP,
                'SUC' => $user->SUC,
                'DTO' => $user->DTO,
                'SECC' => $user->SECC,
                'UNI' => $user->UNI,
                'OBS' => get_array_value($data, 'observation'),
                'DESSAL' => '*',
                'APLDES' => '*',
                'DESPRO' => '*'
            ]], wheres: ['TRAB' => $user->COD]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
