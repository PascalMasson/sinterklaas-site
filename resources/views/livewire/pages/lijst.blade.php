<div class="mx-5">
    <h3 class="text-xl font-bold my-3 bg-transparent">Lijst van {{$listName}}</h3>
    @livewire('components.cadeautable.table', ['cadeaus' => $cadeaus, 'isMyList' => $isMyList])
    @livewire('components.grid.cadeau-grid', ['cadeaus' => $cadeaus, 'isMyList' => $isMyList])
    @if($isMyList)
        <div class="fixed bottom-0 right-0">
            <a
                href="{{route('cadeau.add')}}"
                class="text-red-900 bg-red-400 hover:bg-red-300 hover:text-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                <span class="sr-only">Icon description</span>
            </a>
        </div>
    @endif
    @if(!$isMyList)
        <div id="imageModal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Toegevoegde afbeeldingen
                        </h3>
                        <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                onclick="modal.hide()">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="swiper imageSwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">Slide 1</div>
                                <div class="swiper-slide">Slide 2</div>
                                <div class="swiper-slide">Slide 3</div>
                                <div class="swiper-slide">Slide 4</div>
                                <div class="swiper-slide">Slide 5</div>
                                <div class="swiper-slide">Slide 6</div>
                                <div class="swiper-slide">Slide 7</div>
                                <div class="swiper-slide">Slide 8</div>
                                <div class="swiper-slide">Slide 9</div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button onclick="modal.hide();" type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Sluiten
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const targetEl = document.getElementById('imageModal');
            let modal = undefined;
            if (targetEl) {
                modal = new Modal(targetEl, null);

                const knoppen = document.getElementsByClassName('media-knop')
                for (let i = 0; i < knoppen.length; i++) {
                    knoppen.item(i).addEventListener('click', function (e) {
                        console.log('rendering modal')
                        let images = JSON.parse(e.target.value);
                        const imagecontainer = document.querySelector('.swiper-wrapper');
                        imagecontainer.replaceChildren();

                        images.forEach(image => {
                            const div = document.createElement('div');
                            div.classList.add('swiper-slide');
                            div.innerHTML = `<img src="${image}" alt="image">`;
                            imagecontainer.appendChild(div);
                        });
                        modal.show();

                        var swiper = new Swiper('.imageSwiper', {
                            navigation: {
                                nextEl: ".swiper-button-next",
                                prevEl: ".swiper-button-prev",
                            },
                        });
                    });
                }
            }
        </script>
    @endif
</div>

