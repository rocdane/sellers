@php
$seller ??= null;
@endphp
<div>
    <!-- Edit Personal Info -->
    <div class="widget personal-info">
        <h3 class="widget-header user">Edit Information</h3>
        <form action="{{route('admin.apply', ['seller'=>$seller])}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- File chooser -->
            <div class="form-group choose-file">
                <i class="fa fa-user text-center"></i>
                <input type="file" class="form-control-file d-inline" id="input-file" name="picture">
            </div>
            <div class="row">
                @include('shared.input',['label' => 'Name', 'name' => 'name', 'value' => $seller?->name])
            </div>
            <div class="row">
                @include('shared.input',['label' => 'Legal', 'name' => 'legal', 'value' => $seller?->legal])
            </div>
            <div class="row">
                @include('shared.input',['label' => 'Address', 'name' => 'address', 'value' => $seller?->address])
            </div>
            <div class="row">
                @include('shared.input',['label' => 'Phone', 'name' => 'phone', 'value' => $seller?->phone])
            </div>
            <div class="row">
                @include('shared.input',['label' => 'Email', 'type' => 'email', 'name' => 'email', 'value' => $seller?->email])
            </div>
            <!-- Submit button -->
            <button class="btn btn-transparent">Save My Changes</button>
        </form>
    </div>
    <!-- Change Password -->
    <div class="widget change-password">
        <h3 class="widget-header user">Edit Bank</h3>
        <form action="{{route('admin.save', ['seller'=>$seller])}}" method="post">
            @csrf
            <div class="row">
                @include('shared.input',['label' => 'NAME', 'name' => 'name', 'value' => $seller?->bank?->name])
            </div>
            <div class="row">
                @include('shared.input',['label' => 'IBAN', 'name' => 'iban', 'value' => $seller?->bank?->iban])
            </div>
            <div class="row">
                @include('shared.input',['label' => 'BIC', 'name' => 'bic', 'value' => $seller?->bank?->bic])
            </div>
            
            <!-- Submit Button -->
            <button class="btn btn-transparent">Save Bank</button>
        </form>
    </div>
</div>