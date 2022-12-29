<div class="overflow-x-auto relative shadow rounded-lg mb-10 hidden md:block">
    <table class="w-full max-w-screen text-sm text-left text-gray-500 table-auto">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
        <th scope="col" class="py-3 px-6">Cadeau</th>
        <th scope="col" class="py-3 px-6">Beschrijving</th>
        <th scope="col" class="py-3 px-6">Prijs</th>
        <th scope="col" class="py-3 px-6">Locatie</th>
        @if(!$isMyList)
            <th scope="col" class="py-3 px-6 w-px">Afbeeldingen</th>
            <th scope="col" class="py-3 px-6 w-px">Status</th>
        @else
            <th scope="col" class="py-3 px-6 w-px">Acties</th>
        @endif
        </thead>
        <tbody class="divide-y divide-gray-100">
        @foreach($cadeaus as $cadeau)
            @livewire('components.cadeautable.table-row', ['cadeau' => $cadeau, 'isMyList' => $isMyList, 'isStriped' => $loop->index %2 == 1], key($cadeau->id))
        @endforeach
        </tbody>
    </table>

</div>

