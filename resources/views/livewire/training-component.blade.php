<div>
    <div class="col-lg-12 p-0">
        <div class="card card-default">
            <h1 class="card-header card-header-border-bottom font-size-20">Entrenamientos</h1>

            <div class="data-table">
                <div class="data-table-header">
                    <div class="data-table-row">
                        <div class="data-table-cell">Curso</div>
                        <div class="data-table-cell">Instructor</div>
                        <div class="data-table-cell">Aula</div>
                        <div class="data-table-cell">Acciones</div>
                    </div>
                </div>

                @foreach($workerCourses as $workerCourse)
                    <div class="data-table-body">
                        <div class="data-table-row">
                            <div class="data-table-cell">{{ get_array_value($workerCourse, 'course.NOM') }}</div>

                            <div class="data-table-cell">{{ get_array_value($workerCourse, 'course.instructor.NOM') }}</div>

                            <div class="data-table-cell">{{ get_array_value($workerCourse, 'course.classroom.NOM') }}</div>

                            <div class="data-table-cell">
                                <button type="submit" wire:click="show({{ json_encode($workerCourse) }})" class="button-link">Ver detalle</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <livewire:show-training-component />
</div>
