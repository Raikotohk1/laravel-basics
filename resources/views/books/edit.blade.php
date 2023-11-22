<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('books.update', $book) }}" class="flex flex-col gap-4">
                        @csrf
                        @method('patch')

                        <x-input-label value="Title:" />
                        <x-text-input name="title" value="{{ old('title', $book->title) }}" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />

                       

                        <x-input-label value="Release year:" />
                        <x-text-input name="release_date" value="{{ old('release_date', $book->release_date) }}" />
                        <x-input-error :messages="$errors->get('release_date')" class="mt-2" />

                        <x-input-label value="Price:" />
                        <x-text-input name="price" value="{{ old('price', $book->price) }}" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                
                        <x-input-label value="Type:" />
                        <select name="type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"> 
                            <option value="new" {{ $book->type == "new" ? "selected" : "" }}>New</option>
                            <option value="used" {{ $book->type == "used" ? "selected" : "" }}>Used</option>
                            <option value="ebook" {{ $book->type == "ebook" ? "selected" : "" }}>Ebook</option>

                        </select>

                        
                       
                           
                        <div class="mt-4 space-x-2">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        <a href="{{ route('books.index') }}">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>

                <div class="p-6 text-gray-900">
                    <x-input-label class="text-xl" value="Authors:" />

                 @foreach ($book->authors as $author)
                            
                    <div class="flex border-b justify-between items-center">
                        {{ $author->first_name }} {{ $author->last_name }} 
                        <div class=" pt-2">
                         

                          <form method="POST" action="{{ route('book.detach.author', $author) }}">
                              @csrf
                              @method('delete')
                              <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();">
                                  Delete
                              </x-danger-button>
                          </form>
                        </div>
                    </div>
                    
                @endforeach
                
                   
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>