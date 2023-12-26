<x-admin-layout>
    <section class="user-profile section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                    <x-admin.sidebar :$seller/>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <x-admin.seller-info :$seller/>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>