<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Timeline
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Timeline -->
            <div class="md:col-span-2 space-y-6">
                @forelse($posts as $post)
                    <div class="bg-white shadow rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <a href="{{ route('users.show', $post->user->id) }}" class="font-bold text-blue-600 hover:underline mr-2">{{ $post->user->name }}</a>
                        </div>
                        <div class="mb-2">{{ $post->caption ?? $post->content }}</div>
                        @if($post->image)
                            <div class="flex justify-center mb-2">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post-Bild"
                                    class="w-24 h-24 object-cover rounded-xl shadow border border-gray-200">
                            </div>
                        @endif
                        <div class="flex items-center justify-between mt-2 text-sm text-gray-600">
                            <div>
                                <span class="font-semibold">Likes:</span> {{ $post->likes->count() }}
                            </div>
                            <div>
                                <span class="font-semibold">Hochgeladen am:</span> {{ $post->created_at->format('d.m.Y H:i') }}
                            </div>
                        </div>
                        <div class="flex items-center mt-2">
                            <form action="{{ $post->likes->contains(auth()->id()) ? route('posts.unlike', $post->id) : route('posts.like', $post->id) }}" method="POST" class="mr-2">
                                @csrf
                                @if($post->likes->contains(auth()->id()))
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">♥ Entliken</button>
                                @else
                                    <button type="submit" class="text-gray-500 hover:text-pink-500 font-semibold">♡ Liken</button>
                                @endif
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-500">Noch keine Posts in deiner Timeline.</div>
                @endforelse
                <div>
                    {{ $posts->links() }}
                </div>
            </div>
            <!-- Gefolgte Nutzer -->
            <div class="bg-white shadow rounded-lg p-4 h-fit">
                <h3 class="font-semibold text-lg mb-3">Gefolgte Nutzer</h3>
                @if($followedUsers->count())
                    <ul class="space-y-2">
                        @foreach($followedUsers as $followed)
                            <li>
                                <a href="{{ route('users.show', $followed->id) }}" class="text-blue-600 hover:underline flex items-center">
                                    @if($followed->profile_image)
                                        <img src="{{ asset('storage/' . $followed->profile_image) }}" alt="Profilbild" class="w-8 h-8 rounded-full mr-2">
                                    @else
                                        <span class="inline-block w-8 h-8 rounded-full bg-gray-200 text-center mr-2 flex items-center justify-center">{{ strtoupper(substr($followed->name,0,1)) }}</span>
                                    @endif
                                    <span>{{ $followed->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-gray-500">Du folgst noch niemandem.</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
