<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}'s Profil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
                <div class="max-w-xl">
                    <div class="flex items-center space-x-4 mb-4">
                        @if($user->profile_image)
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profilbild" class="w-24 h-24 rounded-full">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" alt="Profilbild" class="w-24 h-24 rounded-full">
                        @endif
                        <div>
                            <div class="text-2xl font-bold">{{ $user->name }}</div>
                            <div class="text-gray-600 text-sm">{{ $user->email }}</div>
                            <div class="text-sm mt-2">
                                <strong>Posts:</strong> {{ $user->posts()->count() }}<br>
                                <strong>Follower:</strong> {{ $user->followers()->count() }}<br>
                                <strong>Folgt:</strong> {{ $user->following()->count() }}
                            </div>
                        </div>
                    </div>
                    @if($user->bio)
                        <div class="mb-2"><strong>Bio:</strong> {{ $user->bio }}</div>
                    @endif
                    @if($user->location)
                        <div class="mb-2"><strong>Ort:</strong> {{ $user->location }}</div>
                    @endif
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Posts von {{ $user->name }}</h3>
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
                            <div class="text-gray-500">Keine Posts vorhanden.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
