<div>
    <form method="POST" wire:submit.prevent="submit">
        @csrf

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
