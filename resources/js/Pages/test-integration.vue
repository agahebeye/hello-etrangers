<template>
    <div>
        <!-- Top Bar Nav -->
        <nav class="w-full py-4 bg-blue-800 shadow">
            <div class="container flex flex-wrap items-center justify-between w-full mx-auto">

                <nav>
                    <ul class="flex items-center justify-between text-sm font-bold text-white no-underline uppercase">
                        <li><a class="px-4 hover:text-gray-200 hover:underline" href="#">Shop</a></li>
                        <li><a class="px-4 hover:text-gray-200 hover:underline" href="#">About</a></li>
                    </ul>
                </nav>

                <div class="flex items-center pr-6 text-lg text-white no-underline">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

        </nav>

        <!-- Text Header -->
        <header class="container w-full mx-auto">
            <div class="flex flex-col items-center py-12">
                <a class="text-5xl font-bold text-gray-800 uppercase hover:text-gray-700" href="#">
                    Minimal Blog
                </a>
                <p class="text-lg text-gray-600">
                    Lorem Ipsum Dolor Sit Amet
                </p>
            </div>
        </header>

        <!-- Topic Nav -->
        <nav class="w-full py-4 bg-gray-100 border-t border-b" x-data="{ open: false }">
            <div class="block sm:hidden">
                <a
                    href="#"
                    class="flex items-center justify-center block text-base font-bold text-center uppercase md:hidden">
                    Topics <i class="ml-2 fas"></i>
                </a>
            </div>
            <div :class="open ? 'block' : 'hidden'" class="flex-grow w-full sm:flex sm:items-center sm:w-auto">
                <div class="container flex flex-col items-center justify-center w-full px-6 py-2 mx-auto mt-0 text-sm font-bold uppercase sm:flex-row">
                    <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Technology</a>
                    <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Automotive</a>
                    <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Finance</a>
                    <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Politics</a>
                    <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Culture</a>
                    <a href="#" class="px-4 py-2 mx-2 rounded hover:bg-gray-400">Sports</a>
                </div>
            </div>
        </nav>


        <div class="container flex flex-wrap py-6 mx-auto">

            <!-- Posts Section -->
            <section class="flex flex-col items-center w-full px-3 md:w-2/3">

                <article class="flex flex-col my-4 shadow">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
                    </a>
                    <div class="flex flex-col justify-start p-6 bg-white">
                        <a href="#" class="pb-4 text-sm font-bold text-blue-700 uppercase">Technology</a>
                        <a href="#" class="pb-4 text-3xl font-bold hover:text-gray-700">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</a>
                        <p href="#" class="pb-3 text-sm">
                            By <a href="#" class="font-semibold hover:text-gray-800">David Grzyb</a>, Published on April 25th, 2020
                        </p>
                        <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
                        <a href="#" class="text-gray-800 uppercase hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="flex flex-col my-4 shadow">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=2">
                    </a>
                    <div class="flex flex-col justify-start p-6 bg-white">
                        <a href="#" class="pb-4 text-sm font-bold text-blue-700 uppercase">Automotive, Finance</a>
                        <a href="#" class="pb-4 text-3xl font-bold hover:text-gray-700">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</a>
                        <p href="#" class="pb-3 text-sm">
                            By <a href="#" class="font-semibold hover:text-gray-800">David Grzyb</a>, Published on January 12th, 2020
                        </p>
                        <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
                        <a href="#" class="text-gray-800 uppercase hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <article class="flex flex-col my-4 shadow">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=3">
                    </a>
                    <div class="flex flex-col justify-start p-6 bg-white">
                        <a href="#" class="pb-4 text-sm font-bold text-blue-700 uppercase">Sports</a>
                        <a href="#" class="pb-4 text-3xl font-bold hover:text-gray-700">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</a>
                        <p href="#" class="pb-3 text-sm">
                            By <a href="#" class="font-semibold hover:text-gray-800">David Grzyb</a>, Published on October 22nd, 2019
                        </p>
                        <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
                        <a href="#" class="text-gray-800 uppercase hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Pagination -->
                <div class="flex items-center py-8">
                    <a href="#" class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-white bg-blue-800 hover:bg-blue-600">1</a>
                    <a href="#" class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-gray-800 hover:bg-blue-600 hover:text-white">2</a>
                    <a href="#" class="flex items-center justify-center w-10 h-10 ml-3 text-sm font-semibold text-gray-800 hover:text-gray-900">Next <i class="ml-2 fas fa-arrow-right"></i></a>
                </div>

            </section>

            <!-- Sidebar Section -->
            <aside class="flex flex-col items-center w-full px-3 md:w-1/3">

                <div class="flex flex-col w-full p-6 my-4 bg-white shadow">
                    <p class="pb-5 text-xl font-semibold">About Us</p>
                    <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                    <a href="#" class="flex items-center justify-center w-full px-2 py-3 mt-4 text-sm font-bold text-white uppercase bg-blue-800 rounded hover:bg-blue-700">
                        Get to know us
                    </a>
                </div>

                <div class="flex flex-col w-full p-6 my-4 bg-white shadow">
                    <p class="pb-5 text-xl font-semibold">Instagram</p>
                    <div class="grid grid-cols-3 gap-3">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                        <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                    </div>
                    <a href="#" class="flex items-center justify-center w-full px-2 py-3 mt-6 text-sm font-bold text-white uppercase bg-blue-800 rounded hover:bg-blue-700">
                        <i class="mr-2 fab fa-instagram"></i> Follow @dgrzyb
                    </a>
                </div>

            </aside>

        </div>

        <footer class="w-full pb-12 bg-white border-t">
            <div
                class="relative flex items-center invisible w-full md:visible md:pb-12">
                <button
                    class="absolute w-16 h-16 ml-12 text-2xl font-bold text-white bg-blue-800 rounded-full hover:bg-blue-700 hover:shadow">
                    &#8592;
                </button>
                <template>
                    <img class="w-1/6 hover:opacity-75">
                </template>
                <button
                    class="absolute right-0 w-16 h-16 mr-12 text-2xl font-bold text-white bg-blue-800 rounded-full hover:bg-blue-700 hover:shadow">
                    &#8594;
                </button>
            </div>
            <div class="container flex flex-col items-center w-full mx-auto">
                <div class="flex flex-col py-6 text-center md:flex-row md:text-left md:justify-between">
                    <a href="#" class="px-3 uppercase">About Us</a>
                    <a href="#" class="px-3 uppercase">Privacy Policy</a>
                    <a href="#" class="px-3 uppercase">Terms & Conditions</a>
                    <a href="#" class="px-3 uppercase">Contact Us</a>
                </div>
                <div class="pb-6 uppercase">&copy; myblog.com</div>
            </div>
        </footer>
    </div>
</template>