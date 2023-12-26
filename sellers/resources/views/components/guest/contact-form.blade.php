@php
$contact ??= null;
@endphp
<div class="submit-ad main-grid-border">
    <h1>Contact Us</h1>
    <div class="post-ad-form" id="">
        <form class="add-post-form justify-content-between" enctype="multipart/form-data" method="POST" action="{{route('guest.send',$contact)}}">
            @csrf
            <div class="row">
                @include('shared.input',['label' => 'Email', 'name' => 'email', 'value' => $contact?->email])
            </div>
            <div class="row">
                @include('shared.input',['label' => 'Subject', 'name' => 'subject', 'value' => $contact?->subject])
            </div>
            <div class="row">
                @include('shared.input',['label' => 'Message', 'type' => 'textarea', 'name' => 'message', 'value' => $contact?->message])
            </div>        
            <div>
                <button class="btn btn-primary">Envoyer</button>
            </div>
            <p class="post-terms">En cliquant <strong>Envoyer</strong> Vous acceptez nos <a href="{{route('guest.cgv')}}" target="_blank">règles </a> et <a href="{{route('guest.policy')}}" target="_blank">politiques de confidentidalité</a></p>
        </form>
    </div>
</div>