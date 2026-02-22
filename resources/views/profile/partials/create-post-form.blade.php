<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-2">Neuen Post erstellen</h2>
    </header>
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <x-input-label for="image" :value="'Bild'" />
            <input id="image" name="image" type="file" class="mt-1 block w-full" accept="image/*" required />
            <img id="preview" src="#" alt="Bildvorschau" style="display:none; max-width: 50%; margin-top: 10px;" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="caption" :value="'Beschreibung'" />
            <textarea id="caption" name="caption" class="mt-1 block w-full" rows="2" required>{{ old('caption') }}</textarea>
            <x-input-error :messages="$errors->get('caption')" class="mt-2" />
        </div>
        <div>
            <x-primary-button>Posten</x-primary-button>
        </div>
    </form>
    <script>
    document.getElementById('image').onchange = evt => {
        const [file] = evt.target.files;
        if (file) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    };
    </script>
</section>
