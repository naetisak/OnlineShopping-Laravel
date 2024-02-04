@extends('layouts.app')

@push('scripts')
    <script>
        const activeTab = (id)=>{
            let tabContainer = document.getElementById('tabContainer').querySelectorAll('.tabContent');
            let tabLinks = document.getElementById('tabLinks').querySelectorAll('li');
            tabContainer.forEach(element => {
                element.classList.add('hidden');
            });
            tabLinks.forEach(element => {
                element.classList.remove('text-violet-600');
                element.classList.remove('underline');

            });

            document.getElementById(id).classList.remove('hidden');
            document.getElementById(`nav-${id}`).classList.add('text-violet-600');
            document.getElementById(`nav-${id}`).classList.add('underline');

            const url = new URL(window.location);
            url.searchParams.set('tab',id);
            window.history.pushState({},'',url);
        }

        @if(request()->tab)
            activeTab("{{ request()->tab }}")
        @endif
        
    </script>
@endpush


@section('body_content')
    <div class="px-6 md:min-h-screen md:px-20 mt-6 grid grid-cols-1 md:grid-cols-6 gap-4">
        <div>
            <ul class="flex md:flex-col flex-wrap justify-between gap-3 md:gap-1" id="tabLinks">
                <li id="nav-profile" onclick="activeTab('profile')" class="cursor-pointer text-violet-600 underline">My Profile</li>
                <li id="nav-orders" onclick="activeTab('orders')" class="cursor-pointer">My Order</li>
                <li id="nav-address" onclick="activeTab('address')" class="cursor-pointer">My Address</li>
                {{-- <li onclick="activeTab('')">Account Settings</li> --}}
            </ul>
        </div>

        {{-- Right side --}}
        <div class="md:col-span-5">
            <div id="tabContainer" class="grid grid-cols-1 gap-6">

                {{-- My Profile --}}
                <section id="profile" class="tabContent border border-slate-300 rounded px-4 pt-2 pb-4">
                    <h3 class="text-gray-900">Personal Information</h3>
                    <hr class="mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    
                        <div class="relative border border-slate-300 rounded">
                            <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">First Name</label>
                            <input type="text" name="" value="Naetisak" class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                        </div>
    
                        <div class="mt-4 relative border border-slate-300 rounded">
                            <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">Last Name</label>
                            <input type="text" name="" value="Phinyoyotshopon" class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                        </div>
    
                        <div class="mt-4 relative border border-slate-300 rounded">
                            <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">Mobile Number</label>
                            <input type="text" name="" value="0648037075" class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                        </div>
    
                        <div class="mt-4 relative border border-slate-300 rounded">
                            <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">Email Address</label>
                            <input type="text" name="" value="naetisak@gmail.com" class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                        </div>
    
                        <div></div>
                        <div>
                            <button class="bg-violet-500 rounded shadow-lg py-1 text-center w-full text-white uppercase font-medium">Update</button>
                        </div>
    
                    </div>
                </section>
                {{-- End My Profile --}}
    
                {{-- My Oders --}}
                <section id="orders" class="tabContent hidden border border-slate-300 rounded px-4 pt-2 pb-4">
                    <h3 class="text-gray-900">My Orders</h3>
                    <hr class="mb-3">
    
                    <div class="grid grid-cols-1 gap-6">
    
                        <div class="flex flex-col md:flex-row gap-3 justify-between items-center">
                            <div>
                                <div class="mb-1 flex flex-wrap gap-3">
                                    @foreach (range(1,4) as $item)
                                        <div class="bg-gray-100 rounded shadow p-2">
                                            <img class="w-28" src="{{asset('dpanel/images/product-6.png')}}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="grid grid-cols-4 gap-4">
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Order ID</span>
                                        <span>3434354</span>
                                    </div>
        
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Shipped Date</span>
                                        <span>04 Feb, 2024</span>
                                    </div>
        
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Total</span>
                                        <span>$1500</span>
                                    </div>
        
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Status</span>
                                        <span class="text-green-500">Delivered</span>
                                    </div>
                                </div>
                            </div>
                            <div class="shrink-0 flex flex-col gap-1">
                                <button class="border border-gray-300 shadow-md rounded-sm
                                 text-black font-medium uppercase px-4 p-1">View Order
                                </button>
                                
                            </div>
                        </div>
    
                        <div class="flex flex-col md:flex-row gap-3 justify-between items-center">
                            <div>
                                <div class="mb-1 flex flex-wrap gap-3">
                                    @foreach (range(1,4) as $item)
                                        <div class="bg-gray-100 rounded shadow p-2">
                                            <img class="w-28" src="{{asset('dpanel/images/product-6.png')}}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="grid grid-cols-4 gap-4">
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Order ID</span>
                                        <span>3434354</span>
                                    </div>
        
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Shipped Date</span>
                                        <span>04 Feb, 2024</span>
                                    </div>
        
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Total</span>
                                        <span>$1500</span>
                                    </div>
        
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Status</span>
                                        <span class="text-gray-400">Processing</span>
                                    </div>
                                </div>
                            </div>
                            <div class="shrink-0 flex flex-col gap-1">
                                <button class="border border-gray-300 shadow-md rounded-sm
                                 text-black font-medium uppercase px-4 p-1">View Order
                                </button>
                                <button class="text-red-500">Cancel Order</button>
                            </div>
                        </div>
    
                        <div class="flex flex-col md:flex-row gap-3 justify-between items-center">
                            <div>
                                <div class="mb-1 flex flex-wrap gap-3">
                                    @foreach (range(1,4) as $item)
                                        <div class="bg-gray-100 rounded shadow p-2">
                                            <img class="w-28" src="{{asset('dpanel/images/product-6.png')}}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="grid grid-cols-4 gap-4">
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Order ID</span>
                                        <span>3434354</span>
                                    </div>
        
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Shipped Date</span>
                                        <span>04 Feb, 2024</span>
                                    </div>
        
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Total</span>
                                        <span>$1500</span>
                                    </div>
        
                                    <div class="flex flex-col text-gray-800 leading-5">
                                        <span class="font-medium">Status</span>
                                        <span class="text-orange-500">Out for Delivery</span>
                                    </div>
                                </div>
                            </div>
                            <div class="shrink-0 flex flex-col gap-1">
                                <button class="border border-gray-300 shadow-md rounded-sm
                                 text-black font-medium uppercase px-4 p-1">Track Order
                                </button>
                                <button class="text-red-500">View Order</button>
                            </div>
                        </div>
                        
                    </div>
    
                </section>
                {{-- End My Oders --}}
    
                {{-- My Delivery Addresses --}}
                <section id="address" class="tabContent hidden border border-slate-300 rounded px-4 pt-2 pb-4">
                    <h3 class="text-gray-900">My Delivery Addresses</h3>
                    <hr>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-3">
    
                        @foreach (range(1,4) as $item)
                            <div class="flex flex-col gap-1 p-2 rounded shadow bg-gray-100">
                                <div class="flex justify-between items-center">
                                    <p class="text-gray-800 font-medium">Naetisak <small>(Home Address)</small></p>
                                    <span class="text-gray-400 hover:text-violet-600 duration-300 cursor-pointer">
                                        <i class="bx bx-pencil "></i> Edit
                                    </span>
                                </div>
                                <p class="text-gray-400 leading-5">Ubon ratchathani, Phibun mangsahan, Moo.12 - 34110</p>
                                <p class="text-gray-600">Mobile No: +66 53674857</p>
                            </div>
                        @endforeach
    
                        <div class="flex flex-col items-center justify-center py-6 text-gray-400 gap-1 p-2 rounded shadow bg-gray-100">
                            <i class='bx bxs-plus-circle text-2xl' ></i>
                            <p>Add New Address</p>
                        </div>
    
                    </div>
                    
                </section>
                {{-- End My Delivery Addresses --}}
    
            </div>
        </div>
        {{-- End Right side --}}
    </div>
@endsection