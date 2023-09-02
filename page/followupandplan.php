<?php if (isset($_GET['id'])): ?>
  <div class="page-header flex-wrap">
    <div class="header-left">
      <a href="index.php?text=followupandplan&followupandplanid=<?php echo $_GET['id']; ?>" class="btn btn-primary mb-2 mb-md-0 me-2"><i class="fa fa-plus"> Create New Follow Up & Plan</i></a>
    </div>
  </div>
  <div class="card" style="width: 100%;">
    <div class="card-body">
      <?php $data = pt_with_ptid($_GET['id']); ?>
      <h5 class="card-title"><?php echo $data[0][1]; ?></h5>
      <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Date</th>
          <th scope="col">Follow Up & Plan</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $data = followupandplan_with_ptid($_GET['id']);
        $i = 1;
        $data1 = pt_with_ptid($_GET['id']);
        foreach ($data as $key => $value):
      ?>
        <tr>
          <th scope="row"><?php echo $i++; ?></th>
          <td><?php echo $data1[0][1];?></td>
          <td><?php echo $value[2];?></td>
          <td width="30%">
            <?php 
              $str = str_split($value[3]);
              for ($x=0; $x < 10; $x++) { 
                echo $str[$x];
              }
              echo ".....";
            ?>
          </td>
          <td><a href="index.php?text=followupandplan&viewid=<?php echo $value[0]; ?>" class="btn btn-info">View</a></td>
          <td><a href="index.php?text=followupandplan&followupandplanidedit=<?php echo $value[0]; ?>" class="btn btn-info">Edit</a></td>
          <td><a href="" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
  <?php endif; ?>

<?php if (isset($_GET['followupandplanid'])):?>
  <?php date_default_timezone_set('Asia/Rangoon');?>
  <?php $data = pt_with_ptid($_GET['followupandplanid']); ?>
  <h1><?php echo $data[0][1]; ?></h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <form method="post" action="database/functions.php">
    <div class="form-group">
      <h2>Follow Up & Plan</h2>
      <div class="container">
        <div class="form-group col-3">
          <label for="from" style="font-size:20px;">Date</label>
          <input type="date" style="font-size:20px;" class="form-control" id="from" name="date">
        </div>
        <div class="form-group col-9">
          <label for="from" style="font-size:20px;">Follow Up & Plan</label>
          <textarea class="form-control" name="case_detail" rows="10"></textarea>
        </div>
      </div>                                                                          
      <input type="hidden" name="ptid" value="<?php echo $_GET['followupandplanid']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="newfollowupandplan" value="Save">
  </form>
<?php endif; ?>

<?php if (isset($_GET['followupandplanidedit'])): ?>

  <?php date_default_timezone_set('Asia/Rangoon');?>
  <?php $data = followupandplan_with_id($_GET['followupandplanidedit']); ?>
  <?php //print_r($data);?>
  <?php $data2 = pt_with_ptid($data[0][1]); ?>
  <h1><?php echo $data2[0][1]; ?></h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <form method="post" action="database/functions.php">
    <div class="form-group">
      <h2>Follow Up & Plan Edit</h2>
       <div class="row">
         <div class="form-group col-3">
            <label for="from" style="font-size:20px;">New Date</label>
            <input type="date" style="font-size:20px;" class="form-control" id="from" name="date">
          </div>
          <div class="form-group col-3">
            <label for="from" style="font-size:20px;">Old Date</label>
            <input type="text" style="font-size:20px;" class="form-control" id="from" value="<?php echo $data[0][2];?>" disabled="disabled">
          </div>
       </div>
        <div class="form-group col-9">
          <label for="from" style="font-size:20px;">Follow Up & Plan</label>
          <textarea class="form-control" name="case_detail" rows="10">
            <?php
              echo $data[0][3];
             ?>
          </textarea>
        </div>
      <input type="hidden" name="ptid" value="<?php echo $data2[0][0]; ?>">
      <input type="hidden" name="caseid" value="<?php echo $_GET['followupandplanidedit']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="followupandplanidedit" value="Save">
  </form>
