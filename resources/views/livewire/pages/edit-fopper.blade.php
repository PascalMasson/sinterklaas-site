<div>
    <form wire:submit.prevent="saveFopper"
          id="add-fopper-form" class="mx-3 mt-3"
    >
        <div class="mb-6">
            <label for="fopperVoor"
                   class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Voor:</label>
            <select id='fopperVoor' name="fopperVoor" style='width: 200px;' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="fopper.fopperVoor">
                @foreach($users as $user)
                    <option disabled>Selecteer een naam</option>
                    <option value='{{ $user->id }}' @selected($user->id == $fopper->fopperVoor)>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="relative z-0 mb-6 w-full group">
                        <textarea type="textarea" name="description" id="floating_description"
                                  wire:model="fopper.description"
                                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                  placeholder=" " required rows="5"></textarea>
            <label for="description"
                   class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Beschrijving
            </label>
        </div>
        <div class="mt-3">
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Fopper bijwerken
            </button>
            <a type="button"
               href="{{route('lijst', ['lijstId' => auth()->id()])}}"
               class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                Annuleren
            </a>
        </div>
    </form>
</div>
