<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-red-700 flex items-center gap-2">
            <i class="fas fa-exclamation-triangle text-red-500"></i>
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div class="border border-red-300 bg-red-50 rounded-lg p-4">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="w-full py-2 text-lg"
        >
            <i class="fas fa-user-slash me-2"></i>{{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <div class="flex items-center gap-3 mb-3">
                <i class="fas fa-exclamation-circle text-3xl text-red-500"></i>
                <h2 class="text-lg font-bold text-red-700">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>
            </div>

            <p class="mt-1 text-sm text-gray-700 mb-4">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 border border-red-300"
                    placeholder="{{ __('Password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-2">
                <x-secondary-button x-on:click="$dispatch('close')">
                    <i class="fas fa-times me-1"></i>{{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="ms-3">
                    <i class="fas fa-trash me-1"></i>{{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
