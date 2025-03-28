<div>
    @if ($data)
        <div class="action-window">

            <div class="action-body">
                <div class="content-header">
                    <svg wire:click="close()" class="btn-close" data-slot="icon" fill="none" stroke-width="1.5"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                    </svg>
                </div>

                <div class="content-body">

                    <h2 class="title">Detalle de Entrenamiento - {{ get_array_value($data, 'course.NOM') }}:</h2>

                    <p style="margin-top: 20px; font-size: 17px; font-weight: 500;">Sessiones:</p>

                    <ul class="days">
                        <li>
                            Lunes:
                            <span>@include('includes.check-or-not', ['value' => (get_array_value($courseDays, '1'))])</span>
                        </li>
                        <li>
                            Martes:
                            <span>@include('includes.check-or-not', ['value' => (get_array_value($courseDays, '2'))])</span>
                        </li>
                        <li>
                            Miercoles:
                            <span>@include('includes.check-or-not', ['value' => (get_array_value($courseDays, '3'))])</span>
                        </li>
                        <li>
                            Jueves:
                            <span>@include('includes.check-or-not', ['value' => (get_array_value($courseDays, '4'))])</span>
                        </li>
                        <li>
                            Viernes:
                            <span>@include('includes.check-or-not', ['value' => (get_array_value($courseDays, '5'))])</span>
                        </li>
                        <li>
                            Sabado:
                            <span>@include('includes.check-or-not', ['value' => (get_array_value($courseDays, '6'))])</span>
                        </li>
                        <li>
                            Domingo:
                            <span>@include('includes.check-or-not', ['value' => (get_array_value($courseDays, '7'))])</span>
                        </li>
                    </ul>

                    <ul class="row-x2">
                        <li>
                            <strong>Aula:</strong>
                            <span>{{ get_array_value($data, 'course.classroom.NOM') }}</span>
                        </li>

                        <li>
                            <strong>Instructor:</strong>
                            <span>{{ get_array_value($data, 'course.instructor.NOM') }}</span>
                        </li>

                        <li>
                            <strong>Numero de sessiones:</strong>
                            <span>{{ get_array_value($data, 'course.NUMSES') }}</span>
                        </li>

                        <li>
                            <strong>Horas por session:</strong>
                            <span>{{ get_array_value($data, 'course.HORSES') }}</span>
                        </li>

                        <li>
                            <strong>Fecha de inicio:</strong>
                            <span>{{ set_date_format(get_array_value($data, 'course.FECINI')) }}</span>
                        </li>

                        <li>
                            <strong>Fecha Final:</strong>
                            <span>{{ set_date_format(get_array_value($data, 'course.FECFIN')) }}</span>
                        </li>

                        <li>
                            <strong>Hora de inicio:</strong>
                            <span>{{ convert_in_time(get_array_value($data, 'course.HORINI')) }}</span>
                        </li>

                        <li>
                            <strong>Hora Final:</strong>
                            <span>{{ convert_in_time(get_array_value($data, 'course.HORFIN')) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
