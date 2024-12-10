<x-app-layout>
    @php
        $alertMessage = '';

        if (session('create')) {
            $alertMessage = session('create');
        } elseif (session('edit')) {
            $alertMessage = session('edit');
        } elseif (session('delete')) {
            $alertMessage = session('delete');
        }
    @endphp

    @if ($alertMessage)
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 max-w-7xl mx-auto mt-6"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ $alertMessage }}
            </div>
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Tags
        </h2>
    </x-slot>

    <div class="bg-white max-w-7xl mx-auto border-2 rounded-md mt-6 p-6">

        <div class="flex flex-row px-8 w-full gap-10 mb-5">
            <div class="flex-1">
                <div class="max-w-7xl mx-auto ">
                    <form class="w-full mx-auto">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search..." name="search" required value="{{ request('search') }}" />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex-1">
                <div class="max-w-7xl mx-auto ">
                    <form class="w-full mx-auto" method="post" action="{{ route('tag.store') }}">
                        @csrf
                        <label for="add-category" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Add</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="add-category"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Add New Tag" name="name" required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Tambah</button>
                        </div>
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
            </div>
        </div>

        @if ($tags->isEmpty())
            <h1 class="text-center text-2xl mt-4">Tidak ada Tag yang terdaftar</h1>
        @else
            <div class="relative overflow-x-auto max-w-7xl mx-auto px-8">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 border-2">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-1/12 text-center">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 w-9/12">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 w-2/12 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $index => $tag)
                            <tr class="bg-white border-b">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                    {{ $index + 1 + ($tags->currentPage() - 1) * $tags->perPage() }}
                                </th>
                                <td class="px-6 py-4 font-medium text-xl text-black tag-name"
                                    data-tag-id="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('tags.show', $tag->slug) }}">
                                        <button type="button"
                                            class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-2 me-2 mb-2 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                            </svg>
                                        </button>
                                    </a>
                                    <button type="button"
                                        class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm p-2 me-2 mb-2 focus:outline-none edit-button">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('tag.delete', $tag->slug) }}" method="post"
                                        class="inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Yakin menghapus kategori ?')"
                                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2 me-2 mb-2 focus:outline-none">
                                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="py-4">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex justify-between items-center mt-4 bg-white rounded-lg p-4 border-2">
                            <div class="text-sm text-gray-600">
                                <!-- Display current page item range -->
                                Menampilkan tag {{ $tags->firstItem() }} hingga {{ $tags->lastItem() }}
                                dari
                                {{ $tags->total() }} tag
                            </div>

                            <!-- Custom Pagination -->
                            <nav class="pagination">
                                {{ $tags->onEachSide(1)->links('components.pagination') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                const tagNameCell = this.closest('tr').querySelector('.tag-name');
                const currentName = tagNameCell.textContent.trim();
                const tagId = tagNameCell.getAttribute('data-tag-id');

                // Check if the input field already exists  
                if (tagNameCell.querySelector('input')) {
                    return; // If it exists, do nothing  
                }

                // Create an input field for editing  
                const input = document.createElement('input');
                input.type = 'text';
                input.value = currentName;
                input.className = 'border rounded p-1';

                // Replace the category name with the input field  
                tagNameCell.innerHTML = '';
                tagNameCell.appendChild(input);
                input.focus();

                // Create a save button  
                const saveButton = document.createElement('button');
                saveButton.textContent = 'Save';
                saveButton.className = 'ml-2 bg-green-500 text-white rounded p-1';

                // Append the save button next to the input field  
                tagNameCell.appendChild(saveButton);

                // Save the new name on button click  
                saveButton.addEventListener('click', function() {
                    const newName = input.value;

                    // Here you can send an AJAX request to update the category name in the backend  
                    fetch(`/tags/${tagId}/update`, {
                            method: 'PUT', // or 'PATCH' depending on your API  
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token if using Laravel  
                            },
                            body: JSON.stringify({
                                name: newName
                            })
                        })
                        .then(response => {
                            location.reload();
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
</x-app-layout>
