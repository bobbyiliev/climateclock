<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Community Settings') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mr-auto max-w-7xl sm:px-6 lg:px-8">
            @livewire('teams.update-team-name-form', ['team' => $team])

            @if (Gate::check('update', $team))
                @livewire('notifications', ['team' => $team, 'type' => 'discord'])
            @endif

            @if (Gate::check('update', $team))
                @livewire('notifications', ['team' => $team, 'type' => 'slack'])
            @endif

            @livewire('teams.team-member-manager', ['team' => $team])

            @if (Gate::check('delete', $team) && ! $team->personal_team)
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('teams.delete-team-form', ['team' => $team])
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
