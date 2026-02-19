<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Neuen Post erstellen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1" for="image">Bild</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="image" id="image" accept="image/*">
                        <img id="preview" src="#" alt="Bildvorschau" style="display:none; max-width: 300px; margin-top: 10px; border-radius: 0.5rem;" />
                    </div>
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
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1" for="title">Titel</label>
                        <input class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="title" id="title" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1" for="content">Beschreibung</label>
                        <textarea class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="content" id="content" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">Posten</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>