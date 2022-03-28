<?php
namespace commandocoding\giophpclass; 
class gio {
  public  $targetPath;
  private $scriptFile;
  private $gnomeVersion;
  public $returnDataType;
  function __construct() {
        $this->verbose          = false;
        $this->targetPath       = getcwd();
        $this->scriptFile       = __FILE__;
        $this->gnomeVersion     =exec("gnome-shell --version");
        $this->returnDataType  ="json";    
    }// end function
  public function setFolderIcon($iconFile){
        $f=$this->targetPath;
        $if='file://' . $iconFile;
        $this->verbose_console("function: setFolderIcon" );
        $cmd="gio set -t 'string' $f 'metadata::custom-icon' '$if'";
        exec($cmd);
        $this->verbose_console("targetPath: " . $this->targetPath );
        $this->verbose_console("iconFile: $iconFile");
  }// end function
  public function setFolderemblem($emblem){
        $this->verbose_console("function: setFolderemblem" );
        $f=$this->targetPath;
        //$if='file://' . $iconFile;
        $cmd="gio set -t stringv '$f' metadata::emblems '$emblem'";
        exec($cmd);
        $this->verbose_console("targetPath: " . $this->targetPath );
        $this->verbose_console("emblemfile: emblem-default");
  }// end function
  public function listBuiltInEmblems(){
    $this->verbose_console("function: listBuiltInEmblems" );
    $e[]="emblem-default";
    $e[]="emblem-documents";
    $e[]="emblem-downloads";
    $e[]="emblem-favorite";
    $e[]="emblem-important";
    $e[]="emblem-mail";
    $e[]="emblem-photos";
    $e[]="emblem-readonly";
    $e[]="emblem-shared";
    $e[]="emblem-symbolic-link";
    $e[]="emblem-synchronized";
    $e[]="emblem-system";
    $e[]="emblem-unreadable";
    //foreach ($e as $emblem){printf($emblem. PHP_EOL);} 
    if($this->returnDataType  =="json"){
        $retVal=json_encode($e);
    }
    return $retVal;   
  }// end function

  public function dump(){
    $this->verbose_console("function: dump" );
    echo "gnomeVersion: ".  $this->gnomeVersion     . PHP_EOL;
    echo "targetPath: ".    $this->targetPath       . PHP_EOL;
    echo "scriptfile: ".    $this->scriptFile       . PHP_EOL;
    echo "returnDataType:". $this->returnDataType   . PHP_EOL;
    
           
  }// end function
  public function verbose_console($msg){
    if($this->verbose==true){
        echo $msg . PHP_EOL;
    }// end if
  }// end function
}// end class

/*
"gio set -t stringv '/home/commando/Documents/Programming/BackupSync/read.txt' metadata::emblems 'emblem-default'";

//gvfs-set-attribute -t string <filename> metadata::custom-icon file:///home/user/path/to/icon.png
$e[]="emblem-default";
$e[]="emblem-documents";
$e[]="emblem-downloads";
$e[]="emblem-favorite";
$e[]="emblem-important";
$e[]="emblem-mail";
$e[]="emblem-photos";
$e[]="emblem-readonly";
$e[]="emblem-shared";
$e[]="emblem-symbolic-link";
$e[]="emblem-synchronized";
$e[]="emblem-system";
$e[]="emblem-unreadable";
*/
