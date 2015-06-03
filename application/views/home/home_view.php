<div class="row">

		<div class="span8">	
			<form id="login_form" class="form-horizontal" method="post" action="<?=site_url('api/login')?>">	
				
				<div class="control-group">
					<label class="control-label">Login</label>

					<div class="controls">
						<input type="text" name="login" class="input-xlarge">
					</div>

				</div>

				<div class="control-group">
					<label class="control-label"> Password </label>
					<div class="controls">
						<input type="text" name="password" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<input type="submit" value="Login" class="btn btn-primary" />
					</div>
				</div>
			</form>
			<a href="<?=site_url('register') ?>"> Register </a>

			<h3><i class="icon-music" style="color:blue;font-size:40px;"></i> Like </h3>
		</div><!--end span8 -->

		<table class="table table-bordered">
			<tr class="success">
    			<td>1</td>
    			<td>TB - Monthly</td>
    			<td>01/04/2012</td>
    			<td>Approved</td>
  			</tr>
  			<tr class="error">
    			<td>1</td>
    			<td>TB - Monthly</td>
    			<td>01/04/2012</td>
    			<td>Approved</td>
  			</tr>
		</table>



<a class="btn btn-default" href="#" role="button"><i class="icon-music" style="color:blue;font-size:40px;"></i> Link</a>
<button class="btn btn-default" type="submit">Button</button>
<input class="btn btn-default" type="button" value="Input">
<input class="btn btn-default" type="submit" value="Submit">
	</div><!--end row -->


	<script>
	$(function(){
		$('#login_form').submit(function(evt){

			evt.preventDefault();

			var url = $(this).attr('action');
			var postData = $(this).serialize();
			
			$.post(url, postData, function(o) {

				if(o.result == 1) {
					window.location.href="<?=site_url('dashboard')?>";
				}
				else{
					alert('invalid login');
				}
			});
		});
	});
	</script>