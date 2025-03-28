<div>
    <div class="col-lg-12 p-0">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Realizar una solicitud</h2>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="col-md-12 mb-3 p-0">
                        <label for="type">Tipo de solicitud</label>
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror"
                            wire:model.change="selectedType">
                            <option value="">Seleccione un tipo de solicitud</option>
                            @foreach (TYPES_REQUEST as $key => $value)
                                <option value="{{ $key }}" {{ $selectedType == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                        @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3 p-0">
                        @include('livewire.components.type-request-component', ['type' => $selectedType])
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
