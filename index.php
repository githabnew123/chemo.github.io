<?php include 'parts/head.php'; ?>
  </head>
  <body>
    <?php include 'database/functions.php'; ?>
    <div class="container-scroller">
      <?php include 'parts/sidebar.php'; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include 'parts/setting.php'; ?>
        <?php include 'parts/nav.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <?php
            if (isset($_GET['alert'])) {
              if ($_GET['alert']=="newconstsave") {
                echo "<script>alert('New Consultant has been saved!!!');</script>";
                include 'page/consultant_list.php';
              }
              if ($_GET['alert']=="newxraysave") {
                echo "<script>alert('New X Ray has been saved!!!');</script>";
                include 'page/xray_list.php';
              }
              if ($_GET['alert']=="newusgsave") {
                echo "<script>alert('New USG has been saved!!!');</script>";
                include 'page/usg_list.php';
              }
              if ($_GET['alert']=="newptsave") {
                echo "<script>alert('New Patient has been saved!!!');</script>";
                include 'page/new_patient.php';
              }
              if ($_GET['alert']=="newptupdate") {
                echo "<script>alert('Patient Info has been update!!!');</script>";
                include 'page/patient_list.php';
              }
            }

            if (isset($_GET['text'])) {
              if ($_GET['text']=='new_patient') {
                include 'page/new_patient.php';
              }
              if ($_GET['text']=='patient_list') {
                include 'page/patient_list.php';
              }
              if ($_GET['text']=='consultant_list') {
                include 'page/consultant_list.php';
              }
              if ($_GET['text']=='case_summary') {
                //echo $_GET['ptid'];
                include 'page/case_summary.php';
              }
              if ($_GET['text']=='investigation_list') {
                include 'page/investigation_list.php';
              }
              if ($_GET['text']=='treatment_list') {
                include 'page/treatment_list.php';
              }
              if ($_GET['text']=='followupandplan') {
                include 'page/followupandplan.php';
              }
              if ($_GET['text']=='xray_list') {
                include 'page/xray_list.php';
              }
              if ($_GET['text']=='usg_list') {
                include 'page/usg_list.php';
              }
            }

             ?>
            
          </div>
        </div>
      </div>
    </div>
<?php include 'parts/footer.php';?>