<?php if (isset($_GET['id'])):?>
  <?php $data = pt_with_ptid($_GET['id']); ?>
  <form class="col-6" method="post" action="database/functions.php">
    <div class="form-group">
      <label for="ptname">Patient Name</label>
      <input type="text" class="form-control" name="ptname" id="ptname" aria-describedby="emailHelp" placeholder="" value="<?php echo $data[0][1]; ?>">
    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="age">Age</label>
        <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?php echo $data[0][2]; ?>">
    </div>
    <div class="mt-5 row col-6">
      <div class="form-group col-6">
          <label for="male">Male</label><input type="radio" id="male" name="gender" value="male" required="required">
      </div>
      <div class="form-group col-6">
          <label for="female">Female</label><input type="radio" id="female" name="gender" value="female" required="required">
      </div>
    </div>
    </div>
    <div class="form-group">
      <label for="ptid">Patient ID</label>
      <input type="text" class="form-control" name="ptid" id="ptid" aria-describedby="emailHelp" placeholder="Enter Patient ID" value="<?php echo $data[0][4]; ?>">
    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="ctname">Consultant Name</label>
        <select name="ctname" aria-describedby="emailHelp" id="ctname" class="form-control">
          <?php $constname = const_with_id($data[0][5]);?>
          <option value="<?php echo $data[0][5]; ?>"><?php echo $constname[0][1]; ?></option>
          <?php $data1 = get_consultant_list(); ?>
          <?php foreach ($data1 as $key => $value1): ?>
          <option value="<?php echo $value1[0]; ?>"><?php echo $value1[1]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group col-6">
        <label for="ctname">Oncologist Name</label>
        <select name="onname" aria-describedby="emailHelp" id="ctname" class="form-control">
          <?php $constname = const_with_id($data[0][6]);?>
          <option value="<?php echo $data[0][6]; ?>"><?php echo $constname[0][1]; ?></option>
          <?php $data1 = get_consultant_list();?>
          <?php foreach ($data1 as $key => $value1): ?>
          <option value="<?php echo $value1[0]; ?>"><?php echo $value1[1]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="diagnosis">Diagnosis</label>
      <textarea class="form-control" rows="10" name="diagnosis" id="diagnosis"><?php echo $data[0][7]; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <button type="submit" class="btn btn-primary" name="ptupdate">Save</button>
  </form>
<?php endif;?>
<?php if(!isset($_GET['id'])): ?>
<h1>Patient List</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Patient ID</th>
      <th scope="col">Case</th>
      <th scope="col">Investigation</th>
      <th scope="col">Treatment</th>
      <th scope="col">Follow Up & Plan</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $data = pt_list();
      $i = 1;
      foreach ($data as $key => $value):
    ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $value[1]; ?></td>
      <td><?php echo $value[2]; ?></td>
      <td><?php echo $value[4]; ?></td>
      <td><a href="index.php?text=case_summary&id=<?php echo $value[0]; ?>" class="btn btn-info">Case</a></td>
      <td><a href="index.php?text=investigation_list&id=<?php echo $value[0]; ?>" class="btn btn-info">Investigation</a></td>
      <td><a href="index.php?text=treatment_list&id=<?php echo $value[0]; ?>" class="btn btn-info">Treatment</a></td>
      <td><a href="index.php?text=followupandplan&id=<?php echo $value[0]; ?>" class="btn btn-info">Follow Up & Plan</a></td>
      <td><a href="index.php?text=patient_list&id=<?php echo $value[0]; ?>" class="btn btn-info">Edit Info</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>