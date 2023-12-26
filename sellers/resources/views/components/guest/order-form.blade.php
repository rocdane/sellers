<div class="submit-ad main-grid-border">
    <h1>Edit order</h1>

    <div class="post-ad-form" id="">
        <form class="add-post-form" method="POST" action="{{route('guest.confirm')}}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    @include('shared.input',['label' => 'Name', 'name' => 'name'])
                </div>
                <div class="col-md-4">
                    @include('shared.input',['label' => 'Phone', 'name' => 'phone'])
                </div>
                <div class="col-md-4">
                    @include('shared.input',['label' => 'Email', 'name' => 'email'])
                </div>
            </div>
            <div class="row">
                @include('shared.input',['label' => 'Address', 'name' => 'address'])
            </div>
            <div>
                <button class="btn btn-danger"> <i class="bi bi-bag-check-fill">Checkout</i></button>
            </div>
            <p class="post-terms">En cliquant <strong>Checkout</strong> Vous acceptez nos <a href="{{route('guest.cgv')}}" target="_blank">règles </a> et <a href="{{route('guest.policy')}}" target="_blank">politiques de confidentialité</a></p>
        </form>
    </div>
</div>