<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col items-start">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
                {{ __('Profile') }}
            </h2>
            @include('profile.partials.update-profile-image-form')
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">



            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
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
        </div>
    </div>
</x-app-layout>
