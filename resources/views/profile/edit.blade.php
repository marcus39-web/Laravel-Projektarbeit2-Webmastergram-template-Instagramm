<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
                <div class="max-w-xl">
                    <form method="GET" action="{{ route('profile.search') }}" class="flex space-x-2">
                        <input type="text" name="q" placeholder="Nutzername suchen..." class="border rounded px-2 py-1 w-full" value="{{ request('q') }}">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">Suchen</button>
                    </form>
                    @if(isset($searchResults))
                        <div class="mt-4">
                            <h3 class="font-semibold mb-2">Suchergebnisse:</h3>
                            @forelse($searchResults as $user)
                                <div class="border-b py-1">{{ $user->name }} ({{ $user->email }})</div>
                            @empty
                                <div class="text-gray-500">Keine Nutzer gefunden.</div>
                            @endforelse
                        </div>
                    @endif
                </div>
            </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-image-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.create-post-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Deine Posts</h3>
                    <div class="grid grid-cols-1 gap-4">
                        @forelse($posts as $post)
                            <div class="border rounded p-2">
                                <div class="font-bold">{{ $post->title }}</div>
                                <div class="text-sm text-gray-600">{{ $post->created_at->format('d.m.Y H:i') }}</div>
                                <div>{{ $post->content }}</div>
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post-Bild" class="w-full max-h-64 object-cover rounded mb-2">
                                @endif
                            </div>
                        @empty
                            <div class="text-gray-500">Du hast noch keine Posts erstellt.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
