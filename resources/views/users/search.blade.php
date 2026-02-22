<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nutzer suchen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="GET" action="{{ route('users.search') }}" class="flex space-x-2 mb-4">
                    <input type="text" name="q" placeholder="Nutzername suchen..." class="border rounded px-2 py-1 w-full" value="{{ request('q') }}">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">Suchen</button>
                </form>
                @if(isset($searchResults))
                    <div>
                        <h3 class="font-semibold mb-2">Suchergebnisse:</h3>
                        @forelse($searchResults as $user)
                            <div class="border-b py-1 flex items-center justify-between">
                                <span>
                                    <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:underline">{{ $user->name }}</a>
                                    ({{ $user->email }})
                                </span>
                                @if(auth()->id() !== $user->id)
                                    @if(auth()->user()->following->contains($user->id))
                                        <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Entfolgen</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('users.follow', $user->id) }}">
                                            @csrf
                                            <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded text-xs">Folgen</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        @empty
                            <div class="text-gray-500">Keine Nutzer gefunden.</div>
                        @endforelse
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
