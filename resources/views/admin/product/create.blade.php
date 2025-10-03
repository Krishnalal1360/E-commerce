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

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            
            <h4 class="pt-3 pb-3 text-primary">Dashboard</h4>
            
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Create Product</h5>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Cancel</a>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <x-input-label for="image">Image</x-input-label>
                        <x-text-input id="image" class="form-control" class="mt-2 mb-2" type="file" name="image" required></x-text-input>
                    </div>                    

                    <div class="form-group">
                        <x-input-label for="images">Images</x-input-label>
                        <x-text-input id="images" class="form-control" class="mt-2 mb-2" type="file" name="images[]" multiple required></x-text-input>
                    </div>

                    <div class="form-group">
                        <x-input-label for="name">Name</x-input-label>
                        <x-text-input id="name" class="form-control" class="mt-2 mb-2" type="text" name="name" required></x-text-input>
                    </div>

                    <div class="form-group">
                        <x-input-label for="price">Price</x-input-label>
                        <x-text-input id="price" class="form-control" class="mt-2 mb-2" type="number" name="price" required></x-text-input>
                    </div>

                    <div class="form-group">
                        <x-input-label for="color">Color</x-input-label>
                        <x-select-input id="color" {{--class="form-control"--}} class="mt-2 mb-2" type="text" name="color" required>
                            <option value="">-- Select Color --</option>
                            <option value="red">Red</option>
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                        </x-text-input>
                    </div>

                    <div class="form-group">
                        <x-input-label for="tag">Tag</x-input-label>
                        <x-text-input id="tag" class="form-control" class="mt-2 mb-2" type="text" name="tag" required></x-text-input>
                    </div>

                    <div class="form-group">
                        <x-input-label for="quantity">Quantity</x-input-label>
                        <x-text-input id="quantity" class="form-control" class="mt-2 mb-2" type="text" name="quantity" required></x-text-input>
                    </div>

                    <div class="form-group">
                        <x-input-label for="sku">SKU</x-input-label>
                        <x-text-input id="sku" class="form-control" class="mt-2 mb-2" type="text" name="sku" required></x-text-input>
                    </div>

                    <div class="form-group">
                        <x-input-label for="tinymce_editor">Description</x-input-label>
                        <textarea id="tinymce_editor" class="form-control" class="mt-2 mb-2" name="description" rows="5" required></textarea>
                    </div>

                    <x-primary-button class="mt-3">Submit</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="slotscripts">
        <script>
            tinymce.init({
                selector: 'textarea#tinymce_editor',
                plugins: [
                    // Core editing features
                    'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                    // Your account includes a free trial of TinyMCE premium features
                    // Try the most popular premium features until Oct 17, 2025:
                    'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen',
                    'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments',
                    'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
                    'importword', 'exportword', 'exportpdf'
                ],
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | ' +
                         'addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | ' +
                         'checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [
                    { value: 'First.Name', title: 'First Name' },
                    { value: 'Email', title: 'Email' },
                ],
                ai_request: (request, respondWith) =>
                    respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
                uploadcare_public_key: '97570bfb1c52579173dc',
            });
        </script>
    </x-slot>
</x-app-layout>
