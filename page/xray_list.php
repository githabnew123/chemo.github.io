<h1 class="mb-5">New X Ray Form</h1>
<div class="row">
  	<form class="col-6" method="post" action="database/functions.php">
	  <div class="form-group">
	    <label for="xray">X Ray Name</label>
	    <input type="text" class="form-control" name="xray" id="xray" aria-describedby="emailHelp" placeholder="Enter X Ray Name">
	  </div>
	  <button type="submit" class="btn btn-primary" name="xraysave">Save</button>
	</form>
	<div class="col-6">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">X Ray Name</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $data = xray_list(); ?>
		  	<?php foreach ($data as $key => $value): ?>
		    <tr>
		      <th scope="row"><?php echo $value[0]; ?></th>
		      <td><?php echo $value[1]; ?></td>
		    </tr>
			<?php endforeach; ?>
		  </tbody>
		</table>
	</div>
</div>