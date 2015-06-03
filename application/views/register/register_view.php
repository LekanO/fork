	<div class="row">

		<div class="span8">	
			<div id="register-form-error" class="alert alert-error"><!--dynamic --> </div>
			<form id="register_form" class="form-horizontal" method="post" action="<?=site_url('api/register')?>">	
				
				<div class="control-group">
					<label class="control-label">First Name</label>

					<div class="controls">
						<input type="text" name="fname" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Last Name</label>

					<div class="controls">
						<input type="text" name="lname" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Login</label>

					<div class="controls">
						<input type="text" name="login" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Email</label>

					<div class="controls">
						<input type="text" name="email" class="input-xlarge">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Password</label>

					<div class="controls">
						<input type="text" name="password" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"> Confirm Password </label>
					<div class="controls">
						<input type="text" name="confirm_password" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<input type="submit" value="Register" class="btn btn-primary" />
					</div>
				</div>
			</form>
			<a href="<?=site_url('home/register') ?>"> Register </a>
		</div><!--end span8 -->

	</div><!--end row -->

	<script>
	$(function(){
		
		$("#register-form-error").hide();

		$("#register_form").submit(function(evt){

			evt.preventDefault();
			
			var url = $(this).attr('action');
			var postData = $(this).serialize();
			
			$.post(url, postData, function(o) {

				if(o.result ==1 ) {
					alert('valid registration');
				}
				else{
				$("#register-form-error").show();
					var output = '<ul>';				
						for(var key in o.error){
							var value = o.error[key];
							output+= '<li>' + value + '</li>';
							}
						output+= '</ul>';
				$("#register-form-error").html(output);
				}
			});
		});
	});
	</script>
</body>
</html>