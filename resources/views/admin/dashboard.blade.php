<x-app-layout>
    {{--  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    --}}
    
    <section class="wsus__product mt_145 pb_100">
        <div class="container">
            {{-- 
            <div class="alert alert-info">Welcome To Dashboard!</div>
            --}}
            <h4 class="pt-3 pb-3 text-primary">Dashboard</h4>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>All Products</h5>
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Create Product</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Tag</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td><img style="width:100px !important;" src="{{ asset('storage/' . $product->image) }}" alt=""></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->tag }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                        Delete
                                        </button>
                                        </form>
                                        </div>
                                    </td>
                                    </tr>            
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No products found.</td>
                                    </tr>
                                @endforelse
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
