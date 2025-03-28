<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\{TypeAction, RequestAction};

class LicenseService
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

            $typeAction = TypeAction::where('COD', get_array_value($data, 'typeAction'))->first();

            $effectiveDate = set_date_format(get_array_value($data, 'effectiveDate'), 'Ymd');

            $day = get_array_value($data, 'day');

            $this->DBService->insert(model: RequestAction::class, array: [[
                'TRAB' => $user->COD,
                'CODACC' => get_array_value($data, 'typeAction'),
                'NIVAPR' => $typeAction->NIVAPR,
                'TIPLM' => get_array_value($data, 'typeLicense'),
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
