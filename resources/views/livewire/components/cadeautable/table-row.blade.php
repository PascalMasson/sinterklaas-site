<tr class="{{$this->isStriped ? "bg-gray-100" : "bg-white"}}">
    <th scope="row"
        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap align-top">{{$cadeau->title}}</th>
    <td class="py-3 px-6 align-top text-sm text-ellipsis break-all">{!! nl2br($cadeau->description) !!}</td>
    <td class="py-3 px-6 align-top w-px">{{str_starts_with($cadeau->prijs, '€') ? $cadeau->prijs : "€".$cadeau->prijs}}</td>
    @if(substr($cadeau->location, 0, 4) == "http")
        <td class="py-3 px-6 align-top"><a href="{{$cadeau->location}}" target="_blank"
                                           class="hover:underline text-blue-600">
                @if(function_exists('extractUrlName'))
                    {{extractUrlName($cadeau->location)}}
                @else
                    Website
                @endif
            </a>
        </td>
    @else
        <td class="py-3 px-6 align-top">{{$cadeau->location}}</td>
    @endif
    @if(!$isMyList)
        <td class="py-3 px-6 align-top">
            @if($cadeau->images_count > 0)
                @php
                    $imageurls = [];
                    foreach($cadeau->images as $image) {
                        $imageurls[] = Storage::disk('public')->url($image->url);
                    }
                @endphp
                <button value="{{json_encode($imageurls)}}"
                        class="media-knop text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-2 py-1 text-center">
                    Bekijken
                </button>
            @else
                <span class="text-gray-400">Geen afbeeldingen</span>
            @endif
        </td>
        <td class="py-3 px-6  align-top">
            @livewire('components.status-buttons', ['cadeau' => $cadeau])
        </td>
    @else
        <td class="py-3 px-3 align-top">
            <div class="inline-flex rounded-md shadow-sm mb-0">
                <a
                    href="{{route('cadeau.edit', ['id' => $cadeau->id])}}"
                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                    </svg>
                </a>
                <button
                    wire:click="deleteCadeau"
                        class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-r-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                    </svg>
                </button>
            </div>
        </td>
    @endif
</tr>
