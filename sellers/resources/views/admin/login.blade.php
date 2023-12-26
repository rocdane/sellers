<x-admin-layout>
    <section class="section bg-gray">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-6">
					<div class="submit-ad main-grid-border">
						<h1>Connectez-vous</h1>
						<div class="login-form" >
							<span class="login-error"></span>

							<form action="/login" method="POST">
								@csrf
								<!-- Email -->
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email">
								</div>
								<!-- Password -->
								<div class="form-group">
									<label for="password">New Password</label>
									<input type="password" class="form-control" id="password">
								</div>
								<p class="">
									<a href="/sign-up">Mot de passe oublié ?</a>
								</p>
								
								<!-- Submit button -->
								<button class="btn log btn-main">Sign in</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</x-admin-layout>