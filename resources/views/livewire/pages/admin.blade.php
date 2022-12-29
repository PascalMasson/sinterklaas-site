<div>
    <h3 class="text-xl font-bold my-3 bg-transparent mx-3">Database import</h3>
    <form wire:submit.prevent="saveDatabaseJson"
        id="database-import" class="mx-3 mt-3"
          enctype="multipart/form-data">
        @csrf

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="fileupload">JSON data
            selecteren</label>

        <input wire:model="databaseJson"
            type="file"
            class="block w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
            id="fileupload" accept=".json"
            name="data">

        <button type="submit" form="database-import"
                class="inline-flex mt-2 items-center py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">

            Importeren
        </button>
    </form>
</div>
