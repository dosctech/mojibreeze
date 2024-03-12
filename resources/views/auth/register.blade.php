<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input id="password" class="block pr-10 mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <div class="text-gray-500 cursor-pointer toggle-password" style="margin-top: 5px;">Show Password</div>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="relative">
                <x-text-input id="password_confirmation" class="block pr-10 mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <div class="text-gray-500 cursor-pointer toggle-password" style="margin-top: 5px;">Show Password</div>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Script to Toggle Password Visibility -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePasswords = document.querySelectorAll('.toggle-password');
            const passwordInputs = document.querySelectorAll('input[type="password"]');

            togglePasswords.forEach(function (toggle, index) {
                toggle.addEventListener('click', function () {
                    const type = passwordInputs[index].getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInputs[index].setAttribute('type', type);
                    toggle.textContent = type === 'password' ? 'Show Password' : 'Hide Password';
                });
            });
        });
    </script>
</x-guest-layout>
