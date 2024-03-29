<?php
/**
 * File and folder naming convention
 *
 * This file contains the policy for file and folder name 
 * for known file types in commando coding project
 *
 * No licences yet
 */
namespace Commandocoding\Desktop ;
/** 
This class shall impliment the policy based on which a folder icon is  selected. 
Having a class helps the entire project being uniform and change of 
policy future proof as the class shall itself be modified with new policy hence 
aware for the change required code.

__The four hidden filenames__
 - .icon.svg
 - .icon.png
 - .\<foldername>.svg (same icon name as foldername plus the extention)
 - .\<foldername>.png (same icon name as foldername plus the extention)

__The four filenames if not hidden__
 - icon.svg
 - icon.png
 - \<foldername>.svg
 - \<foldername>.png

__exists a .commando subfolder exists then__
 * note that hidden within the .commando colder does not make sense
- .commando/icon.svg
- .commando/icon.png
    if exists a .commando/icons subfolder then that shall offer a 
    choice of the icon

@author commandocodng@hotmail.com <commandocodng@hotmail.com>
 */
class FolderIconPolicy
{
    private $folderPath;
    private $folderBaseName;
    private $parseSubPath;
    private $availableIconsList;
    private $numberOfIconFound;
    private $_hasHiddenCommandoFolder;
    public function __construct()
    {
        $this->folderPath=getcwd();
        $this->_hasHiddenCommandoFolder();
        $this->parseSubPath=true;
        $this->folderCheck();    
    }
    //TODO This needs to be completed 
    private function _hasHiddenCommandoFolder(){
        $subfolderPath=$this->folderPath . "/.CommandoCoding";
        if(is_dir($subfolderPath)){
            $this->_hasHiddenCommandoFolder=true;
        }else{
            $this->_hasHiddenCommandoFolder=false;
        }
    }
    function setFolder($folderPath)
    {
        $this->folderPath=$folderPath;        
        //echo __LINE__ .  " setFolder : " . $this->folderPath . PHP_EOL;
        $this->_hasHiddenCommandoFolder();

        $this->folderCheck();    
        //echo __LINE__ . " setFolder : " . $this->folderPath . PHP_EOL;
            
    }
    function getIconList()
    {
        return $this->availableIconsList;
    }
    function getIconListCount()
    {
        return  $this->numberOfIconFound;
    }    
    function folderCheck()
    {
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
        $iconfile[]=$this->folderBaseName.".svg";
        $iconfile[]=$this->folderBaseName.".png";
        $iconfile[]=".icon.svg";
        $iconfile[]="icon.svg";
        $iconfile[]="icon.png";
        $iconfile[]=".icon.png";

  
        // CHECK ALL HIDDEN FILES
        foreach ($iconfile as $curIconFile){
            $curIconFile=$this->folderPath . "/" .$curIconFile ;
            $curIconFile . PHP_EOL;
            if(is_file($curIconFile)==true) {
                $this->availableIconsList[]=$curIconFile;
            }// endif
        }//end foreach
        // CHECK ALL NOT HIDDEN FILES   
        /*
        foreach ($iconfile as $curIconFile){
            $curIconFile=$this->folderPath . "/" .$curIconFile ;
            //echo $curIconFile . PHP_EOL;
            if(is_file($curIconFile)==true) {
                $this->availableIconsList[]=$curIconFile;
            }// endif
        }//end foreach
        */
        $this->numberOfIconFound=count($this->availableIconsList);
    }


    function listSubFolders()
    {
    }
    function codeSample(){
        $snippet= "
        \$target=getcwd();
        \$f = new Commandocoding\\Desktop\\FolderIconPolicy();
        \$f->setFolder(\$target);
        \$f->getIconList();
        \$aryIcons=\$f->getIconList();
        echo \"LIST OF ICONS FOUND\" . PHP_EOL;
        print_r(\$aryIcons);";        
        return $snippet;
    }
}

