<?php
class Cockpit
{
  //private static $instance;

  /*
  public static function getInstance(){
    if(TwipneQueue::$instance == null){
      TwipneQueue::$instance = new TwipneQueue();
    }
    return TwipneQueue::$instance;
  }
  */

	public static function getOP3SetupCount(){
    $fp = fopen("http://update.openpne.jp/graph.php", "r");
    $str = fread($fp,5000);
    preg_match('/Total:\\s(.*?)</',$str,$matches);
    $result =  $matches[1];
    return $result;
  }
  public static function OP32Cell(){
    $row = date('z') + 1;
    $col = 7;
    return self::updateCell($row,$col,self::getOP3SetupCount());
  }
	public static function updateCell($row,$col,$value){
    $id = opConfig::get('optjmycockpitplugin_gapps_id',null);
    $pass = opConfig::get('optjmycockpitplugin_gapps_password',null);
    $sheetkey = opConfig::get('optjmycockpitplugin_gapps_sheetkey',null);
    $sheetid = opConfig::get('optjmycockpitplugin_gapps_sheetid',null);
    
    $service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
    try{
      $client = Zend_Gdata_ClientLogin::getHttpClient($id, $pass, $service);
      $spreadsheetService = new Zend_Gdata_Spreadsheets($client);
      $updatedCell = $spreadsheetService->updateCell($row,
                                               $col,
                                               $value,
                                               $sheetkey,
                                               $sheetid);
    }catch(Exception $e){
      return false;
    }
    return true;
  }
}
