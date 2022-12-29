<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
        <h3 class="text-2xl font-bold text-center">Inloggen</h3>
        <form wire:submit.prevent="login">
            <div class="mt-4 flex flex-col flex-1">
                <div>
                    <label class="block" for="email">Geef je naam:</label>
                    <input wire:model="name"
                           name="name"
                           type="text" placeholder="Naam"
                           class="w-full px-4 py-2 mt-2 rounded-md"
                    >
                    <span class="mt-1 text-red-500 text-sm">@error('name') {{$message}} @enderror</span>
                </div>
                <button
                    type="submit"
                    class="px-6 py-2 mt-4 text-red-900 bg-red-400 rounded-lg hover:bg-red-300 hover:text-red-800">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
