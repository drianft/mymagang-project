<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Additional Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your extra profile information here.') }}
    </x-slot>

    <x-slot name="form">
        @if (Auth::user()->roles === 'applier')
            <!-- Religion -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="religion" value="{{ __('Religion') }}" />
                <x-input id="religion" type="text" class="mt-1 block w-full" wire:model.defer="religion" />
                <x-input-error for="religion" class="mt-2" />
            </div>

            <!-- Education -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="education" value="{{ __('Education') }}" />
                <x-input id="education" type="text" class="mt-1 block w-full" wire:model.defer="education" />
                <x-input-error for="education" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="cv_url" value="CV (PDF/DOCX)" />

                @if ($cv_url)
                    {{-- Jika sudah ada CV --}}
                    <a href="{{ Storage::url($cv_url) }}" target="_blank" class="text-blue-500 underline">
                        Lihat CV Kamu
                    </a>
                    <button wire:click="deleteCV" type="button" class="ml-4 text-red-600 hover:underline">
                        Hapus CV
                    </button>
                @else
                    {{-- Jika belum ada CV, tampilkan input upload --}}
                    <x-input id="cv_url" type="file" class="mt-1 block w-full"
                             wire:model="cv_file" accept=".pdf,.doc,.docx" />
                    <x-input-error for="cv_url" class="mt-2" />
                @endif
            </div>


        @elseif (Auth::user()->roles === 'company')
            <!-- Industry -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="industry" value="{{ __('Industry') }}" />
                <x-input id="industry" type="text" class="mt-1 block w-full" wire:model.defer="industry" />
                <x-input-error for="industry" class="mt-2" />
            </div>

            <!-- Company Description -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="company_description" value="{{ __('Company Description') }}" />
                <textarea id="company_description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" wire:model.defer="company_description"></textarea>
                <x-input-error for="company_description" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-action-message on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
