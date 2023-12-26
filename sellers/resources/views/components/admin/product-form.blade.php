@php
$data = $categories;
@endphp
<div class="submit-ad main-grid-border">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Add new product</h1>
    
        <a href="{{route('admin.category')}}" class="btn btn-primary">Product List</a>
    </div>
    <div class="post-ad-form" id="">
        <form class="add-post-form" enctype="multipart/form-data" action="{{route('admin.add', $product )}}" method="post">
            @csrf
            @method($product->exists ? 'put' : 'post')
        
            <div class="row">
                @include('shared.input',['label' => 'Title', 'name' => 'title', 'value' => $product->title])
            </div>
            
            <div class="row">
                @include('shared.input',['label' => 'Description', 'type' => 'textarea', 'name' => 'description', 'value' => $product->description])
            </div>

            <div class="row">
                @include('shared.input',['label' => 'Price', 'name' => 'price', 'value' => $product->price])
            </div>

            <div class="row">
                @include('shared.combobox',['label' => 'Category', 'name' => 'category', 'value' => $categories->pluck('id')])
            </div>

            <div class="row">
                @include('shared.checkbox',['label' => 'Sold', 'name' => 'sold', 'value' => $product->sold])
            </div>

            <div class="row">
                @include('shared.file',['label' => 'Media', 'name' => 'media'])
            </div>

            <div class="row">
                @include('shared.files',['label' => 'Album', 'name' => 'pictures'])
            </div>

            <div>
                <button class="btn btn-primary">
                    @if($product->exists)
                        Save
                    @else
                        Create
                    @endif
                </button>
            </div>
        </form>
    </div>
</div>