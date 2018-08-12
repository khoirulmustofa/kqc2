<!--breadcum start -->
<section class="breadcumb-section breadcumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Sign In</h1>
				<p>
					<a href="index-2.html">Home</a>/Sign In
				</p>
			</div>
		</div>
	</div>
</section>
<!--breadcum end-->

<div class="sign-in-page">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<h2>Silahkan Masuk</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui
					asperiores velit, minus repellendus! Fuga repellat perspiciatis
					amet at, deleniti. Porro!</p>
				<div class="login-form">
					<form action="<?php echo $action; ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<code><?php echo form_error('username') ?></code>
								<input type="text" name="username" id="username"
									placeholder="Username" value="<?php echo $username; ?>" />
							</div>
							<div class="col-md-6">
								<code><?php echo form_error('password') ?></code>
								<input type="password" name="password" id="password"
									placeholder="Password" value="<?php echo $password; ?>" />
							</div>
							<label>							
							<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>Remember Me
							</label>
						</div>

						<input type="submit" value="<?php echo $button;?>" /> <a href="#">Have
							You Forgot Your Username or password?</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>