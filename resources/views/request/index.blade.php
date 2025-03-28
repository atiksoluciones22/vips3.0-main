@extends('layouts.app')

@section('content')
    <div class="col-lg-12 p-0">
        <div class="card card-default">
            <h1 class="card-header card-header-border-bottom font-size-20">Solicitudes</h1>

            <div class="d-flex p-4 justify-content-end">
                <a href="{{ route('requests.create') }}">
                    <button class="btn btn-success btn-square">Solicitar nueva</button>
                </a>
            </div>

            <div class="data-table ">
                <div class="data-table-header">
                    <div class="data-table-row">
                        <div class="data-table-cell">Tipo de solicitud</div>
                        <div class="data-table-cell">Estado</div>
                        <div class="data-table-cell">Fecha efecto</div>
                        <div class="data-table-cell">Acciones</div>
                    </div>
                </div>

                <div class="data-table-body">
                    <div class="data-table-row">
                        <div class="data-table-cell">Example</div>

                        <div class="data-table-cell">pendiente</div>

                        <div class="data-table-cell">2021-01-01</div>

                        <div class="data-table-cell">
                            <button type="submit" class="button-link">Desestimar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
