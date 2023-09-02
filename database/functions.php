<?php
	
    if (isset($_POST['ctsave'])) {
        $name = $_POST['ctname'];
        consultant_save($name);
        header("Location:../index.php?alert=newconstsave");
    }

    if (isset($_POST['xraysave'])) {
        $name = $_POST['xray'];
        xray_save($name);
        header("Location:../index.php?alert=newxraysave");
    }

    if (isset($_POST['usgsave'])) {
        $name = $_POST['usg'];
        usg_save($name);
        header("Location:../index.php?alert=newusgsave");
    }

    if (isset($_POST['ptsave'])) {
        $name = $_POST['ptname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $ptid = $_POST['ptid'];
        $ctname = $_POST['ctname'];
        $onname = $_POST['onname'];
        // $ctname = get_id_with_ctname($ctname);
        // $onname = get_id_with_ctname($onname);
        $diagnosis = $_POST['diagnosis'];
        date_default_timezone_set('Asia/Rangoon');
        $date = date("d-m-Y");
        //print_r($ctname);
        newpt_save($name,$age,$gender,$ptid,$ctname,$onname,$diagnosis,$date);
        header("Location:../index.php?alert=newptsave");
    }

    if (isset($_POST['ptupdate'])) {
        $id = $_POST['id'];
        $name = $_POST['ptname'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $ptid = $_POST['ptid'];
        $ctname = $_POST['ctname'];
        $onname = $_POST['onname'];
        // $ctname = get_id_with_ctname($ctname);
        // $onname = get_id_with_ctname($onname);
        $diagnosis = $_POST['diagnosis'];
        date_default_timezone_set('Asia/Rangoon');
        $date = date("d-m-Y");
        //print_r($ctname);
        newpt_update($id,$name,$age,$gender,$ptid,$ctname,$onname,$diagnosis,$date);
        header("Location:../index.php?alert=newptupdate");
    }

    if (isset($_POST['newcase'])) {
        $ptid = $_POST['ptid'];
        $case_detail = $_POST['case_detail'];
        date_default_timezone_set('Asia/Rangoon');
        $date = date("d-m-Y");
        newcase_save($ptid,$date,$case_detail);
        header("Location:../index.php?text=case_summary&id=".$ptid);
    }

    if (isset($_POST['caseedit'])) {
        $caseid = $_POST['caseid'];
        $ptid = $_POST['ptid'];
        $case_detail = $_POST['case_detail'];
        date_default_timezone_set('Asia/Rangoon');
        //$date = date("d-m-Y");
        $date = date("d-m-Y", strtotime($_POST['date']));
        newcase_update($caseid,$ptid,$date,$case_detail);
        header("Location:../index.php?text=case_summary&id=".$ptid);
    }

    if (isset($_POST['newfollowupandplan'])) {
        $ptid = $_POST['ptid'];
        $case_detail = $_POST['case_detail'];
        date_default_timezone_set('Asia/Rangoon');
        $date = date("d-m-Y", strtotime($_POST['date']));
        newfollowupandplan_save($ptid,$date,$case_detail);
        header("Location:../index.php?text=followupandplan&id=".$ptid);
    }

    if (isset($_POST['followupandplanidedit'])) {
        $caseid = $_POST['caseid'];
        $ptid = $_POST['ptid'];
        $case_detail = $_POST['case_detail'];
        date_default_timezone_set('Asia/Rangoon');
        //$date = date("d-m-Y");
        $date = date("d-m-Y", strtotime($_POST['date']));
        newfollowupandplan_update($caseid,$ptid,$date,$case_detail);
        header("Location:../index.php?text=followupandplan&id=".$ptid);
    }

    if (isset($_POST['treatmentedit'])) {
        $caseid = $_POST['caseid'];
        $ptid = $_POST['ptid'];
        $case_detail = $_POST['case_detail'];
        $regime = $_POST['regime'];
        $cycle = $_POST['cycle'];
        date_default_timezone_set('Asia/Rangoon');
        //$date = date("d-m-Y");
        $date = date("d-m-Y", strtotime($_POST['date']));
        newtreatment_update($caseid,$ptid,$date,$case_detail,$regime,$cycle);
        header("Location:../index.php?text=treatment_list&id=".$ptid);
    }
	
    if (isset($_POST['newtreatment'])) {
        $ptid = $_POST['ptid'];
        $case_detail = $_POST['case_detail'];
        $regime = $_POST['regime'];
        $cycle = $_POST['cycle'];
        date_default_timezone_set('Asia/Rangoon');
        $date = date("d-m-Y", strtotime($_POST['date']));
        newtreatment_save($ptid,$date,$case_detail,$regime,$cycle);
        header("Location:../index.php?text=treatment_list&id=".$ptid);
    }

    if (isset($_POST['newinvestigation'])) {
        $ptid = $_POST['ptid'];
        date_default_timezone_set('Asia/Rangoon');
        $date = date("d-m-Y", strtotime($_POST['date']));
        $xray = $_POST['xray'];
        $xrayresult = $_POST['xrayresult'];
        $usg = $_POST['usg'];
        $usgresult = $_POST['usgresult'];
        $echo = $_POST['echo'];
        $creatinine = $_POST['creatinine'];
        $biopsy = $_POST['biopsy'];
        $ct = $_POST['ct'];
        $wbc = $_POST['wbc'];
        $hb = $_POST['hb'];
        $platelet = $_POST['platelet'];
        $neut = $_POST['neut'];
        $na = $_POST['na'];
        $k = $_POST['k'];
        $cl = $_POST['cl'];
        $hco3 = $_POST['hco3'];
        $tb = $_POST['tb'];
        $alp = $_POST['alp'];
        $alt = $_POST['alt'];
        $ast = $_POST['ast'];
        $aborhgrouping = $_POST['aborhgrouping'];
        $hbsag = $_POST['hbsag'];
        $antihcv = $_POST['antihcv'];
        $retro = $_POST['retro'];
        $er = $_POST['er'];
        $pr = $_POST['pr'];
        $her = $_POST['her'];
        $ca153 = $_POST['ca153'];
        $cea = $_POST['cea'];
        newinvestigation_save($ptid,$date,$xray,$xrayresult,$usg,$usgresult,$echo,$creatinine,$biopsy,$ct,$wbc,$hb,$platelet,$neut,$na,$k,$cl,$hco3,$tb,$alp,$alt,$ast,$aborhgrouping,$hbsag,$antihcv,$retro,$er,$pr,$her,$ca153,$cea);
        header("Location:../index.php?text=investigation_list&id=".$ptid);
    }

    if (isset($_POST['investigationidedit'])) {
        $caseid = $_POST['caseid'];
        $ptid = $_POST['ptid'];
        date_default_timezone_set('Asia/Rangoon');
        $date = date("d-m-Y", strtotime($_POST['date']));
        $xray = $_POST['xray'];
        $xrayresult = $_POST['xrayresult'];
        $usg = $_POST['usg'];
        $usgresult = $_POST['usgresult'];
        $echo = $_POST['echo'];
        $creatinine = $_POST['creatinine'];
        $biopsy = $_POST['biopsy'];
        $ct = $_POST['ct'];
        $wbc = $_POST['wbc'];
        $hb = $_POST['hb'];
        $platelet = $_POST['platelet'];
        $neut = $_POST['neut'];
        $na = $_POST['na'];
        $k = $_POST['k'];
        $cl = $_POST['cl'];
        $hco3 = $_POST['hco3'];
        $tb = $_POST['tb'];
        $alp = $_POST['alp'];
        $alt = $_POST['alt'];
        $ast = $_POST['ast'];
        $aborhgrouping = $_POST['aborhgrouping'];
        $hbsag = $_POST['hbsag'];
        $antihcv = $_POST['antihcv'];
        $retro = $_POST['retro'];
        $er = $_POST['er'];
        $pr = $_POST['pr'];
        $her = $_POST['her'];
        $ca153 = $_POST['ca153'];
        $cea = $_POST['cea'];
        newinvestigation_update($caseid,$ptid,$date,$xray,$xrayresult,$usg,$usgresult,$echo,$creatinine,$biopsy,$ct,$wbc,$hb,$platelet,$neut,$na,$k,$cl,$hco3,$tb,$alp,$alt,$ast,$aborhgrouping,$hbsag,$antihcv,$retro,$er,$pr,$her,$ca153,$cea);
        header("Location:../index.php?text=investigation_list&id=".$ptid);
    }

    function consultant_save($name){
        require 'dbcon.php';
        $sql = "INSERT into consultant(name) values ((:name))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':name',$name);
        $stmt ->execute();
    }

    function xray_save($name){
        require 'dbcon.php';
        $sql = "INSERT into xray(name) values ((:name))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':name',$name);
        $stmt ->execute();
    }

    function usg_save($name){
        require 'dbcon.php';
        $sql = "INSERT into usg(name) values ((:name))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':name',$name);
        $stmt ->execute();
    }

    function newpt_save($name,$age,$gender,$ptid,$ctname,$onname,$diagnosis,$date){
        require 'dbcon.php';
        $sql = "INSERT into patient(ptname,age,gender,ptid,ctname,onname,diagnosis,date_) values ((:name),(:age),(:gender),(:ptid),(:ctname),(:onname),(:diagnosis),(:date_))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':name',$name);
        $stmt ->bindParam(':age',$age);
        $stmt ->bindParam(':gender',$gender);
        $stmt ->bindParam(':ptid',$ptid);
        $stmt ->bindParam(':ctname',$ctname);
        $stmt ->bindParam(':onname',$onname);
        $stmt ->bindParam(':diagnosis',$diagnosis);
        $stmt ->bindParam(':date_',$date);
        $stmt ->execute();
    }

    function newpt_update($id,$name,$age,$gender,$ptid,$ctname,$onname,$diagnosis,$date){
        require 'dbcon.php';
        $sql = "UPDATE patient set ptname=(:ptname), age=(:age), gender=(:gender), ptid=(:ptid), ctname=(:ctname), onname=(:onname), diagnosis=(:diagnosis), date_=(:date_) where id = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->bindParam(':ptname',$name);
        $stmt ->bindParam(':age',$age);
        $stmt ->bindParam(':gender',$gender);
        $stmt ->bindParam(':ptid',$ptid);
        $stmt ->bindParam(':ctname',$ctname);
        $stmt ->bindParam(':onname',$onname);
        $stmt ->bindParam(':diagnosis',$diagnosis);
        $stmt ->bindParam(':date_',$date);
        $stmt ->execute();
    }

    function const_list(){
        require 'dbcon.php';
        $sql = "SELECT * from consultant";
        $stmt = $connection->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function const_with_id($id){
        require 'dbcon.php';
        $sql = "SELECT * from consultant where id = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function xray_list(){
        require 'dbcon.php';
        $sql = "SELECT * from xray";
        $stmt = $connection->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function usg_list(){
        require 'dbcon.php';
        $sql = "SELECT * from usg";
        $stmt = $connection->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function get_id_with_ctname($ctname){
        require 'dbcon.php';
        $sql = "SELECT * from consultant where name = (:ctname)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':ctname',$ctname);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function pt_list(){
        require 'dbcon.php';
        $sql = "SELECT * from patient";
        $stmt = $connection->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function pt_with_ptid($id){
        require 'dbcon.php';
        $sql = "SELECT * from patient where id = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function case_summary_with_ptid($id){
        require 'dbcon.php';
        $sql = "SELECT * from case_summary where ptid = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        //print_r($data);
        return $data;
    }

    function newcase_save($ptid,$date_,$case_detail){
        require 'dbcon.php';
        $sql = "INSERT into case_summary(ptid,date_,case_detail) values((:ptid),(:date_),(:case_detail))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':ptid',$ptid);
        $stmt ->bindParam(':date_',$date_);
        $stmt ->bindParam(':case_detail',$case_detail);
        $stmt ->execute();
    }

    function newcase_update($id,$ptid,$date_,$case_detail){
        require 'dbcon.php';
        $sql = "UPDATE case_summary set date_=(:date_), case_detail=(:case_detail) where id = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->bindParam(':date_',$date_);
        $stmt ->bindParam(':case_detail',$case_detail);
        $stmt ->execute();
    }

    function get_case_with_id($id){
        require 'dbcon.php';
        $sql = "SELECT * from case_summary where id = ((:id))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function followupandplan_with_ptid($id){
        require 'dbcon.php';
        $sql = "SELECT * from followupandplan where ptid = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function newfollowupandplan_save($ptid,$date_,$case_detail){
        require 'dbcon.php';
        $sql = "INSERT into followupandplan(ptid,date_,followupandplan) values((:ptid),(:date_),(:case_detail))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':ptid',$ptid);
        $stmt ->bindParam(':date_',$date_);
        $stmt ->bindParam(':case_detail',$case_detail);
        $stmt ->execute();
    }

    function newfollowupandplan_update($id,$ptid,$date_,$case_detail){
        require 'dbcon.php';
        $sql = "UPDATE followupandplan set date_=(:date_), followupandplan=(:case_detail) where id = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->bindParam(':date_',$date_);
        $stmt ->bindParam(':case_detail',$case_detail);
        $stmt ->execute();
    }

    function get_followupandplan_with_id($id){
        require 'dbcon.php';
        $sql = "SELECT * from followupandplan where ptid = ((:id))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function followupandplan_with_id($id){
        require 'dbcon.php';
        $sql = "SELECT * from followupandplan where id = ((:id))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function get_followupandplan_with_id_for_noti($date_){
        //echo $date_;
        $date = $date_+5;
        $data =[];
        $x = 0;
        require 'dbcon.php';
        for ($i=$date_ ; $i < ($date); $i++) { 
            if($i<10){
                $date_ = "0".$i."-".date("m-Y");
            }else {
                $date_ = $i."-".date("m-Y");
            }
            $sql = "SELECT * from followupandplan where date_ = ((:date_))";
            $stmt = $connection->prepare($sql);
            $stmt ->bindParam(':date_',$date_);
            $stmt ->execute();
            $data[$x] = $stmt->fetchAll();
            $x = $x + 1;
        }
        return $data;
    }

    function newtreatment_save($ptid,$date_,$case_detail,$regime,$cycle){
        require 'dbcon.php';
        $sql = "INSERT into treatment(ptid,date_,treatment,regime,cycleno) values((:ptid),(:date_),(:case_detail),(:regime),(:cycle))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':ptid',$ptid);
        $stmt ->bindParam(':date_',$date_);
        $stmt ->bindParam(':case_detail',$case_detail);
        $stmt ->bindParam(':regime',$regime);
        $stmt ->bindParam(':cycle',$cycle);
        $stmt ->execute();
    }

    function newtreatment_update($id,$ptid,$date_,$case_detail,$regime,$cycle){
        require 'dbcon.php';
        $sql = "UPDATE treatment set date_=(:date_), treatment=(:case_detail), regime=(:regime), cycleno=(:cycle) where id = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->bindParam(':date_',$date_);
        $stmt ->bindParam(':case_detail',$case_detail);
        $stmt ->bindParam(':regime',$regime);
        $stmt ->bindParam(':cycle',$cycle);
        $stmt ->execute();
    }

    function get_treatment_with_id($id){
        require 'dbcon.php';
        $sql = "SELECT * from treatment where id = ((:id))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function treatment_with_ptid($id){
        require 'dbcon.php';
        $sql = "SELECT * from treatment where ptid = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function newinvestigation_save($ptid,$date,$xray,$xrayresult,$usg,$usgresult,$echo,$creatinine,$biopsy,$ct,$wbc,$hb,$platelet,$neut,$na,$k,$cl,$hco3,$tb,$alp,$alt,$ast,$aborhgrouping,$hbsag,$antihcv,$retro,$er,$pr,$her,$ca153,$cea){
        require 'dbcon.php';
        $sql = "INSERT into investigation(ptid,date_,xray,xrayresult,usg,usgresult,echo,creatinine,biopsy,ct,wbc,hb,platelet,neut,na,k,cl,hco3,tb,alp,alt,ast,aborhgrouping,hbsag,antihcv,retro,er,pr,her,ca153,cea) values((:ptid),(:date_),(:xray),(:xrayresult),(:usg),(:usgresult),(:echo),(:creatinine),(:biopsy),(:ct),(:wbc),(:hb),(:platelet),(:neut),(:na),(:k),(:cl),(:hco3),(:tb),(:alp),(:alt),(:ast),(:aborhgrouping),(:hbsag),(:antihcv),(:retro),(:er),(:pr),(:her),(:ca153),(:cea))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':ptid',$ptid);
        $stmt ->bindParam(':date_',$date);
        $stmt ->bindParam(':xray',$xray);
        $stmt ->bindParam(':xrayresult',$xrayresult);
        $stmt ->bindParam(':usg',$usg);
        $stmt ->bindParam(':usgresult',$usgresult);
        $stmt ->bindParam(':echo',$echo);
        $stmt ->bindParam(':creatinine',$creatinine);
        $stmt ->bindParam(':biopsy',$biopsy);
        $stmt ->bindParam(':ct',$ct);
        $stmt ->bindParam(':wbc',$wbc);
        $stmt ->bindParam(':hb',$hb);
        $stmt ->bindParam(':platelet',$platelet);
        $stmt ->bindParam(':neut',$neut);
        $stmt ->bindParam(':na',$na);
        $stmt ->bindParam(':k',$k);
        $stmt ->bindParam(':cl',$cl);
        $stmt ->bindParam(':hco3',$hco3);
        $stmt ->bindParam(':tb',$tb);
        $stmt ->bindParam(':alp',$alp);
        $stmt ->bindParam(':alt',$alt);
        $stmt ->bindParam(':ast',$ast);
        $stmt ->bindParam(':aborhgrouping',$aborhgrouping);
        $stmt ->bindParam(':hbsag',$hbsag);
        $stmt ->bindParam(':antihcv',$antihcv);
        $stmt ->bindParam(':retro',$retro);
        $stmt ->bindParam(':er',$er);
        $stmt ->bindParam(':pr',$pr);
        $stmt ->bindParam(':her',$her);
        $stmt ->bindParam(':ca153',$ca153);
        $stmt ->bindParam(':cea',$cea);
        $stmt ->execute();
    }

    function newinvestigation_update($id,$ptid,$date,$xray,$xrayresult,$usg,$usgresult,$echo,$creatinine,$biopsy,$ct,$wbc,$hb,$platelet,$neut,$na,$k,$cl,$hco3,$tb,$alp,$alt,$ast,$aborhgrouping,$hbsag,$antihcv,$retro,$er,$pr,$her,$ca153,$cea){
        require 'dbcon.php';
        $sql = "UPDATE investigation set date_=(:date_), xray=(:xray), xrayresult=(:xrayresult), usg=(:usg), usgresult=(:usgresult), echo=(:echo), creatinine=(:creatinine), biopsy=(:biopsy), ct=(:ct), wbc=(:wbc), hb=(:hb), platelet=(:platelet), neut=(:neut), na=(:na), k=(:k), cl=(:cl), hco3=(:hco3), tb=(:tb), alp=(:alp), alt=(:alt), ast=(:ast), aborhgrouping=(:aborhgrouping), hbsag=(:hbsag), antihcv=(:antihcv), retro=(:retro), er=(:er), pr=(:pr), her=(:her), ca153=(:ca153), cea=(:cea) where id = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->bindParam(':date_',$date);
        $stmt ->bindParam(':xray',$xray);
        $stmt ->bindParam(':xrayresult',$xrayresult);
        $stmt ->bindParam(':usg',$usg);
        $stmt ->bindParam(':usgresult',$usgresult);
        $stmt ->bindParam(':echo',$echo);
        $stmt ->bindParam(':creatinine',$creatinine);
        $stmt ->bindParam(':biopsy',$biopsy);
        $stmt ->bindParam(':ct',$ct);
        $stmt ->bindParam(':wbc',$wbc);
        $stmt ->bindParam(':hb',$hb);
        $stmt ->bindParam(':platelet',$platelet);
        $stmt ->bindParam(':neut',$neut);
        $stmt ->bindParam(':na',$na);
        $stmt ->bindParam(':k',$k);
        $stmt ->bindParam(':cl',$cl);
        $stmt ->bindParam(':hco3',$hco3);
        $stmt ->bindParam(':tb',$tb);
        $stmt ->bindParam(':alp',$alp);
        $stmt ->bindParam(':alt',$alt);
        $stmt ->bindParam(':ast',$ast);
        $stmt ->bindParam(':aborhgrouping',$aborhgrouping);
        $stmt ->bindParam(':hbsag',$hbsag);
        $stmt ->bindParam(':antihcv',$antihcv);
        $stmt ->bindParam(':retro',$retro);
        $stmt ->bindParam(':er',$er);
        $stmt ->bindParam(':pr',$pr);
        $stmt ->bindParam(':her',$her);
        $stmt ->bindParam(':ca153',$ca153);
        $stmt ->bindParam(':cea',$cea);
        $stmt ->execute();
    }

    function investigation_with_ptid($id){
        require 'dbcon.php';
        $sql = "SELECT * from investigation where ptid = (:id)";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        $date = [];
        $data1 = [];
        foreach ($data as $key => $value) {
            $date [] = $value[2];
        }
        usort($date, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });
        foreach ($date as $key => $value) {
            $sql = "SELECT * from investigation where ptid = (:id) and date_ = (:date_)";
            $stmt = $connection->prepare($sql);
            $stmt ->bindParam(':id',$id);
            $stmt ->bindParam(':date_',$value);
            $stmt ->execute();
            $data = $stmt->fetchAll();
            $data1 [] = $data;
        }
        return $data1;
    }

    function get_investigation_with_id($id){
        require 'dbcon.php';
        $sql = "SELECT * from investigation where id = ((:id))";
        $stmt = $connection->prepare($sql);
        $stmt ->bindParam(':id',$id);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function get_consultant_list(){
        require 'dbcon.php';
        $sql = "SELECT * from consultant";
        $stmt = $connection->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function get_xray_list(){
        require 'dbcon.php';
        $sql = "SELECT * from xray";
        $stmt = $connection->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function get_usg_list(){
        require 'dbcon.php';
        $sql = "SELECT * from usg";
        $stmt = $connection->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll();
        return $data;
    }



?>