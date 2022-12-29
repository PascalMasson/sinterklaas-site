<div>
    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mx-3 mt-2">
        Cadeau toevoegen
    </h3>
    <form wire:submit.prevent="saveCadeau"
          id="add-cadeau-form" class="mx-3 mt-3"
          enctype="multipart/form-data">
        <div class="relative z-0 mb-6 w-full group">
            <input type="text" name="title" id="floating_title" wire:model="title"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "
                   value="{{old('title')}}"/>
            <label for="title"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Titel
            </label>
            @error('title')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="relative z-0 mb-6 w-full group">
                        <textarea type="textarea" name="description" id="floating_description" wire:model="description"
                                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                  placeholder=" " rows="5">{{old('description')}}</textarea>
            <label for="description"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Beschrijving
            </label>
            @error('description')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="relative z-0 mb-6 w-full group">
            <input type="text" name="prijs" id="floating_prijs" wire:model="prijs"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " inputmode="numeric" pattern="\d+(?:[.,]\d{1,2})?"
                   value="{{old('prijs')}}"/>
            <label for="prijs"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Prijs
            </label>
            @error('prijs')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="relative z-0 mb-6 w-full group">
            <input type="text" name="location" id="floating_location" wire:model="location"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" "
                   value="{{old('location')}}"/>
            <label for="location"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Locatie
            </label>
            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">De locatie
                kan zowel een winkel als een website zijn.</p>
            @error('location')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror

        </div>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Media
            toevoegen</label>
        <input wire:model="images"
               class="block w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
               multiple type="file" name="images[]" accept="image/*" value="{{old('images')}}">
        @error('images')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
        @enderror
        <div class="mt-3">
            <button data-modal-toggle="defaultModal" type="submit"
                    form="add-cadeau-form"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Cadeau toevoegen
            </button>
            <a type="button"
               href="{{route('lijst', ['lijstId' => Session::get('loggedInUser')->id])}}"
               class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                Annuleren
            </a>
        </div>
    </form>
</div>
