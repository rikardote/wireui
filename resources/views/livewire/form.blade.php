<form>
    <div class="form-group">
        <div class="mb-2">
            <x-select label="Search a Empleado" wire:model.defer="model" searchable="false"
                placeholder="Select some empleado" :async-data="route('medicos.index')" option-label="fullname" option-value="id"
                option-description="false" />
        </div>
        <div class="mb-2">
            <x-select label="Elige la incidencia" wire:change="vacaciones()" wire:model.defer="model"
                searchable="false" placeholder="Incidencias" :async-data="route('codigos_incidencias.index')" option-label="fullDescription"
                option-description="false" option-value="id" />
        </div>

        @if ($vacaciones)
            VACACIONES
        @endif

        <div class="flex gap-2 flex-cols-2">
            <div class="w-1/2">
                <x-datetime-picker label="Fecha Inicial" display-format="DD/MM/YYYY" without-time="true"
                    placeholder="DD/MM/YYYY" wire:model.defer="date" />
            </div>
            <div class="mb-2 w-1/2">
                <x-datetime-picker label="Fecha Final" display-format="DD/MM/YYYY" without-time="true"
                    placeholder="DD/MM/YYYY" wire:model.defer="date" />
            </div>
        </div>

    </div>
    <button type="submit"
        class=" w-full
                            px-6
                            py-2.5
                            bg-blue-600
                            text-white
                            font-medium
                            text-xs
                            leading-tight
                            uppercase
                            rounded
                            shadow-md
                            hover:bg-blue-700 hover:shadow-lg
                            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                            active:bg-blue-800 active:shadow-lg
                            transition
                            duration-150
                            ease-in-out">
        GUARDAR
    </button>
</form>
