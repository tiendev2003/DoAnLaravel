<x-jet-form-section submit="updatePassword">
<x-slot name="title">
                            <h3 class="mt-3" >Thay đổi mật khẩu</h3>
</x-slot>
<x-slot name="description"></x-slot>

 

  <x-slot name="form" >
        <div class="form-group col-md-12">
            <x-jet-label for="current_password" value="{{ __('Mật khẩu cũ ') }}" />
            <x-jet-input id="current_password" type="password" wire:model.defer="state.current_password"
                autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="form-group col-md-12">
            <x-jet-label for="password" value="{{ __('Mật khẩu mới ') }}" />
            <x-jet-input id="password" type="password" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="form-group col-md-12">
            <x-jet-label for="password_confirmation" value="{{ __('Nhập lại mật khẩu') }}" />
            <x-jet-input id="password_confirmation" type="password" wire:model.defer="state.password_confirmation"
                autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
       


    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button class="btn btn-primary">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
