<!-- <div class="page-header flex-wrap">
    <div class="header-left">
      <button class="btn btn-primary mb-2 mb-md-0 me-2"><i class="fa fa-plus"> Create New Patient</i></button>
    </div>
</div>
 -->
 <h1 class="mb-5">New Patient Form</h1>
<div class="row">
  <form class="col-6" method="post" action="database/functions.php">
    <div class="form-group">
      <label for="ptname">Patient Name</label>
      <input type="text" class="form-control" name="ptname" id="ptname" aria-describedby="emailHelp" placeholder="Enter Patient Name">
    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="age">Age</label>
        <input type="text" class="form-control" name="age" id="age" placeholder="Age">
    </div>
    <div class="mt-5 row col-6">
      <div class="form-group col-6">
          <label for="male">Male</label><input type="radio" id="male" name="gender" value="male">
      </div>
      <div class="form-group col-6">
          <label for="female">Female</label><input type="radio" id="female" name="gender" value="female">
      </div>
    </div>
    </div>
    <div class="form-group">
      <label for="ptid">Patient ID</label>
      <input type="text" class="form-control" name="ptid" id="ptid" aria-describedby="emailHelp" placeholder="Enter Patient ID">
    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="ctname">Consultant Name</label>
        <!-- <input type="text" class="form-control" name="ctname" id="ctname" aria-describedby="emailHelp" placeholder="Enter Consultant Name"> -->
        <select name="ctname" aria-describedby="emailHelp" id="ctname" class="form-control">
          <?php $data = get_consultant_list(); ?>
          <?php foreach ($data as $key => $value): ?>
          <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group col-6">
        <label for="ctname">Oncologist Name</label>
        <!-- <input type="text" class="form-control" name="onname" id="ctname" aria-describedby="emailHelp" placeholder="Enter Oncologist Name"> -->
        <select name="onname" aria-describedby="emailHelp" id="ctname" class="form-control">
          <?php $data1 = get_consultant_list(); ?>
          <?php foreach ($data1 as $key => $value): ?>
          <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="diagnosis">Diagnosis</label>
      <textarea class="form-control" rows="10" name="diagnosis" id="diagnosis"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="ptsave">Save</button>
  </form>
<div class="col-6">
  <h1>Follow Up & Plans</h1>
  <h1>For The Next 5 Days</h1>
  <?php date_default_timezone_set('Asia/Rangoon');?>
  <?php 
    $date = date("d");
    $data = get_followupandplan_with_id_for_noti($date); 
  ?>
  
  <?php foreach ($data as $key => $value): ?>
    <?php foreach ($value as $key => $value1): ?>
      <?php
        $ptname = pt_with_ptid($value1[1]);
        $constname = const_with_id($ptname[0][5]);
        $onname = const_with_id($ptname[0][6]);
      ?>
      <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <h1 class="list-group-item" style="font-size: 20px"><?php echo $ptname[0][1]; ?></h1>
          <li class="list-group-item">Age : <?php echo $ptname[0][2]; ?></li>
          <li class="list-group-item">Consultant : <?php echo $constname[0][1]; ?></li>
          <li class="list-group-item">Oncologist : <?php echo $onname[0][1]; ?></li>
          <li class="list-group-item">Follow Up & Plan : <?php echo $value1[3]; ?></li>
          <li class="list-group-item">Date : <?php echo $value1[2]; ?></li>
        </ul>
        <div class="card-body">
          <a href="index.php?text=followupandplan&viewid=<?php echo $value1[0]; ?>" class="btn btn-info">View</a>
          <a class="btn btn-primary" href="index.php?text=followupandplan&followupandplanidedit=<?php echo $value1[0]; ?>">Edit</a>
          <a class="btn btn-danger">Delete</a>
        </div>
      </div><br>
    <?php endforeach; ?>
  <?php endforeach; ?>
</div>
</div>