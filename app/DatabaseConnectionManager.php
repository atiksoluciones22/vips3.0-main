<?php

namespace App;

use Illuminate\Support\Facades\{DB, Auth, Config};

class DatabaseConnectionManager
{
    public function setConnectionConfig($connection)
    {
        try {
            Config::set('database.connections.sqlsrv.host', $connection->Server);
            Config::set('database.connections.sqlsrv.port', $connection->Port);
            Config::set('database.connections.sqlsrv.database', $connection->BBDD);
            Config::set('database.connections.sqlsrv.username', $connection->User_name);
            Config::set('database.connections.sqlsrv.password', $connection->Password);
            Config::set('database.connections.sqlsrv.prefix', strtoupper(substr($connection->BBDD, -3)));
            DB::purge('sqlsrv');
            DB::reconnect('sqlsrv');
            DB::connection('sqlsrv')->getPDO();
            DB::connection('sqlsrv')->getDatabaseName();
            return true;
        } catch (\Exception $e) {
            Auth::logout();
            return redirect('/login')->with('error', 'Error al conectar con la base de datos.')->withInput();
        }
    }
}
