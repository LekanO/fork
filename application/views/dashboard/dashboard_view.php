<div id="error" class="alert alert-error hide"> </div>
<div id="success" class="alert alert-success hide"> </div>

<div class="row">	
		<div id="dashboard-side" class="span4">
				<form  id="create_todo" class="form-inline" method="post" action="<?=site_url('api/create_todo')?>">
					<input type="text" name="content" class="input-medium" />
					<input type="submit" value="Create" class="btn btn-primary" />
				</form>
				<div id="list_todo"> <!-- Dynamic --> </div>			
			</div>

	<div id="dashboard-main" class="span8">
		<form id="create_note" class="form-inline" method="post" action="<?=site_url('api/create_note')?>">
			<input type="text" class="input-medium" name="create-node"/>
			<textarea rows="3"></textarea>
			<input type="submit" value="Create" class="btn btn-primary" />
		</form>
	</div>
</div>