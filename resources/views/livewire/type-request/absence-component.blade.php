<div>
    <form method="POST" wire:submit.prevent="submit">
        @csrf

        <div class="col-md-12 mb-3 p-0">
            <label for="cause">Causa</label>
            <select name="cause" id="cause" wire:model="cause"
                class="form-control @error('cause') is-invalid @enderror">
                <option value="">Seleccione una acción</option>
                @foreach ($causes as $cause)
                    <option value="{{ $cause->COD }}">{{ $cause->NOM }}</option>
                @endforeach
            </select>
            @error('cause')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12 mb-3 p-0">
            <label for="typeLicense">Tipo de licencia</label>
            <select name="typeLicense" id="typeLicense" wire:model="typeLicense"
                class="form-control @error('typeLicense') is-invalid @enderror">
                <option value="">Seleccione un tipo de acción</option>
                @foreach ($medicalLeaveTypes as $medicalLeaveType)
                    <option value="{{ $medicalLeaveType->COD }}">{{ $medicalLeaveType->NOM }}</option>
                @endforeach
            </select>
            @error('typeLicense')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label for="effectiveDate">Fecha efecto</label>
                <input type="date" name="effectiveDate" id="effectiveDate" wire:model.live="effectiveDate"
                    class="form-control @error('effectiveDate') is-invalid @enderror">
                @error('effectiveDate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="day">Días</label>
                <input type="number" name="day" id="day" wire:model.live="day"
                    class="form-control @error('day') is-invalid @enderror">
                @error('day')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row g-2 mb-3">
            <div class="col-md-6">
                <label for="endDate">Fecha final</label>
                <input type="date" name="endDate" id="endDate" wire:model.live="endDate"
                    class="form-control @error('endDate') is-invalid @enderror" readonly>
                @error('endDate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="typeDay">Tipo de días</label>
                <select name="typeDay" id="typeDay" wire:model="typeDay"
                    class="form-control @error('typeDay') is-invalid @enderror">
                    <option value="">Seleccione un tipo de día</option>
                    @foreach (TYPE_DAYS as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('typeDay')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-12 mb-3 p-0">
            <label for="observation">Observaciones</label>
            <textarea name="observation" id="observation" wire:model="observation"
                class="form-control @error('observation') is-invalid @enderror"></textarea>
            @error('observation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="ladda-button btn btn-primary btn-square btn-ladda" data-style="expand-left">
            <span class="ladda-label">Solicitar</span>
            <span class="ladda-spinner"></span>
        </button>
    </form>
</div>
