<x-app-layout>

    @if(session('error'))
        <div class="bg-red-400 p-5" id="flash-error">
            {{ session('error') }}
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <p>{{ auth()->user()->name }}</p>
                   @if (auth()->user()->can('view_any_user'))
                     <p>ini bisa diakses</p>
                        <p>ini bisa dike</p>
                   @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    setTimeout(() => {
        const flash = document.getElementById('flash-error');
        if (flash) {
            flash.style.transition = 'opacity 0.5s ease';
            flash.style.opacity = 0;
            setTimeout(() => flash.remove(), 500); // Remove from DOM after fade
        }
    }, 3000); // 3 seconds delay before hiding
</script>
