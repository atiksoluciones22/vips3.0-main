<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'sqlsrv';

    protected $table = "008";

    protected $primaryKey = 'COD';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'EMAIL',
        'CONWEB',
    ];

    protected $hidden = [
        'CONWEB',
    ];

    public function getAuthPassword()
    {
        return $this->CONWEB;
    }

    public function getEmailForPasswordReset() {
        return $this->EMAIL;
    }

    public function company() {
        return $this->belongsTo(Company::class, 'COMP', 'COD');
    }

    public function workstation() {
        return $this->belongsTo(Workstation::class, 'PUESTO', 'COD');
    }

    public function branch() {
        return $this->belongsTo(Branch::class, 'SUC', 'COD');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'DTO', 'COD');
    }

    public function salary_band() {
        return $this->belongsTo(SalaryBand::class, 'BANSAL', 'COD');
    }
}
