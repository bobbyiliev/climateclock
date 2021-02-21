<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-bold leading-tight text-gray-700">
            {{ auth()->user()->currentTeam->name }}
        </h2>
    </x-slot>
    {{-- Climate Clock Integration: https://climateclock.world/widget --}}
    <script src="https://climateclock.world/widget-v2.js" async></script>
    <script src="https://climateclock.world/flatten.js" async></script>
    <climate-clock />

</x-app-layout>
