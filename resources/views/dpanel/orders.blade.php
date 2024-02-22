@extends('dpanel.layouts.app')

@section('title', 'Coupons')

@push('scripts')
    <script>

        const updateStatus = (e, id) =>{
            window.location.href = `${window.location.href}/status/${id}/${e.value}`;
        }
        const editCoupon = (item,from,till)=>{
            item = JSON.parse(item);
            document.getElementById("edit-form").action = `${window.location.href}/${item.id}`;
            document.getElementById('code').value = item.code;
            document.getElementById('type').value = item.type;
            document.getElementById('value').value = item.value;
            document.getElementById('min_cart_amount').value = item.min_cart_amount;
            document.getElementById('from_valid').value = from;
            document.getElementById('till_valid').value = till;
            showBottomSheet('bottomSheetUpdate')
        }
    </script>
@endpush

@section('body_content')
    <div class="bg-gray-800 flex justify-between items-center rounded-l pl-2 mb-3 ">
        <p class="text-white font-medium text-lg ">Coupons</p>
        <button onclick="showBottomSheet('bottomSheet')" class="bg-violet-500 text-white py-1 px-2 rounded-r ">Create</button>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-500 px-2 py-1 rounded border border-red-500 mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="w-full flex flex-col">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class=" shadow overflow-hidden border border-gray-400 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-600">
                        <thead class="bg-gray-800">
                            <tr>

                                <th scope="col" 
                                    class="pl-3 py-3 text-left w-12 text-xs font-medium text-gray-200 tracking-wider">
                                    #
                                </th>

                                <th scope="col" 
                                    class="pl-3 py-3 text-left text-xs font-medium text-gray-200 tracking-wider">
                                    Coupon
                                </th>

                                <th scope="col" 
                                    class="pl-3 py-3 text-left text-xs font-medium text-gray-200 tracking-wider">
                                    Total
                                </th>

                                <th scope="col" 
                                    class="pl-3 py-3 text-left text-xs font-medium text-gray-200 tracking-wider">
                                    Discount
                                </th>

                                <th scope="col" 
                                    class="pl-3 py-3 text-left text-xs font-medium text-gray-200 tracking-wider">
                                    Pay
                                </th>

                                <th scope="col" 
                                    class="pl-3 py-3 text-left text-xs font-medium text-gray-200 tracking-wider">
                                    Payment Status
                                </th>


                                <th scope="col" 
                                    class="px-3 py-3 text-text-center text-xs font-medium text-gray-200 tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>

                         <tbody class="bg-gray-700 divide-y divide-gray-600">
                            @foreach ($data as $item)
                                <tr>
                                    <td class="pl-3 py-1">
                                        <div class="text-sm text-gray-200">
                                            {{$data->perPage() * ($data->currentPage() - 1) + $loop->iteration}}
                                        </div>
                                    </td>

                                    <td class="pl-3 py-3">
                                        <div class="text-sm text-gray-200">{{$item->coupon->code ?? ''}}</div>
                                    </td>

                                    <td class="pl-3 py-3">
                                        <div class="text-sm text-gray-200">${{$item->total_amount}}</div>
                                    </td>

                                    <td class="pl-3 py-3">
                                        <div class="text-sm text-gray-200">${{$item->discount_amount}}</div>
                                    </td>

                                    <td class="pl-3 py-3">
                                        <div class="text-sm text-gray-200">${{$item->total_amount - $item->discount_amount}}</div>
                                    </td>

                                    <td class="pl-3 py-3">
                                        <div class="text-sm text-gray-200">{{$item->payment_status}}</div>
                                    </td>

                                    <td class="flex px-4 py-3 justify-center text-lg">
                                        <select onchange="updateStatus(this,'{{$item->id}}')"
                                             class="border rounded focus:outline-none">
                                            <option value="PENDING" @selected($item->status == 'PENDING')>PENDING</option>
                                            <option value="PAIN OUT" @selected($item->status == 'PAIN OUT')>PAIN OUT</option>
                                            <option value="DISPATCHED" @selected($item->status == 'DISPATCHED')>DISPATCHED</option>
                                            <option value="ON WAY" @selected($item->status == 'ON WAY')>ON WAY</option>
                                            <option value="DELIVERED" @selected($item->status == 'DELIVERED')>DELIVERED</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach

                         </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$data->links()}}
    </div>

    <x-dpanel::modal.bottom-sheet sheetId="bottomSheet" title="New Coupon">
        <div class="flex justify-center items-center min-h-[30vh] md:min-h-[50vh]">
            <form action="{{route('dpanel.coupon.store')}}" method="post">
                @csrf
                <div class="grid grid-cols-1 gap-3">
                    <div>
                        <label>Coupon Code<span class="text-red-500 font-bold">*</span></label>
                        <input type="text" name="code" maxlength="50" required placeholder="Enter Coupon Code" 
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>

                    <div>
                        <label>Coupon Type<span class="text-red-500 font-bold">*</span></label>
                        <select name="type" class="w-full bg-gray-100 border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                            <option value="">select type</option>
                            <option value="Fixed">Fixed</option>
                            <option value="Percentage">Percentage</option>
                        </select>
                    </div>

                    <div>
                        <label>Coupon Value<span class="text-red-500 font-bold">*</span></label>
                        <input type="number" name="value" required placeholder="Enter Coupon Value" 
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>

                    <div>
                        <label>Min Cart Amount</label>
                        <input type="number" name="min_cart_amount" maxlength="50" placeholder="Enter Min Cart Amount" 
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>

                    <div>
                        <label>Valid From<span class="text-red-500 font-bold">*</span></label>
                        <input type="datetime-local" name="from_valid" required
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>

                    <div>
                        <label>Valid To<span class="text-red-500 font-bold">*</span></label>
                        <input type="datetime-local" name="till_valid"
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>

                    <div class="text-center">
                        <button class="bg-indigo-500 text-center text-white py-1 px-2 rounded shadow-md uppercase">Create
                            New
                            Coupon</button>

                    </div>

                </div>
            </form>
        </div>
    </x-dpanel::modal.bottom-sheet>

    <x-dpanel::modal.bottom-sheet sheetId="bottomSheetUpdate" title="Update Category">
        <div class="flex justify-center items-center min-h-[30vh] md:min-h-[50vh]">
            <form id="edit-form" action="" method="post">

                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div>
                        <label>Coupon Code<span class="text-red-500 font-bold">*</span></label>
                        <input type="text" name="code" id="code" maxlength="50" required
                            placeholder="Enter Coupon Code"
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>
                    <div>
                        <label>Coupon Type<span class="text-red-500 font-bold">*</span></label>
                        <select name="type" id="type"
                            class="w-full bg-gray-100 border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                            <option value="">select type</option>
                            <option value="Fixed">Fixed</option>
                            <option value="Percentage">Percentage</option>
                        </select>
                    </div>
                    <div>
                        <label>Coupon Value<span class="text-red-500 font-bold">*</span></label>
                        <input type="number" id="value" name="value" required placeholder="Enter Coupon Value"
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>
                    <div>
                        <label>Min Cart Amount</label>
                        <input type="number" id="min_cart_amount" name="min_cart_amount"
                            placeholder="Enter Min Cart Amount"
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>
                    <div>
                        <label>Valid From<span class="text-red-500 font-bold">*</span></label>
                        <input type="datetime-local" id="from_valid" name="from_valid" required
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>
                    <div>
                        <label>Valid To<span class="text-red-500 font-bold">*</span></label>
                        <input type="datetime-local" id="till_valid" name="till_valid"
                            class="w-full bg-transparent border border-gray-500 rounded py-0.5 px-2 focus:outline-none">
                    </div>

                    <div>
                        <label>&nbsp;</label>
                        <button
                            class="w-full bg-indigo-500 text-center text-white py-1 px-2 rounded shadow-md uppercase">Update
                            Coupon</button>
                    </div>
                </div>
            </form>
        </div>
    </x-dpanel::modal.bottom-sheet>
    <x-dpanel::modal.bottom-sheet-js hideOnClickOutside="true" />
@endsection
