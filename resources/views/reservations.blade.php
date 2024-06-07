<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Make A Room
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('rooms.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Room Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Room Description')" />
                            <textarea id="description" class="block mt-1 w-full" name="description" required autofocus>{{ old('description') }}</textarea>
                            <x-auth-session-status class="mt-2" :message="$errors->first('description')" />
                        </div>

                        <!-- Room Price -->
                        <div class="mt-4">
                            <x-label for="price" :value="__('Room Price')" />
                            <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus />
                            <x-auth-session-status class="mt-2" :message="$errors->first('price')" />
                        </div>

                        <!-- Room Images -->
                        <div class="mt-4">
                            <x-label for="images" :value="__('Room Images')" />
                            <input id="images" class="block mt-1 w-full" type="file" name="images[]" multiple required />
                            <x-auth-session-status class="mt-2" :message="$errors->first('images')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-button class="ml-4">
                                {{ __('Add Room') }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
