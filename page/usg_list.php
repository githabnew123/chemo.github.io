<h1 class="mb-5">New USG Form</h1>
<div class="row">
  	<form class="col-6" method="post" action="database/functions.php">
	  <div class="form-group">
	    <label for="usg">USG Name</label>
	    <input type="text" class="form-control" name="usg" id="usg" aria-describedby="emailHelp" placeholder="Enter USG Name">
	  </div>
	  <button type="submit" class="btn btn-primary" name="usgsave">Save</button>
	</form>
	<div class="col-6">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">USG Name</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $data = usg_list(); ?>
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