<?php

namespace App\Services;

use App\Models\Request484;
use Illuminate\Support\Facades\DB;

class UniformityService
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

            $this->DBService->insert(model: Request484::class, array: [[
                'TRAB' => $user->COD,
                'NOMCOM' => $user->NOMCOM,
                'COMP' => $user->COMP,
                'SUC' => $user->SUC,
                'DTO' => $user->DTO,
                'SECC' => $user->SECC,
                'UNI' => $user->UNI,
                'PUESTO' => $user->PUESTO,
                'TEXTO' => get_array_value($data, 'observation'),
            ]], wheres: ['TRAB' => $user->COD]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
