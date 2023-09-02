<?php if (isset($_GET['id'])): ?>
  <div class="page-header flex-wrap">
    <div class="header-left">
      <a href="index.php?text=treatment_list&treatment_listid=<?php echo $_GET['id']; ?>" class="btn btn-primary mb-2 mb-md-0 me-2"><i class="fa fa-plus"> Create New Treatment</i></a>
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
          <th scope="col">Treatment Summary</th>
          <th scope="col">Regime</th>
          <th scope="col">Cycle-No</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $data = treatment_with_ptid($_GET['id']);
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
              for ($x=0; $x < 20; $x++) { 
                echo $str[$x];
              }
              echo ".....";
            ?>
          </td>
          <th><?php echo $value[4];?></th>
          <th><?php echo $value[5];?></th>
          <td><a href="index.php?text=treatment_list&viewid=<?php echo $value[0]; ?>" class="btn btn-info">View</a></td>
          <td><a href="index.php?text=treatment_list&treatmentedit=<?php echo $value[0]; ?>" class="btn btn-info">Edit</a></td>
          <td><a href="" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
  <?php endif; ?>

<?php if (isset($_GET['treatment_listid'])):?>
  <?php date_default_timezone_set('Asia/Rangoon');?>
  <?php $data = pt_with_ptid($_GET['treatment_listid']); ?>
  <h1><?php echo $data[0][1]; ?></h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <form method="post" action="database/functions.php">
    <div class="form-group">
      <h2>New Treatment</h2>
      <div class="container">
        <div class="row">
          <div class="form-group col-3">
            <label for="from" style="font-size:20px;">Date</label>
            <input type="date" style="font-size:20px;" class="form-control" id="from" name="date">
          </div>
          <div class="form-group col-3">
            <label for="regime" style="font-size:20px;">REGIME</label>
            <input type="text" style="font-size:20px;" class="form-control" id="regime" name="regime">
          </div>
          <div class="form-group col-3">
            <label for="cycle" style="font-size:20px;">CYCLE NO</label>
            <input type="text" style="font-size:20px;" class="form-control" id="cycle" name="cycle">
          </div>
          </div>
          <div class="form-group col-9">
            <label for="from" style="font-size:20px;">Treatment / Chemo Cycle</label>
            <textarea class="form-control" name="case_detail" rows="10"></textarea>
          </div>
      </div>                                                                          
      <input type="hidden" name="ptid" value="<?php echo $_GET['treatment_listid']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="newtreatment" value="Save">
  </form>
<?php endif; ?>

<?php if (isset($_GET['treatmentedit'])): ?>

  <?php date_default_timezone_set('Asia/Rangoon');?>
  <?php $data = get_treatment_with_id($_GET['treatmentedit']); ?>
  <?php //print_r($data);?>
  <?php $data2 = pt_with_ptid($data[0][1]); ?>
  <h1><?php echo $data2[0][1]; ?></h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <form method="post" action="database/functions.php">
    <div class="form-group">
      <h2>Treatment Edit</h2>
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
       <div class="row">
         <div class="form-group col-3">
            <label for="from" style="font-size:20px;">Regime</label>
            <input type="text" style="font-size:20px;" class="form-control" id="from" name="regime" value="<?php echo $data[0][4];?>">
          </div>
          <div class="form-group col-3">
            <label for="from" style="font-size:20px;">Cycle No</label>
            <input type="text" style="font-size:20px;" class="form-control" id="from" name="cycle" value="<?php echo $data[0][5];?>">
          </div>
       </div>
        <div class="form-group col-9">
          <label for="from" style="font-size:20px;">Treatment</label>
          <textarea class="form-control" name="case_detail" rows="10">
            <?php
              echo $data[0][3];
             ?>
          </textarea>
        </div>
      <input type="hidden" name="ptid" value="<?php echo $data2[0][0]; ?>">
      <input type="hidden" name="caseid" value="<?php echo $_GET['treatmentedit']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="treatmentedit" value="Save">
  </form>
<?php endif; ?>

<?php if((!isset($_GET['id'])) && (!isset($_GET['treatment_listid'])) && (!isset($_GET['treatmentedit'])) && (!isset($_GET['viewid']))): ?>
  <h1>Treatment Summary</h1>
  <a class="nav-link dropdown-toggle btn btn-primary col-2" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"><div class="nav-profile-text" style="font-size: 20px;">Patient List</div></a>
      <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
        <?php $pt = pt_list(); ?>
        <?php foreach ($pt as $key => $value): ?>
          <a class="dropdown-item" href="index.php?text=treatment_list&result=<?php echo $value[0]; ?>"><?php echo $value[1]; ?></a>
        <?php endforeach; ?>
        <div class="dropdown-divider"></div>
      </div>
    <?php if (isset($_GET['result'])):?>
      <?php $data = treatment_with_ptid($_GET['result']); $ptname = pt_with_ptid($data[0][1]); ?>
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
              <th scope="col">Treatment Summary</th>
              <th scope="col">Regime</th>
              <th scope="col">Cycle-No</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $data = treatment_with_ptid($_GET['result']);
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
                  for ($x=0; $x < 20; $x++) { 
                    echo $str[$x];
                  }
                  echo ".....";
                ?>
              </td>
              <th><?php echo $value[4];?></th>
              <th><?php echo $value[5];?></th>
              <td><a href="index.php?text=treatment_list&viewid=<?php echo $value[0]; ?>" class="btn btn-info">View</a></td>
              <td><a href="index.php?text=treatment_list&treatmentedit=<?php echo $value[0]; ?>" class="btn btn-info">Edit</a></td>
              <td><a href="" class="btn btn-danger">Delete</a></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        </div>
      </div>
    <?php endif; ?>
<?php endif; ?>

<?php if(isset($_GET['viewid'])): ?>
  <?php $data = get_treatment_with_id($_GET['viewid']); ?>
  <?php $data2 = pt_with_ptid($data[0][1]); ?>
  <h1><?php echo $data2[0][1]; ?></h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <div class="form-group col-3">
    <label for="from" style="font-size:20px;">Date</label>
    <input type="text" style="font-size:20px;" class="form-control" id="from" value="<?php echo $data[0][2];?>" disabled="disabled">
  </div>
  <div class="row">
    <div class="form-group col-3">
      <label for="from" style="font-size:20px;">Regime</label>
      <input type="text" style="font-size:20px;" class="form-control" id="from" name="regime" value="<?php echo $data[0][4];?>">
    </div>
    <div class="form-group col-3">
      <label for="from" style="font-size:20px;">Cycle No</label>
      <input type="text" style="font-size:20px;" class="form-control" id="from" name="cycle" value="<?php echo $data[0][5];?>">
    </div>
  </div>
  <textarea class="form-control" name="case_detail" rows="10">
    <?php
      echo $data[0][3];
    ?>
  </textarea>
<?php endif; ?>