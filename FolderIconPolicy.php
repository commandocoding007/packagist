<?php
namespace Commandocoding\Desktop ;
/*-------------------------------------------------------------
    The four hidden filenames
        (*) .icon.svg
        (*) .icon.png
        (*) .<foldername>.svg
        (*) .<foldername>.png
    The four filenames if not hidden
        (*) icon.svg
        (*) icon.png
        (*) <foldername>.svg
        (*) <foldername>.png
    if exists a .commando subfolder exists then
    note that hidden within the .commando colder does not make sense
        (*) .commando/icon.svg
        (*) .commando/icon.png
    if exists a .commando/icons subfolder then that shall offer a 
    choice of the icon
-------------------------------------------------------------*/
class FolderIconPolicy{
    private $folderPath;
    private $folderBaseName;
    private $parseSubPath;
    private $availableIconsList;
    private $numberOfIconFound;
    
    public function __construct() {
        $this->folderPath=getcwd();
        $this->parseSubPath=true;
        $this->folderCheck(); 
               
    }
    function setFolder($folderPath){
        $this->folderPath=$folderPath;        
        //echo __LINE__ .  " setFolder : " . $this->folderPath . PHP_EOL;

        $this->folderCheck();    
        //echo __LINE__ . " setFolder : " . $this->folderPath . PHP_EOL;
            
    }
    function getIconList(){
        return $this->availableIconsList;
    }
    function getIconListCount(){
        return  $this->numberOfIconFound;
    }    
    function folderCheck(){
        unset($this->availableIconsList);
        $this->availableIconsList=array();
        //echo __LINE__ . " folderCheck : " . $this->folderPath . PHP_EOL;
        $this->folderBaseName=basename($this->folderPath);
        //echo $this->folderPath;
        //$this->folderPath
        $iconfile[]="commandocoding/icon.png";
        $iconfile[]="commandocoding/icon.svg";
        $iconfile[]="commandocoding/" . $this->folderBaseName.".svg";
        $iconfile[]="commandocoding/" . $this->folderBaseName.".png";        
        $iconfile[]= $this->folderBaseName.".svg";
        $iconfile[]=$this->folderBaseName.".png";
        $iconfile[]="icon.svg";
        $iconfile[]="icon.png";
  
        // CHECK ALL HIDDEN FILES
        foreach ($iconfile as $curIconFile){
            $curIconFile=$this->folderPath . "/." .$curIconFile ;
            $curIconFile . PHP_EOL;
            if(is_file ($curIconFile)==true){
                $this->availableIconsList[]=$curIconFile;
            }// endif
        }//end foreach
        // CHECK ALL NOT HIDDEN FILES   
        foreach ($iconfile as $curIconFile){
            $curIconFile=$this->folderPath . "/" .$curIconFile ;
            //echo $curIconFile . PHP_EOL;
            if(is_file ($curIconFile)==true){
                $this->availableIconsList[]=$curIconFile;
            }// endif
        }//end foreach
        
        $this->numberOfIconFound=count($this->availableIconsList);
    }


    function listSubFolders(){
    }
}
/*
$target="/home/commando/Documents/Programming/CommandCodingMaster/testfolder";
$f = new folderIconPolicy();
$f->setFolder($target);
//$f->folderCheck();
//$f->folderCheck();
//$f->getIconList();
$aryIcons=$f->getIconList();
print_r($aryIcons);
*/
