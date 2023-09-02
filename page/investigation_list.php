<?php if (isset($_GET['id'])): ?>
  <div class="page-header flex-wrap">
    <div class="header-left">
      <a href="index.php?text=investigation_list&investigation_listid=<?php echo $_GET['id']; ?>" class="btn btn-primary mb-2 mb-md-0 me-2"><i class="fa fa-plus"> Create New Investigation</i></a>
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
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $data = investigation_with_ptid($_GET['id']);
        $i = 1;
        $data1 = pt_with_ptid($_GET['id']);
        foreach ($data as $key => $value):
      ?>
        <tr>
          <th scope="row"><?php echo $i++; ?></th>
          <td><?php echo $data1[0][1];?></td>
          <td><?php echo $value[0][2];?></td>
          <td><a href="index.php?text=investigation_list&investigationidedit=<?php echo $value[0][0]; ?>" class="btn btn-info">Edit</a></td>
          <td><a href="" class="btn btn-danger">Delete</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
<?php endif; ?>

<?php if (isset($_GET['investigation_listid'])):?>
  <?php date_default_timezone_set('Asia/Rangoon');?>
  <?php $data = pt_with_ptid($_GET['investigation_listid']); ?>
  <h1><?php echo $data[0][1]; ?>(<?php echo $data[0][2]; ?> yrs / <?php echo $data[0][4]; ?>)</h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <form method="post" action="database/functions.php">
    <div class="form-group">
      <h2>New Investigation</h2>
      <div class="container">
        <!-- X-Ray, USG, Echo, Haemogram (WBC,Hb,Platelet,Neut), Creatinine, Electrolytes(Na,K,Cl,HCO3), LFT(TB, ALP, ALT, AST), Biopsy, CT -->
        <div class="form-group col-3">
          <label for="from" style="font-size:20px;">Date</label>
          <input type="date" style="font-size:20px;" class="form-control" id="from" name="date">
        </div>
        
        <hr>
        <h3>Haemogram</h3>
        <div class="row">
          <div class="form-group col-3">
            <label for="wbc" style="font-size:20px;">WBC</label>
            <input type="text" name="wbc" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="hbresult" style="font-size:20px;">Hb</label>
            <input type="text" name="hb" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="platelet" style="font-size:20px;">Platelet</label>
            <input type="text" name="platelet" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="neut" style="font-size:20px;">Neut</label>
            <input type="text" name="neut" class="form-control" aria-describedby="emailHelp" >
          </div>
        </div>
        <hr>
        <h3>Electrolytes</h3>
        <div class="row">
          <div class="form-group col-3">
            <label for="na" style="font-size:20px;">Na</label>
            <input type="text" name="na" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="k" style="font-size:20px;">K</label>
            <input type="text" name="k" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="cl" style="font-size:20px;">Cl</label>
            <input type="text" name="cl" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="hco3" style="font-size:20px;">HCO3</label>
            <input type="text" name="hco3" class="form-control" aria-describedby="emailHelp" >
          </div>
        </div>
        <hr>
        <h3>LFT</h3>
        <div class="row">
          <div class="form-group col-3">
            <label for="tb" style="font-size:20px;">TB</label>
            <input type="text" name="tb" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="alp" style="font-size:20px;">ALP</label>
            <input type="text" name="alp" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="alt" style="font-size:20px;">ALT</label>
            <input type="text" name="alt" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="ast" style="font-size:20px;">AST</label>
            <input type="text" name="ast" class="form-control" aria-describedby="emailHelp" >
          </div>
        </div>
        <hr>
        <h3></h3>
        <div class="row">
          <div class="form-group col-3">
            <label for="ast" style="font-size:20px;">Creatinine</label>
            <input type="text" name="creatinine" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="alp" style="font-size:20px;">HBs Ag</label>
            <input type="text" name="hbsag" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="alt" style="font-size:20px;">Anti-HCV</label>
            <input type="text" name="antihcv" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="ast" style="font-size:20px;">Retro Test</label>
            <input type="text" name="retro" class="form-control" aria-describedby="emailHelp" >
          </div>
        </div>
        <div class="row">
          <div class="form-group col-3">
            <label for="aborhgrouping" style="font-size:20px;">ABO & Rh Grouping</label>
            <input type="text" name="aborhgrouping" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="ca153" style="font-size:20px;">CA 153</label>
            <input type="text" name="ca153" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="cea" style="font-size:20px;">CEA</label>
            <input type="text" name="cea" class="form-control" aria-describedby="emailHelp" >
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="form-group col-3">
            <label for="xray" style="font-size:20px;">X Ray</label>
            <select name="xray" style="font-size:15px;" aria-describedby="emailHelp" id="xray" class="form-control">
              <?php $data1 = get_xray_list(); ?>
              <?php foreach ($data1 as $key => $value): ?>
              <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-3">
            <label for="xrayresult" style="font-size:20px;">X Ray Result</label>
            <input type="text" name="xrayresult" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-3">
            <label for="usg" style="font-size:20px;">USG</label>
            <select name="usg" style="font-size:15px;" aria-describedby="emailHelp" id="usg" class="form-control">
              <?php $data1 = get_usg_list(); ?>
              <?php foreach ($data1 as $key => $value): ?>
              <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-3">
            <label for="usgresult" style="font-size:20px;">USG Result</label>
            <input type="text" name="usgresult" class="form-control" aria-describedby="emailHelp" >
          </div>
        </div>
        <div class="row">
          <div class="form-group col-4">
            <label for="er" style="font-size:20px;">ER</label>
            <input type="text" name="er" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-4">
            <label for="pr" style="font-size:20px;">PR</label>
            <input type="text" name="pr" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-4">
            <label for="her" style="font-size:20px;">HER 2/neu (c_erb B-2)</label>
            <input type="text" name="her" class="form-control" aria-describedby="emailHelp" >
          </div>
          <div class="form-group col-12">
            <label for="echo" style="font-size:20px;">Echo</label>
            <textarea class="form-control" name="echo" rows="10"></textarea>
          </div>
          <div class="form-group col-12">
            <label for="biopsy" style="font-size:20px;">Biopsy</label>
            <textarea class="form-control" name="biopsy" rows="10"></textarea>
          </div>
          <div class="form-group col-12">
            <label for="ct" style="font-size:20px;">CT</label>
            <textarea class="form-control" name="ct" rows="10"></textarea>
          </div>
        </div>
      </div>                                                                          
      <input type="hidden" name="ptid" value="<?php echo $_GET['investigation_listid']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="newinvestigation" value="Save">
  </form>
