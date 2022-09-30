<x-base-layout>
    <!--MAIN CONTENT-->
    <x-slot name="head">
      <!-- must include -->
    </x-slot> 
    <div class="grid grid-row-2 grid-cols-12 h-auto">
        <div class="p-4 m-4 text-center bg-gray-200 bg-opacity-30 row-start-1 row-end-3 col-start-1 col-end-7 rounded-3xl shadow overflow-hidden">
            <div class="inline-flex">
                <img class="h-64 w-64 m-4 rounded-3xl shadow overflow-hidden" src="{{ asset('images/pictures/me.jpg') }}" alt="">
                <img class="h-64 w-64 m-4 rounded-3xl overflow-hidden" src="{{ asset('images/pictures/cho_logo_transparent.png') }}" alt="">
            </div>
            <div class="p-4 m-4 text-left bg-gray-200 bg-opacity-30 row-start-2 row-end-3 col-start-1 col-end-7 rounded-3xl shadow overflow-hidden">
                <p></p>
                    Hi,<br>
                    <br>
                    Welcome to my portfolio site. <br>
                    Here you can play most of my <a href="{{route('games')}}">games</a> and leave me some valuable feedback.
                    <br><br>
                    You can even download my CV <a href="/downloadfile/cv">HERE.</a>
                    <br><br>
                    You can contact me via: <br>
                </p>

                <i class="fa-regular fa-envelope"></i> veljko.vracarevic@pmf.edu.rs <br>
                <i class="fa-brands fa-instagram"></i> <a href="https://www.instagram.com/chosdevlog/" target="_blank">chosdevlog</a> <br>
                <i class="fa-brands fa-linkedin"></i> <a href="https://www.linkedin.com/in/veljkovracarevic/" target="_blank">Let's Connect</a> <br>
                <i class="fa-brands fa-git-alt"></i> <a href="https://github.com/Chothulhu" target="_blank"> GitHub </a>
            </div>
        </div>
        <div class="p-4 m-4 text-left bg-gray-200 bg-opacity-30 col-start-7 col-end-13 rounded-3xl shadow overflow-hidden">
            <h1 class="p-2 font-bold">About me:</h1>
            <div class="p-4 m-4 text-left bg-gray-200 bg-opacity-30 row-start-2 row-end-3 col-start-1 col-end-7 rounded-3xl shadow overflow-hidden">
                <p>
                    My name is Veljko and i come from Niš, Serbia. <br>
                    Since i was 6yo i loved to play games. As i grew older i realised that making my own games is even more fun. <br>
                    That's why I started to learn programming, basic art skills and simple game design principles. <br>
                    So far, all my projects are made using Unity GameEngine, mostly my artwork and are designed by me. <br><br>

                    Apart from making games using C#, im quite skilled in other programming languages. <br>
                    After all, I made this site on my own using HTML/CSS/JS and Laravel framework for PHP. <br><br>




                    Keep in mind that some parts of this site are still work in progress and will be updated in near future.

                </p>
            </div>
            
            
        </div>
    
        <div class="m-4 col-start-7 col-end-13 rounded-3xl shadow overflow-hidden">
            <div class="relative rounded-3xl shadow overflow-hidden w-full">
            <div class="slide relative">
                <img class="w-full h-[300px] object-cover"
                    src="{{ asset('images/wheelOfFroggy/banner.png') }}">
                <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Wheel of Froggy</div>
            </div>

            <div class="slide relative">
                <img class="w-full h-[300px] object-cover"
                    src="{{ asset('images/glPumpkin/banner.png') }}">
                <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">Pump-kin</div>
            </div>

            <div class="slide relative">
                <img class="w-full h-[300px] object-cover"
                    src="{{ asset('images/bugsAndFeatures/banner.png') }}">
                <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">BugsAndFeatures</div>
            </div>

            <div class="slide relative">
                <img class="w-full h-[300px] object-cover"
                    src="https://bozosports.com/wp-content/uploads/2022/03/docs-coming-soon.jpg">
                <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">
                </div>
            </div>

            <!-- The previous button -->
            <a class="absolute left-0 top-1/2 p-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white hover:text-amber-500 cursor-pointer"
                onclick="moveSlide(-1)">❮</a>

            <!-- The next button -->
            <a class="absolute right-0 top-1/2 p-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white hover:text-amber-500 cursor-pointer"
                onclick="moveSlide(1)">❯</a>

        </div>
        <br>

        <!-- The dots -->
        <div class="flex justify-center items-center space-x-5">
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(1)"></div>
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(2)"></div>
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(3)"></div>
            <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(4)"></div>
        </div>

            <!-- Javascript code -->
            <script>
                // set the default active slide to the first one
                let slideIndex = 1;
                showSlide(slideIndex);

                // change slide with the prev/next button
                function moveSlide(moveStep) {
                    showSlide(slideIndex += moveStep);
                }

                // change slide with the dots
                function currentSlide(n) {
                    showSlide(slideIndex = n);
                }

                function showSlide(n) {
                    let i;
                    const slides = document.getElementsByClassName("slide");
                    const dots = document.getElementsByClassName('dot');
                    
                    if (n > slides.length) { slideIndex = 1 }
                    if (n < 1) { slideIndex = slides.length }

                    // hide all slides
                    for (i = 0; i < slides.length; i++) {
                        slides[i].classList.add('hidden');
                    }

                    // remove active status from all dots
                    for (i = 0; i < dots.length; i++) {
                        dots[i].classList.remove('bg-dark-red');
                        dots[i].classList.add('bg-gray-400');
                    }

                    // show the active slide
                    slides[slideIndex - 1].classList.remove('hidden');

                    // highlight the active dot
                    dots[slideIndex - 1].classList.remove('bg-gray-400');
                    dots[slideIndex - 1].classList.add('bg-dark-red');
                }
            </script>
                    
        </div>
    </div>
    <div class="grid grid-row-2 grid-cols-12 rounded-3xl shadow overflow-hidden">
                
    </div>  
                
        
    </div>
</x-base-layout>