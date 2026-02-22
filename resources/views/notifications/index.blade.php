<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Benachrichtigungen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Neue Follower</h3>
                @forelse($notifications as $notification)
                    <div class="mb-4 border-b pb-2">
                        <span class="font-bold">{{ $notification->data['follower_name'] }}</span> folgt dir jetzt.
                        <span class="text-xs text-gray-500">({{ $notification->created_at->format('d.m.Y H:i') }})</span>
                    </div>
                @empty
                    <div class="text-gray-500">Keine neuen Follower.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