<?php endif; ?>

<?php if (isset($_GET['investigationidedit'])): ?>

  <?php date_default_timezone_set('Asia/Rangoon');?>
  <?php $data = get_investigation_with_id($_GET['investigationidedit']); ?>
  <?php //print_r($data);?>
  <?php $data2 = pt_with_ptid($data[0][1]); ?>
  <h1><?php echo $data2[0][1]; ?>(<?php echo $data2[0][2]; ?> yrs / <?php echo $data2[0][4]; ?>)</h1>
  <h1><?php echo date("d-m-Y"); ?></h1>
  <form method="post" action="database/functions.php">
    <div class="form-group">
      <h2>Investigation Edit</h2>
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
        <hr>
        <h3>Haemogram</h3>
        <div class="row">
          <div class="form-group col-3">
            <label for="wbc" style="font-size:20px;">WBC</label>
            <input type="text" name="wbc" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][11];?>">
          </div>
          <div class="form-group col-3">
            <label for="hbresult" style="font-size:20px;">Hb</label>
            <input type="text" name="hb" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][12];?>">
          </div>
          <div class="form-group col-3">
            <label for="platelet" style="font-size:20px;">Platelet</label>
            <input type="text" name="platelet" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][13];?>">
          </div>
          <div class="form-group col-3">
            <label for="neut" style="font-size:20px;">Neut</label>
            <input type="text" name="neut" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][14];?>">
          </div>
        </div>
        <hr>
        <h3>Electrolytes</h3>
        <div class="row">
          <div class="form-group col-3">
            <label for="na" style="font-size:20px;">Na</label>
            <input type="text" name="na" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][15];?>" >
          </div>
          <div class="form-group col-3">
            <label for="k" style="font-size:20px;">K</label>
            <input type="text" name="k" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][16];?>" >
          </div>
          <div class="form-group col-3">
            <label for="cl" style="font-size:20px;">Cl</label>
            <input type="text" name="cl" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][17];?>" >
          </div>
          <div class="form-group col-3">
            <label for="hco3" style="font-size:20px;">HCO3</label>
            <input type="text" name="hco3" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][18];?>" >
          </div>
        </div>
        <hr>
        <h3>LFT</h3>
        <div class="row">
          <div class="form-group col-3">
            <label for="tb" style="font-size:20px;">TB</label>
            <input type="text" name="tb" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][19];?>">
          </div>
          <div class="form-group col-3">
            <label for="alp" style="font-size:20px;">ALP</label>
            <input type="text" name="alp" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][20];?>">
          </div>
          <div class="form-group col-3">
            <label for="alt" style="font-size:20px;">ALT</label>
            <input type="text" name="alt" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][21];?>">
          </div>
          <div class="form-group col-3">
            <label for="ast" style="font-size:20px;">AST</label>
            <input type="text" name="ast" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][22];?>">
          </div>
        </div>
        <hr>
        <h3></h3>
        <div class="row">
          <div class="form-group col-3">
            <label for="ast" style="font-size:20px;">Creatinine</label>
            <input type="text" name="creatinine" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][8];?>">
          </div>
          <div class="form-group col-3">
            <label for="alp" style="font-size:20px;">HBs Ag</label>
            <input type="text" name="hbsag" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][24];?>">
          </div>
          <div class="form-group col-3">
            <label for="alt" style="font-size:20px;">Anti-HCV</label>
            <input type="text" name="antihcv" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][25];?>">
          </div>
          <div class="form-group col-3">
            <label for="ast" style="font-size:20px;">Retro Test</label>
            <input type="text" name="retro" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][26];?>">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-3">
            <label for="tb" style="font-size:20px;">ABO & Rh Grouping</label>
            <input type="text" name="aborhgrouping" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][23];?>">
          </div>
          <div class="form-group col-3">
            <label for="ca153" style="font-size:20px;">CA 153</label>
            <input type="text" name="ca153" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][30];?>">
          </div>
          <div class="form-group col-3">
            <label for="cea" style="font-size:20px;">CEA</label>
            <input type="text" name="cea" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][31];?>">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="form-group col-3">
            <label for="xray" style="font-size:20px;">X Ray</label>
            <select name="xray" style="font-size:15px;" aria-describedby="emailHelp" id="xray" class="form-control">
              <?php $data1 = get_xray_list(); ?>
              <option value="<?php echo $data[0][3];?>"><?php echo $data[0][3];?></option>
              <?php foreach ($data1 as $key => $value): ?>
              <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-3">
            <label for="xrayresult" style="font-size:20px;">X Ray Result</label>
            <input type="text" name="xrayresult" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][4];?>">
          </div>
          <div class="form-group col-3">
            <label for="usg" style="font-size:20px;">USG</label>
            <select name="usg" style="font-size:15px;" aria-describedby="emailHelp" id="usg" class="form-control">
              <?php $data1 = get_usg_list(); ?>
              <option value="<?php echo $data[0][5];?>"><?php echo $data[0][5];?></option>
              <?php foreach ($data1 as $key => $value): ?>
              <option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-3">
            <label for="usgresult" style="font-size:20px;">USG Result</label>
            <input type="text" name="usgresult" class="form-control" aria-describedby="emailHelp" value="<?php echo $data[0][6];?>">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-4">
            <label for="er" style="font-size:20px;">ER</label>
            <input type="text" name="er" class="form-control" value="<?php echo $data[0][27];?>">
            <!-- <textarea class="form-control" name="er" rows="10"><?php echo $data[0][27];?></textarea> -->
          </div>
          <div class="form-group col-4">
            <label for="pr" style="font-size:20px;">PR</label>
            <input type="text" name="pr" class="form-control" value="<?php echo $data[0][28];?>">
            <!-- <textarea class="form-control" name="pr" rows="10"><?php echo $data[0][28];?></textarea> -->
          </div>
          <div class="form-group col-4">
            <label for="her" style="font-size:20px;">HER 2/neu (c_erb B-2)</label>
            <input type="text" name="her" class="form-control" value="<?php echo $data[0][29];?>">
            <!-- <textarea class="form-control" name="her" rows="10"><?php echo $data[0][29];?></textarea> -->
          </div>
          <div class="form-group col-12">
            <label for="echo" style="font-size:20px;">Echo</label>
            <!-- <input type="text" name="echo" class="form-control" value="<?php echo $data[0][7];?>"> -->
            <textarea class="form-control" name="echo" rows="10"><?php echo $data[0][7];?></textarea>
          </div>
          <div class="form-group col-12">
            <label for="biopsy" style="font-size:20px;">Biopsy</label>
            <!-- <input type="text" name="biopsy" class="form-control" value="<?php echo $data[0][9];?>"> -->
            <textarea class="form-control" name="biopsy" rows="10"><?php echo $data[0][9];?></textarea>
          </div>
          <div class="form-group col-12">
            <label for="ct" style="font-size:20px;">CT</label>
            <!-- <input type="text" name="ct" class="form-control" value="<?php echo $data[0][10];?>"> -->
            <textarea class="form-control" name="ct" rows="10"><?php echo $data[0][10];?></textarea>
          </div>
        </div>
      <input type="hidden" name="ptid" value="<?php echo $data2[0][0]; ?>">
      <input type="hidden" name="caseid" value="<?php echo $_GET['investigationidedit']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="investigationidedit" value="Save">
  </form>

