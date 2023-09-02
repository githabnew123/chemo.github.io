<h1 class="mb-5">New Consultant Form</h1>
<div class="row">
  	<form class="col-6" method="post" action="database/functions.php">
	  <div class="form-group">
	    <label for="ctname">Consultant Name</label>
	    <input type="text" class="form-control" name="ctname" id="ctname" aria-describedby="emailHelp" placeholder="Enter Patient Name">
	  </div>
	  <button type="submit" class="btn btn-primary" name="ctsave">Save</button>
	</form>
	<div class="col-6">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Dr Name</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $data = const_list(); ?>
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