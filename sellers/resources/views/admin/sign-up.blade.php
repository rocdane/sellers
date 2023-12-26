<x-admin-layout>
    <section class="section bg-gray">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div class="submit-ad main-grid-border">
                        <h1>Changer mot de passe</h1>
                        <div class="sign-up-form" >
                            <form action="/update" method="POST">
								@csrf
								<!-- Email -->
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email">
								</div>
								<!-- New Password -->
								<div class="form-group">
									<label for="password">New Password</label>
									<input type="password" class="form-control" id="password">
								</div>
								<!-- Confirm New Password -->
								<div class="form-group">
									<label for="confirm-password">Confirm New Password</label>
									<input type="password" class="form-control" id="confirm-password">
								</div>
								<!-- Submit button -->
								<button class="btn log btn-main">Save changes</button>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
