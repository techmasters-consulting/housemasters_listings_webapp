<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    view ur properties
                    request for your properties

                    view ur request
                    properties marching ur request

                    seekers will only see post where assignee = agent
                    landlords will see oly there own properties
                    agents will see new post from landlord to be picked up for assigment


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
