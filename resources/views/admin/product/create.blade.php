<x-app-layout>
    <section class="wsus__product mt-5 pb-5">
        <div class="container">

            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h4 class="pt-3 pb-3 text-primary">Dashboard</h4>

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Create Product</h5>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Cancel</a>
                </div>

                <div class="card-body">
                    <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Single Image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>

                        {{-- Multiple Images --}}
                        <div class="mb-3">
                            <label for="images" class="form-label">Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple required>
                        </div>

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        {{-- Price --}}
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>

                        {{-- Color --}}
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <select id="color" name="color" class="form-select" required>
                                <option value="">-- Select Color --</option>
                                <option value="red">Red</option>
                                <option value="blue">Blue</option>
                                <option value="green">Green</option>
                                <option value="black">Black</option>
                                <option value="white">White</option>
                            </select>
                        </div>

                        {{-- Tag --}}
                        <div class="mb-3">
                            <label for="tag" class="form-label">Tag</label>
                            <input type="text" class="form-control" id="tag" name="tag" required>
                        </div>

                        {{-- Quantity --}}
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>

                        {{-- SKU --}}
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" required>
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- TinyMCE Script --}}
    <x-slot name="scripts">
        <script src="https://cdn.tiny.cloud/1/k1adu2hfth0ilwdg7l6biccjuusy4empbxswx6g152b9722b/tinymce/8/tinymce.min.js"
                referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#description',
                plugins: 'link image media table lists code',
                toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image media | code',
                setup: function(editor) {
                    editor.on('change', function() {
                        editor.save(); // sync content to textarea
                    });
                }
            });

            // Ensure TinyMCE content is saved on submit
            document.getElementById('product-form').addEventListener('submit', function() {
                tinymce.triggerSave();
            });
        </script>
    </x-slot>

</x-app-layout>
