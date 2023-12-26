<div class="submit-ad main-grid-border">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Add new category</h1>
    
        <a href="{{route('admin.category')}}" class="btn btn-primary">Category List</a>
    </div>
    <div class="post-ad-form" id="">
        <form class="add-post-form" action="{{route('admin.set', $category )}}" method="post">
            @csrf
            @method($category->exists ? 'put' : 'post')
            <div class="row">
                @include('shared.input',['label' => 'Name', 'name' => 'name', 'value' => $category->name])
            </div>
            <button class="btn btn-primary">
                @if($category->exists)
                    Save
                @else
                    Create
                @endif
            </button>
        </form>
    </div>
</div>