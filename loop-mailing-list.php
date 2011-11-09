<?php
/**
 * @package WordPress
 * @subpackage Made in Brunel
 */
?>
<?php get_header(); ?>

<div class="main" id="mail-page">
		<form id="mailing-list" action="mailing-list-process.php" method="POST">
			<label for="email">Email Address</label>
			<input type="email" name="email" id="email" placeholder="enter your email address...">		
			<input type="submit" value="Submit" name="submit">
		</form>		

</div>
<script>
		// mail object will handle the client-side validation and form submission
		// through ajax
		var mail = window.mail || {};
		mail = {
			beenSubmitted: undefined,
			init : function () {
				// controls the ui of the forms - journey styling, etc.
				this.ui();
				
				$('#mailing-list').submit(function (event) {
					var emailInput, dataArray, emailAddress;
				
					event.preventDefault(); // stops the form from submitting
									
					// serialise the form data so it can be submitted by ajax
					mail.formData = $(this).serialize();
					// extract the email address from the data
					dataArray = mail.formData.split('=');
					// unescape the string to bring back the @ sign
					emailAddress = unescape(dataArray[1]);
							
					// test browser for html5 form input support
					emailInput = document.createElement('input');
					emailInput.setAttribute('type', 'email');
					
					if (emailInput.type === 'email') {
						// fall back validation if not supported
						mail.validate(emailAddress);
					} else {
						mail.formDecision(mail.formData);
					}
				});		
			},
			formDecision : function () {
				if (mail.beenSubmitted !== true){
					mail.submitForm(mail.formData);
					mail.beenSubmitted = true;
				} else {
					$('#mailing-list').before('<p class="error">Form already submitted</p>');
				}
			},
			validate : function (email) {
				var filter, errorTimer;
				// regular expression filter to test the email address
				filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (filter.test(email)) {
					// if it is valid then submit the form
					mail.formDecision(mail.formData);
				} else {
					// error message will be generated 
					mail.addError();
				}
			},
			ui: function () {
				$('input[type=email]', '#mailing-list').focus(function (){
					if($(this).hasClass('error') === true){
						mail.removeError();
					}
				});
			
			},
			addError : function (option) {
				var errorMessage = '',
					time = 5000;
				if (option === 'exists'){
					errorMessage = 'It seems that we already have you on our system. We\'ll be in touch soon!';
				} else {
					errorMessage = 'Please enter a valid e-mail!';
				}
				
				// no more than one error message will be generated at a time
				if ($('.error').length !== undefined){
					$('#mailing-list').before('<p class="error">' + errorMessage + '</p>');
					$('input[type=email]', '#mailing-list').addClass('error');
					// a timer that will remove the error marking
					errorTimer = setTimeout(function(){mail.removeError();}, time);					
				}
			},
			removeError : function () {
				if ($('input[type=email]', '#mailing-list').hasClass('error') === true){
					$('input[type=email]', '#mailing-list').removeClass('error');
					$('.error').fadeOut('slow', function (){
						$(this).remove();
					});					
				} else {
					//console.log('something is wrong');
				}
			},
			submitForm : function (data) {
				$.ajax({
					url : '../mailing-list-process.php',
					type: 'POST',
					data : data,
					success: mail.responseProcess
				});
			},
			responseProcess : function (response) {
				// server can process another 
				mail.beenSubmitted = false;
				if (response === 'success'){
					$('input, label', '#mailing-list').remove();
					$('#mailing-list')
					.append('<p>Your Email has been added to our mailing list! Speak to you soon.</p>')
					.addClass('success');
				} else if (response === 'error') {
					mail.addError();
				} else if (response === 'exists'){
					mail.addError('exists');
				}
			}
		};
		
		$(document).ready(function (){
			mail.init(); // initiliases the mail object
		});
	</script>

<?php get_footer(); ?>