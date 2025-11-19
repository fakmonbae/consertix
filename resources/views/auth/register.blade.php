<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" 
                name="name" 
                type="text" 
                class="block mt-1 w-full"
                :value="old('name')" 
                required 
                autofocus 
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" 
                name="email" 
                type="email" 
                class="block mt-1 w-full"
                :value="old('email')" 
                required 
                autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Phone --}}
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" 
                name="phone" 
                type="tel"
                class="block mt-1 w-full"
                :value="old('phone')" 
                required 
                autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        {{-- Role --}}
        <div class="mt-4">
            <x-input-label for="role" :value="__('Daftar sebagai')" />
            <select id="role" 
                name="role" 
                required
                class="block mt-1 w-full rounded-md border-gray-300 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Pilih Peran --</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                <option value="eo" {{ old('role') == 'eo' ? 'selected' : '' }}>Event Organizer</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" 
                name="password" 
                type="password"
                class="block mt-1 w-full" 
                required 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Confirm Password --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" 
                name="password_confirmation"
                type="password" 
                class="block mt-1 w-full"
                required 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Submit --}}
        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('login') }}"
                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
