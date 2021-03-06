<?php

  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
  header("Content-Type: application/json; charset=utf-8");

  include "library/config.php";
  
  $postjson = json_decode(file_get_contents('php://input'), true);
  $today    = date('Y-m-d');


  if($postjson['aksi']=='add'){

  	$query = mysqli_query($mysqli, "INSERT INTO master_customer SET
  		name_customer = '$postjson[name_customer]',
  		desc_customer = '$postjson[desc_customer]',
      Form8n9 = '$postjson[Form8n9]',
      EngineeringDesign ='$postjson[EngineeringDesign]',
      SiteOwner='$postjson[SiteOwner]',
      ElectricBill='$postjson[ElectricBill]',
      Declaration='$postjson[Declaration]',
      NemasReport='$postjson[NemasReport]',
      FormLP='$postjson[FormLP]',
      STPublicLicense='$postjson[STPublicLicense]',
      LicenseDate='$postjson[LicenseDate]',
      TnC='$postjson[TnC]',
      TnCDate='$postjson[TnCDate]',
      CDate='$postjson[CDate]',
      Upload='$postjson[Upload]',
      NEMCO='$postjson[NEMCO]',
  		created_at	  = '$today' 
  	");

  	$idcust = mysqli_insert_id($mysqli);

  	if($query) $result = json_encode(array('success'=>true, 'customerid'=>$idcust));
  	else $result = json_encode(array('success'=>false));

  	echo $result;

  }

  elseif($postjson['aksi']=='getdata'){
  	$data = array();
  	$query = mysqli_query($mysqli, "SELECT * FROM master_customer ORDER BY customer_id DESC LIMIT $postjson[start],$postjson[limit]");

  	while($row = mysqli_fetch_array($query)){

  		$data[] = array(
  			'customer_id' => $row['customer_id'],
  			'name_customer' => $row['name_customer'],
        'desc_customer' => $row['desc_customer'],
        'Form8n9' =>$row['Form8n9'],
        'EngineeringDesign' => $row['EngineeringDesign'],
        'SiteOwner' => $row['SiteOwner'],
        'ElectricBill' => $row['ElectricBill'],
        'Declaration' => $row['Declaration'],
        'NemasReport' => $row['NemasReport'],
        'FormLP' => $row['FormLP'],
        'STPublicLicense'=>$row['STPublicLicense'],
        'LicenseDate' => $row['LicenseDate'],
        'TnC' => $row['TnC'],
        'TnCDate' => $row['TnCDate'],
        'CDate' =>$row['CDate'],
        'Upload' =>$row['Upload'],
        'NEMCO' =>$row['NEMCO'],
  			'created_at' => $row['created_at'],

  		);
  	}

  	if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
  	else $result = json_encode(array('success'=>false));

  	echo $result;

  }

  elseif($postjson['aksi']=='update'){
  	$query = mysqli_query($mysqli, "UPDATE master_customer SET 
  		name_customer='$postjson[name_customer]',
  		desc_customer='$postjson[desc_customer]', 
      Form8n9='$postjson[Form8n9]',
      EngineeringDesign='$postjson[EngineeringDesign]',
      SiteOwner='$postjson[SiteOwner]',
      ElectricBill='$postjson[ElectricBill]',
      Declaration='$postjson[Declaration]',
      NemasReport='$postjson[NemasReport]',
      FormLP='$postjson[FormLP]',
      STPublicLicense='$postjson[STPublicLicense]',
      LicenseDate='$postjson[LicenseDate]',
      TnC='$postjson[TnC]',
      TnCDate='$postjson[TnCDate]',
      CDate='$postjson[CDate]',
      Upload='$postjson[Upload]',
      NEMCO='$postjson[NEMCO]'
      WHERE customer_id='$postjson[customer_id]'");

  	if($query) $result = json_encode(array('success'=>true, 'result'=>'success'));
  	else $result = json_encode(array('success'=>false, 'result'=>'error'));

  	echo $result;

  }

  elseif($postjson['aksi']=='delete'){
  	$query = mysqli_query($mysqli, "DELETE FROM master_customer WHERE customer_id='$postjson[customer_id]'");

  	if($query) $result = json_encode(array('success'=>true, 'result'=>'success'));
  	else $result = json_encode(array('success'=>false, 'result'=>'error'));

  	echo $result;

  }

  elseif($postjson['aksi']=="login"){
    $password = md5($postjson['password']);
    $query = mysqli_query($mysqli, "SELECT * FROM master_user WHERE username='$postjson[username]' AND password='$password'");
    $check = mysqli_num_rows($query);

    if($check>0){
      $data = mysqli_fetch_array($query);
      $datauser = array(
        'user_id' => $data['user_id'],
        'username' => $data['username'],
        'password' => $data['password']
      );

      if($data['status']=='y'){
        $result = json_encode(array('success'=>true, 'result'=>$datauser));
      }else{
        $result = json_encode(array('success'=>false, 'msg'=>'Account Inactive')); 
      }

    }else{
      $result = json_encode(array('success'=>false, 'msg'=>'Unregister Account'));
    }

    echo $result;
  }

  elseif($postjson['aksi']=="register"){
    $password = md5($postjson['password']);
    $query = mysqli_query($mysqli, "INSERT INTO master_user SET
      username = '$postjson[username]',
      password = '$password',
      status   = 'y'
    ");

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false, 'msg'=>'error, please try again'));

    echo $result;
  }


?>