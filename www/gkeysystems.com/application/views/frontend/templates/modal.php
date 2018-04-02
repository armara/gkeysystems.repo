		<section class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
				<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
					<div id="cd-login"> <!-- log in form -->
						<form class="cd-form" action="<?=base_url();?>home/login" method="POST">
							<span id="login_warning"></span>
							<p class="fieldset">
								<label class="image-replace cd-email" for="email">E-mail</label>
								<input class="full-width has-padding has-border" id="email" type="email" name="email" placeholder="Էլ. հասցե">
								<span class="cd-error-message" id="email_warning"></span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="password">Password</label>
								<input class="full-width has-padding has-border" id="password" type="password" name="password"  placeholder="Գաղտնաբառ">
								<span class="cd-error-message" id="password_warning"></span>
							</p>

							<p class="fieldset">
								<input type="checkbox" id="remember-me" checked>
								<label for="remember-me">Հիշել գաղտնաբառը</label>
							</p>

							<p class="fieldset">
								<input class="full-width" type="button" id="login" value="Մուտք">
							</p>
						</form>
						<!-- <a href="#0" class="cd-close-form">Close</a> -->
					</div> <!-- cd-login -->
					<a href="#0" class="cd-close-form">Close</a>
				</div> <!-- cd-user-modal-container -->
		</section> <!-- cd-user-modal -->