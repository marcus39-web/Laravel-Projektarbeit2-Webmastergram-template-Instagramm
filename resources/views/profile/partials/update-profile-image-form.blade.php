<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Profilbild & Username
        </h2>
    </header>

    <div class="mt-4 mb-4">
        @if (Auth::user()->profile_image)
            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profilbild" class="w-24 h-24 rounded-full mb-2">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Profilbild" class="w-24 h-24 rounded-full mb-2">
        @endif
        <div class="text-xl font-bold">{{ Auth::user()->name }}</div>
        <div class="text-sm text-gray-600 mt-2">
            <strong>Posts:</strong> {{ Auth::user()->posts()->count() }}
        </div>
        <div class="text-sm text-gray-600 mt-1">
            <strong>Follower:</strong> {{ Auth::user()->followers()->count() }}
            &nbsp;|&nbsp;
            <strong>Folgt:</strong> {{ Auth::user()->following()->count() }}
        </div>
    </div>

    <form method="post" action="{{ route('profile.image.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="profile_image" value="Neues Profilbild" />
            <input id="profile_image" name="profile_image" type="file" class="mt-1 block w-full" accept="image/*" />
            <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>Speichern</x-primary-button>
        </div>
    </form>
</section>