<?php endif; ?>

<?php if((!isset($_GET['id'])) && (!isset($_GET['followupandplanid'])) && (!isset($_GET['followupandplanidedit'])) && (!isset($_GET['viewid']))): ?>
  <h1>Follow Up & Plans</h1>
  <a class="nav-link dropdown-toggle btn btn-primary col-2" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"><div class="nav-profile-text" style="font-size: 20px;">Patient List</div></a>
  <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
  <?php $pt = pt_list(); ?>
    <?php foreach ($pt as $key => $value): ?>
    <a class="dropdown-item" href="index.php?text=followupandplan&result=<?php echo $value[0]; ?>"><?php echo $value[1]; ?></a>
    <?php endforeach; ?>
    <div class="dropdown-divider"></div>
  </div>
  <?php if (isset($_GET['result'])):?>
      <?php $data = get_followupandplan_with_id($_GET['result']); $ptname = pt_with_ptid($data[0][1]); ?>
      <h1><?php echo $ptname[0][1]; ?>(<?php echo $ptname[0][2]; ?> yrs / <?php echo $ptname[0][4]; ?>)</h1>
      <div class="card" style="width: 100%;">
    <div class="card-body">
      <?php $data = pt_with_ptid($_GET['result']); ?>
      <h5 class="card-title"><?php echo $data[0][1]; ?></h5>
      <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Date</th>
          <th scope="col">Follow Up & Plan</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $data = followupandplan_with_ptid($_GET['result']);
        $i = 1;
        $data1 = pt_with_ptid($_GET['result']);
        foreach ($data as $key => $value):
      ?>
        <tr>
          <th scope="row"><?php echo $i++; ?></th>
          <td><?php echo $data1[0][1];?></td>
          <td><?php echo $value[2];?></td>
          <td width="30%">
            <?php 
              $str = str_split($value[3]);
              for ($x=0; $x < 10; $x++) { 
                echo $str[$x];
              }
              echo ".....";
            ?>
          </td>
          <td><a href="index.php?text=followupandplan&viewid=<?php echo $value[0]; ?>" class="btn btn-info">View</a></td>
          <td><a href="index.php?text=followupandplan&followupandplanidedit=<?php echo $value[0]; ?>" class="btn btn-info">Edit</a></td>
          <td><a href="" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
  <?php endif; ?>
  <?php if(!isset($_GET['result'])): ?>
    <div class="col-6">
      <h1>For The Next 5 Days</h1>
      <?php date_default_timezone_set('Asia/Rangoon');?>
      <?php 
        $date = date("d");
        $data = get_followupandplan_with_id_for_noti($date); 
      ?>
      <?php //print_r($data); ?>
      <?php foreach ($data as $key => $value): ?>
        <?php foreach ($value as $key => $value1): ?>
          <?php
            $ptname = pt_with_ptid($value1[1]);
            $constname = const_with_id($ptname[0][5]);
            $onname = const_with_id($ptname[0][6]);
          ?>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h1 class="card-title"><?php echo $ptname[0][1]; ?></h1>
              <p class="card-text">Follows & Plan</p>
            </div>
            <ul class="list-group list-group-flush">
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
  <?php endif; ?>
<?php endif; ?>

<?php if(isset($_GET['viewid'])): ?>
  <?php $data = followupandplan_with_id($_GET['viewid']); ?>
  <!-- <?php print_r($data); ?> -->
  <?php $data2 = pt_with_ptid($data[0][1]); ?>
  <h1><?php echo $data2[0][1]; ?></h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <div class="form-group col-3">
    <label for="from" style="font-size:20px;">Date</label>
    <input type="text" style="font-size:20px;" class="form-control" id="from" value="<?php echo $data[0][2];?>" disabled="disabled">
  </div>
  <textarea class="form-control" name="case_detail" rows="10">
    <?php
      echo $data[0][3];
    ?>
  </textarea>
<?php endif; ?>