<?php endif; ?>

<?php if((!isset($_GET['id'])) && (!isset($_GET['investigation_listid'])) && (!isset($_GET['investigationidedit']))): ?>
      <h1>Investigation Summary</h1>
      <a class="nav-link dropdown-toggle btn btn-primary col-2" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"><div class="nav-profile-text" style="font-size: 20px;">Patient List</div></a>
      <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
        <?php $pt = pt_list(); ?>
        <?php foreach ($pt as $key => $value): ?>
          <a class="dropdown-item" href="index.php?text=investigation_list&result=<?php echo $value[0]; ?>"><?php echo $value[1]; ?></a>
        <?php endforeach; ?>
        <div class="dropdown-divider"></div>
      </div>
      <?php if (isset($_GET['result'])):?>
        <?php 
        $data = investigation_with_ptid($_GET['result']); 
        foreach ($data as $key => $value) {
          //print_r($value[0][2]);echo "<br>";
        }
        $ptname = pt_with_ptid($data[0][0][1]); ?>
        <h1><?php echo $ptname[0][1]; ?>(<?php echo $ptname[0][2]; ?> yrs / <?php echo $ptname[0][4]; ?>)</h1>
        <?php $z=0; if(isset($_GET['next'])){$z=$_GET['next'];}?>
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="index.php?text=investigation_list&result=<?php echo $_GET['result']; ?>&next=<?php echo ($z-1);?>">Previous</a></li>
          <li class="page-item"><a class="page-link" href="index.php?text=investigation_list&result=<?php echo $_GET['result']; ?>&next=<?php echo ($z+1);?>">Next</a></li>
        </ul>
        <table class="table table-bordered mt-3 mb-5">
          <tbody>
            <!-- <tr>
              <th colspan="6"></th>
              <th class="col-1">HBs Ag</th>
              <th class="col-1">Anti-HCV</th>
              <th class="col-1">Retro Test</th>
            </tr> -->
            <tr>
              <th class="col-2" style="border: 1px solid black;padding: 5px;">Investigation</th>
              <th colspan="9" style="border: 1px solid black;">Date</th>
            </tr>
            <!-- Date -->
            <tr>
              <th class="col-1" style="border: 1px solid black;"></th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th class="col-1" style="border: 1px solid black;"><?php echo date("d-m-Y", strtotime($data[$i][0][2])); ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <!-- Date -->
            <!-- Haemogram -->
            <tr>
              <th id="left" style="border: 1px solid black;">Haemogram</th>
              <?php for ($i=0; $i < 9; $i++): ?>
                <th style="border: 1px solid black;"></th>
              <?php endfor; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">WBC</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][11]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">Hb</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][12]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">Platelet</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][13]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">Neut</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][14]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <!-- Haemogram -->
            <tr>
              <th id="left" style="border: 1px solid black;">Creatinine</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][8]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <!-- Electrolytes -->
            <tr>
              <th id="left" style="border: 1px solid black;">Electrolytes</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <th style="border: 1px solid black;"></th>
              <?php endfor; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">Na</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][15]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">K</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][16]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">Cl</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][17]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">HCO3</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][18]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <!-- Electrolytes -->
            <!-- LFT -->
            <tr>
              <th id="left" style="border: 1px solid black;">LFT</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <th style="border: 1px solid black;"></th>
              <?php endfor; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">TB</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][19]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">ALP</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][20]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">ALT</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][21]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th style="border: 1px solid black;">AST</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][22]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <!-- LFT -->
            <!-- X-Ray, USG, Echo, Haemogram (WBC,Hb,Platelet,Neut), Creatinine, Electrolytes(Na,K,Cl,HCO3), LFT(TB, ALP, ALT, AST), Biopsy, CT -->
            <tr>
              <th id="left" style="border: 1px solid black;">ABO & Rh Grouping</th>
              <?php for ($i=0; $i < 9; $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][23]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  $x = 9-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">HBs Ag</th>
              <?php for ($i=0; $i < 9; $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][24]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  $x = 9-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">Anti-HCV</th>
              <?php for ($i=0; $i < 9; $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][25]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  $x = 9-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">Retro Test</th>
              <?php for ($i=0; $i < 9; $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][26]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  $x = 9-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">X-Ray</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;">
                  <!-- <?php echo $data[$i][4]; ?> -->
                  <?php if($data[$i][0][4]!=null): ?>
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="btn btn-info" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                          See More
                        </a>
                        <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                          <h6 class="p-3 mb-0 font-weight-semibold"><?php echo $ptname[0][1]; ?>(X Ray Result)</h6>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                              <h6 class="preview-subject ellipsis mb-1 font-weight-normal"><?php echo $data[$i][0][4]; ?></h6>
                            </div>
                          </a>
                        </div>
                      </li>
                    </ul>
                  <?php endif; ?>
                </th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">USG</th>
              <?php for ($i=$z; $i < (9+$z); $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;">
                  <!-- <?php echo $data[$i][6]; ?> -->
                  <?php if($data[$i][0][6]!=null): ?>
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="btn btn-info" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                          See More
                        </a>
                        <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                          <h6 class="p-3 mb-0 font-weight-semibold"><?php echo $ptname[0][1]; ?>(USG Result)</h6>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                              <h6 class="preview-subject ellipsis mb-1 font-weight-normal"><?php echo $data[$i][0][6]; ?></h6>
                            </div>
                          </a>
                        </div>
                      </li>
                    </ul>
                  <?php endif; ?>
                </th>
              <?php endfor; ?>
              <?php if(sizeof($data)<(9+$z)):?>
                <?php 
                  $x = (9+$z)-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">ER</th>
              <!-- <?php for ($i=0; $i < sizeof($data); $i++): ?>
                <?php if(sizeof($data)==$i){break;} if($data[$i][0][27]==Null){continue;}?>
                <th style="border: 1px solid black; text-align: left;" colspan="9"><?php echo $data[$i][0][27]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  //$x = 9-sizeof($data);
                  for ($i=0; $i < 9; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?> -->
              <?php for ($i=0; $i < 9; $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][27]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  $x = 9-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">PR</th>
              <!-- <?php for ($i=0; $i < sizeof($data); $i++): ?>
                <?php if(sizeof($data)==$i){break;} if($data[$i][0][28]==Null){continue;}?>
                <th style="border: 1px solid black; text-align: left;" colspan="9"><?php echo $data[$i][0][28]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  //$x = 9-sizeof($data);
                  for ($i=0; $i < 9; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?> -->
              <?php for ($i=0; $i < 9; $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][28]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  $x = 9-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">HER 2/neu (c_erb B-2)</th>
             <!--  <?php for ($i=0; $i < sizeof($data); $i++): ?>
                <?php if(sizeof($data)==$i){break;} if($data[$i][0][29]==Null){continue;}?>
                <th style="border: 1px solid black; text-align: left;" colspan="9"><?php echo $data[$i][0][29]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  //$x = 9-sizeof($data);
                  for ($i=0; $i < 9; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?> -->
              <?php for ($i=0; $i < 9; $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th style="border: 1px solid black;"><?php echo $data[$i][0][29]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9):?>
                <?php 
                  $x = 9-sizeof($data);
                  for ($i=0; $i < $x; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">CA153</th>
              <?php $y=0; for ($i=0; $i < sizeof($data); $i++): ?>
                <?php if(sizeof($data)==$i){break;} if($data[$i][0][30]==Null){continue;} if($data[$i]!=null){$y=1;}?>
                <th style="border: 1px solid black; text-align: left;" colspan="9"><?php echo $data[$i][0][30]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9 || $y ==0):?>
                <?php 
                  //$x = 9-sizeof($data);
                  for ($i=0; $i < 9; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">CEA</th>
              <?php $y=0; for ($i=0; $i < sizeof($data); $i++): ?>
                <?php 
                  if(sizeof($data)==$i){break;} 
                  if($data[$i][0][31]==Null){continue;}
                  if($data[$i]!=null){$y=1;}
                ?>
                <th style="border: 1px solid black; text-align: left;" colspan="9"><?php echo $data[$i][0][31]; ?></th>
              <?php endfor; ?>
              <?php if(sizeof($data)<9 || $y ==0):?>
                <?php 
                  //$x = 9-sizeof($data);
                  for ($i=0; $i < 9; $i++){
                    echo '<th class="col-1" style="border: 1px solid black;"></th>';
                  }
                ?>
              <?php endif; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">Echo</th>
              <?php for ($i=0; $i < sizeof($data); $i++): ?>
                <?php if(sizeof($data)==$i){break;} if($data[$i][0][7]==Null){continue;}?>
                <th style="border: 1px solid black; text-align: left;" colspan="9">
                  <?php 
                    $str = str_split($data[$i][0][7]);
                    $x = 100;
                    for ($i=0; $i<sizeof($str); $i++){
                      if($i == $x){ echo "<br>"; $x= $x+$x;}
                      echo $str[$i];
                    }
                  ?>
                </th>
              <?php endfor; ?>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">Biopsy</th>
              <th colspan="9" style="border: 1px solid black; text-align: left;">
              <?php 
                $str = str_split($data[0][0][9]);
                $x = 100;
                for ($i=0; $i<sizeof($str); $i++){
                  if($i == $x){ echo "<br>"; $x = $x + $x;}
                  echo $str[$i];
                }
              ?>
              </th>
            </tr>
            <tr>
              <th id="left" style="border: 1px solid black;">CT</th>
              <th colspan="9" style="border: 1px solid black;">
                <!-- <?php echo $data[0][0][10]; ?> -->
                <?php 
                $str = str_split($data[0][0][10]);
                $x = 120;
                for ($i=0; $i<sizeof($str); $i++){
                  if($i == $x){ echo "<br>"; $x = $x + $x;}
                  echo $str[$i];
                }
              ?>
              </th>
              <!-- <?php for ($i=0; $i < 9; $i++): ?>
                <?php if(sizeof($data)==$i){break;} ?>
                <th><?php echo $data[$i][10]; ?></th>
              <?php endfor; ?> -->
            </tr>
          </tbody>
        </table>
      <?php endif; ?>
<?php endif; ?>