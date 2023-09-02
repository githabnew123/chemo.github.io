<!-- <form>
  <div class="row">
    <div class="form-group col-3">
      <label for="ctname">Search With Patient Name</label>
      <input type="text" class="form-control" name="ctname" id="ctname" aria-describedby="emailHelp" placeholder="Enter Patient Name">
    </div>
    <div class="form-group col-3">
      <label for="pid">Search With Patient ID</label>
      <input type="text" class="form-control" name="pid" id="pid" aria-describedby="emailHelp" placeholder="Enter Patient ID">
    </div>
    <div class="form-group col-3">
      <label for="date">Search With Date</label>
      <input type="text" class="form-control" name="date" id="date" aria-describedby="emailHelp" placeholder="Enter Patient Name">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Search</button>
</form> -->
<?php if (isset($_GET['id'])): ?>
  <div class="page-header flex-wrap">
    <div class="header-left">
      <a href="index.php?text=case_summary&caseid=<?php echo $_GET['id']; ?>" class="btn btn-primary mb-2 mb-md-0 me-2"><i class="fa fa-plus"> Create New Case Summary</i></a>
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
          <th scope="col">Case Summary</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $data = case_summary_with_ptid($_GET['id']);
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
              for ($x=0; $x < 30; $x++) { 
                echo $str[$x];
              }
              echo ".....";
            ?>
          </td>
          <td><a href="index.php?text=case_summary&viewid=<?php echo $value[0]; ?>" class="btn btn-info">View</a></td>
          <td><a href="index.php?text=case_summary&caseidedit=<?php echo $value[0]; ?>" class="btn btn-info">Edit</a></td>
          <td><a href="" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
  <?php endif; ?>

<?php if (isset($_GET['caseid'])):?>
  <?php date_default_timezone_set('Asia/Rangoon');?>
  <?php $data = pt_with_ptid($_GET['caseid']); ?>
  <h1><?php echo $data[0][1]; ?></h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <form method="post" action="database/functions.php">
    <div class="form-group">
      <h2>Case</h2>
      <textarea class="form-control" name="case_detail" rows="10"></textarea>
      <input type="hidden" name="ptid" value="<?php echo $_GET['caseid']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="newcase" value="Save">
  </form>
<?php endif; ?>

<?php if (isset($_GET['caseidedit'])): ?>

  <?php date_default_timezone_set('Asia/Rangoon');?>
  <?php $data = get_case_with_id($_GET['caseidedit']); ?>
  <?php //print_r($data);?>
  <?php $data2 = pt_with_ptid($data[0][1]); ?>
  <h1><?php echo $data2[0][1]; ?></h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <form method="post" action="database/functions.php">
    <div class="form-group">
      <h2>Case Edit</h2>
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
      <textarea class="form-control" name="case_detail" rows="10">
      <?php
        echo $data[0][3];
       ?>
       </textarea>
      <input type="hidden" name="ptid" value="<?php echo $data2[0][0]; ?>">
      <input type="hidden" name="caseid" value="<?php echo $_GET['caseidedit']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="caseedit" value="Save">
  </form>
<?php endif; ?>

<?php if((!isset($_GET['id'])) && (!isset($_GET['caseid'])) && (!isset($_GET['caseidedit'])) && (!isset($_GET['viewid']))): ?>
  <h1>Case Summary</h1>
  <a class="nav-link dropdown-toggle btn btn-primary col-2" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"><div class="nav-profile-text" style="font-size: 20px;">Patient List</div></a>
      <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
        <?php $pt = pt_list(); ?>
        <?php foreach ($pt as $key => $value): ?>
          <a class="dropdown-item" href="index.php?text=case_summary&result=<?php echo $value[0]; ?>"><?php echo $value[1]; ?></a>
        <?php endforeach; ?>
        <div class="dropdown-divider"></div>
      </div>
    <?php if (isset($_GET['result'])):?>
      <?php $data = case_summary_with_ptid($_GET['result']); $ptname = pt_with_ptid($data[0][1]); ?>
      <h1><?php echo $ptname[0][1]; ?>(<?php echo $ptname[0][2]; ?> yrs / <?php echo $ptname[0][4]; ?>)</h1>
      <div class="card" style="width: 100%;">
        <div class="card-body">
          <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Date</th>
              <th scope="col">Case Summary</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $data = case_summary_with_ptid($_GET['result']);
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
                  for ($x=0; $x < 30; $x++) { 
                    echo $str[$x];
                  }
                  echo ".....";
                ?>
              </td>
              <td><a href="index.php?text=case_summary&viewid=<?php echo $value[0]; ?>" class="btn btn-info">View</a></td>
              <td><a href="index.php?text=case_summary&caseidedit=<?php echo $value[0]; ?>" class="btn btn-info">Edit</a></td>
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
  <?php $data = get_case_with_id($_GET['viewid']); ?>
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