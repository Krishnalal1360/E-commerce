<x-app-layout>
    {{--  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    --}}

        <section class="wsus__product mt_145 pb_100">
            <div class="container">
                {{-- 
                <div class="alert alert-info">Welcome To Dashboard!</div>
                --}}
                
                    <div class="">
                        <div class="">
                        @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                    <br>
                    <div class="">
                        <div class="">
                        @include('profile.partials.update-password-form')
                        </div>
                    </div>
                
                {{-- 
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                    </div>
                --}}
                </div>
            </div>
        </section>    

    {{-- 
    <div class="py-12">
    </div>
    --}}
</x-app-layout>
