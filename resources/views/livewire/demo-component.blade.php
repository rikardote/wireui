<div>


    <x-button.circle label="Open" onclick="$openModal('simpleModal')" primary icon="pencil" />

    <x-modal wire:model.defer="simpleModal">
        <x-card title="Consent Terms">
            <p>
                <x-datetime-picker label="Appointment Date" display-format="DD/MM/YYYY" without-time="true"
                    placeholder="Appointment Date" wire:model.defer="date" />
            </p>
            <div class="mb-3">
                <x-select label="Search a User" wire:model.defer="empleado_id" multiselect placeholder="Select some user"
                    :async-data="route('users.index')" option-label="name" option-description="username" option-value="id" />
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Guardar" wire:click="save()" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-button label="Open" onclick="$openModal('cardModal')" primary />

    <x-modal.card title="Edit Customer" blur show name="myModal" wire:model.defer="cardModal">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

            <div>

            </div>

        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" x-on:click="close" />

                <div class="flex gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" x-on:click="close" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>



    <div>
        <x-select label="Search a Empleado" wire:model.defer="model" searchable="false"
            placeholder="Select some empleado" :async-data="route('medicos.index')" option-label="fullname" option-value="id" />
        <x-button info wire:click="kk()">Save</x-button>
    </div>
</div>
