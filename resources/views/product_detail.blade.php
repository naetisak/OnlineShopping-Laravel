@extends('layouts.app')

@push('scripts')
    <script>
        let currentImage = 0;

        const viewImage = (e, index) => {

            currentImage = index;

            document.getElementById('bigImage').src = e.querySelector('img').src;
        }

        const nextPrevious = (index) => {

            i = currentImage + index;

            let images = document.getElementById('images').querySelectorAll('img');

            if(i >= images.length || i < 0 ) return;

            currentImage = i;

            let arr = [];

            images.forEach(element =>arr.push(element.src));

            document.getElementById('bigImage').src = arr[currentImage];
        }
    </script>
@endpush

@section('body_content')
    <section class="px-6 md:px-20 mt-6">

        <div class="flex flex-wrap md:flex-nowrap gap-6">
            {{-- Left --}}
            <div class="shrink-0 md:w-auto w-full flex flex-col-reverse md:flex-row gap-4">
                <div id="images" class="flex md:flex-col gap-3 pb-1 md:pb-0 max-h-96 overflow-y-auto">
                    @foreach (range(1, 4) as $item)
                    <div onclick="viewImage(this,'{{$loop->index}}')" 
                        class="bg-white rounded-md shadow p-1 cursor-pointer">
                        <img class="w-14" src="{{asset('dpanel/images/product-' .$loop->iteration. '.png')}}" alt="">
                    </div>
                    @endforeach
                </div>

                <div class="h-96 relative bg-white rounded-md shadow-md p-3">
                    <img id="bigImage" class="h-full aspect-[2/3]" src="{{asset('dpanel/images/product-1.png')}}" alt="">

                    <span onclick="nextPrevious(-1)"
                        class="absolute top-1/2 left-1 bg-white rounded-full w-5 h-5 shadow flex items-center justify-center">
                        <i class='bx bx-chevron-left text-xl text-gray-400 hover:text-violet-600 duration-200 cursor-pointer' ></i>
                    </span>

                    <span onclick="nextPrevious(1)"
                        class="absolute top-1/2 right-1 bg-white rounded-full w-5 h-5 shadow flex items-center justify-center">
                        <i class='bx bx-chevron-right text-xl text-gray-400 hover:text-violet-600 duration-200 cursor-pointer' ></i>
                    </span>
                </div>
            </div>
            {{-- Left End --}}

            {{-- Right --}}

            <div class="w-ful flex flex-col gap-4">
                <div class="flex gap-3">
                    <span class="bg-red-500 text-white rounded px-2 ">25% Off</span>
                    <span class="text-amber-500 text-sm"><i class='bx bx-star'></i> 4.5</span>
                </div>
                {{-- Name, SKU, Brand --}}
                <h2 class="text-lg font-medium text-gray-800">Mon Guerlain</h2>
                <div class="text-sn text-gray-800">
                    <p><span class="text-gray-400 ">SKU:</span> FK-0001</p>
                    <p><span class="text-gray-400 ">Brand:</span> Brand Name</p>
                </div>

                
                {{-- Price --}}
                <div>
                    <span class="text-rose-500 font-bold text-xl">$500</span>
                    <sub class="text-gray-400"><strike>$599</strike></sub>
                </div>

                {{-- Color --}}
                <div>
                    <p class="text-gray-400">Colors:</p>
                    <div class="flex gap-1">
                        <span style="background-color:#9b9a9a" class="w-5 h-5 rounded-full">&nbsp;</span>
                        <span style="background-color:#ff00dd" class="w-5 h-5 rounded-full">&nbsp;</span>
                        <span style="background-color:#003cff" class="w-5 h-5 rounded-full">&nbsp;</span>
                    </div>
                </div>
                {{-- End Color --}}

                {{-- Size --}}
                <div>
                    <p class="text-gray-400">Sizes:</p>
                    <div class="flex gap-1 text-gray-400 text-sm">
                        <span style="background-color:#ebebeb9d" class="flex justify-center items-center w-5 h-5 rounded-full border-gray-400">S</span>
                        <span style="background-color:#ebebeb9d" class="flex justify-center items-center w-5 h-5 rounded-full border-gray-400">M</span>
                        <span style="background-color:#ebebeb9d" class="flex justify-center items-center w-5 h-5 rounded-full border-gray-400">L</span>
                    </div>
                    <a href="#" class="text-gray-400 text-xs">Size Guide</a>
                </div>
                {{-- End size --}}

                {{-- Quantity --}}
                <div>
                    <p class="text-gray-400">Quantity</p>
                    <div class="flex items-center gap-2">
                        <input type="text" value="1" readonly 
                        class="bg-slate-200 rounded border border-gray-300 focus:outline-none px-2 text-lg font-medium w-20">
                        <button class="rounded border border-gray-300 w-7 h-7"><i class='bx bx-minus text-xl' ></i></button>
                        <button class="rounded border border-gray-300 w-7 h-7"><i class='bx bx-plus text-xl'  ></i></button>
                    </div>
                </div>
                {{-- End Quantity --}}

                {{-- Wishlist, Add to Cart and Buy Now --}}
                <div class="flex items-center gap-4">
                    <span class="bg-white shadow-md rounded-full w-8 h-8 flex items-center justify-center">
                        <i class='bx bx-heart text-2xl text-gray-500' ></i>
                    </span>
                    <button class="border border-violet-600 rounded w-28 text-center drop-shadow font-medium text-violet-600 py-0.5">
                        Add to Cart
                    </button>
                    <button class="border border-violet-600 rounded w-28 text-center drop-shadow font-medium text-white bg-violet-600 py-0.5">
                        Buy Now
                    </button>
                </div>
                {{-- End Add Cart and Buy Now --}}
                
            </div>
            {{-- Right End --}}
        </div>

        {{-- Description --}}
        <div>
            <h3 class="text-lg text-gray-400 font-medium my-6">Product Description</h3>
            <div class="text-gray-600">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus illum excepturi itaque rerum soluta expedita explicabo
                vero. Unde, aut? Architecto sapiente libero, est nulla qui minima sit natus quis sed tempora ad accusamus perferendis
                fugit similique voluptate nemo impedit vel ab voluptatibus soluta praesentium facere voluptates fugiat? Incidunt libero 
                vel natus molestiae nulla. Debitis dolores officia cupiditate reprehenderit earum nemo fugit voluptatem, rem alias
                nihil, dolor, quo laudantium aliquam vel dicta blanditiis odio quia nisi recusandae autem aspernatur delectus quae 
                voluptatum pariatur? Repellendus, labore deserunt! Dignissimos voluptatibus enim magni necessitatibus odit illum 
                numquam vitae aut consequuntur, iure quos, provident ipsa.
            </div>
        </div>
        {{-- End Description --}}

        <section class="mt-6">
            <h3 class="text-gray-800 font-medium mb-2">Featured Product</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach (range(1,12) as $item)
                <x-product.card1 />
                @endforeach
            </div>
        </section>

    </section>
@endsection