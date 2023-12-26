<x-guest-layout>
    <!--================================
    =            Page Title            =
    =================================-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h3>Order</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="blog section">
        <x-guest.cart />

        <div class="container">
            <x-guest.order-form />
        </div>
    </section>
</x-guest-layout>