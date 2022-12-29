<div class="container ml-3">
    <h3 class="font-bold text-xl">{{$cadeau->title}} aanpassen:</h3>
    <form id="edit-cadeau-form" wire:submit.prevent="update" class="mx-3 mt-3"
          enctype="multipart/form-data">
        @csrf
        <div class="relative z-0 mb-6 w-full group">
            <input type="text" name="title" id="floating_title" wire:model="title"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " value="{{$cadeau->title}}"/>
            <label for="title"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Titel
            </label>
            <span class="mt-1 text-red-500 text-sm">@error('title') {{$message}} @enderror</span>
        </div>
        <div class="relative z-0 mb-6 w-full group">
                        <textarea wire:model="description" type="textarea" name="description"
                                  id="floating_description"
                                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                  placeholder=" " rows="5">{{$cadeau->description}}</textarea>
            <label for="description"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Beschrijving
            </label>
            <span class="mt-1 text-red-500 text-sm">@error('description') {{$message}} @enderror</span>

        </div>
        <div class="relative z-0 mb-6 w-full group">
            <input wire:model="prijs" lang="en" type="text" name="prijs" id="floating_prijs"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " inputmode="numeric" pattern="\d+(?:[.,]\d{1,2})?" value="{{$cadeau->prijs}}"/>
            <label for="prijs"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Prijs
            </label>
            <span class="mt-1 text-red-500 text-sm">@error('prijs') {{$message}} @enderror</span>

        </div>
        <div class="relative z-0 mb-6 w-full group">
            <input wire:model="location" type="text" name="location" id="floating_location"
                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " value="{{$cadeau->location}}"/>
            <label for="location"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Locatie
            </label>
            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">De locatie
                kan zowel een winkel als een website zijn.</p>
            <span class="mt-1 text-red-500 text-sm">@error('location') {{$message}} @enderror</span>
        </div>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Media
            toevoegen</label>
        <input
            class="block w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
            aria-describedby="user_avatar_help" id="user_avatar" type="file" multiple accept="image/*"
            name="images[]" wire:model="images">
    </form>
    <div class="inline-flex rounded-md shadow-sm mt-5 ml-3" role="group">
        <button type="submit" form="edit-cadeau-form"
                class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
            </svg>
            Opslaan
        </button>
        <a type="button" href="{{route('lijst', $cadeau->listId)}}"
           class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            Annuleren
        </a>
    </div>

    <div class="overflow-x-auto relative mt-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Bestaande afbeeldingen
                </th>
                <th scope="col" class="py-3 px-6 w-px">

                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($cadeau->images()->get() as $image)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row"
                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-44 h-auto" src="{{URL::asset('storage/'.$image->url)}}"
                             alt="image">
                    </th>
                    <td class="py-4 px-6 w-px">
                        <div class="inline-flex rounded-md shadow-sm mb-0">
                            @csrf
                            <button wire:click="deleteAttachment({{$image->id}})" type="button"
                                    class="text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


</div>
