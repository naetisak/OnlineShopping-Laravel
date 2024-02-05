@extends('dpanel.layouts.app')

@section('title', 'Create NewProducts')

@section('body_content')
    <div class="bg-gray-800 flex justify-between items-center rounded-l pl-2 mb-3 ">
        <p class="text-white font-medium text-lg py-1">Create New Products</p>
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

    <form action="{{route('dpanel.product.store')}}" method="post" enctype="multipart/form-data" 
    class="grid grid-cols-1 md:grid-cols-3 gap-y-2 gap-x-4 bg-gray-700 rounded p-2">
        @csrf

        <div>
            <label class="text-white">Product Category</label>
            <select name="category_id" class="w-full bg-white border border-gray-700 rounded py-0.5 focus:outline-none">
                <option value="">Select</option>
                @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="text-white">Product Brand</label>
            <select name="brand_id" class="w-full bg-white border border-gray-700 rounded py-0.5 focus:outline-none">
                <option value="">Select</option>
                @foreach ($brands as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="text-white">Product Name / Title</label>
            <input type="text" name="title" placeholder="Enter Product Name/Title" 
                class="w-full bg-white border border-gray-700 rounded py-0.5 px-2 focus:outline-none">
        </div>

        <div class="md:col-span-3">
            <label class="text-white">Product Description</label>
            <textarea name="description" rows="3" placeholder="Enter Product Description" 
                class="w-full bg-white border border-gray-700 rounded py-0.5 px-2 focus:outline-none"></textarea>
        </div>

        <button class="bg-white">Submit</button>

    </form>
@endsection