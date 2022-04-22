<?php
namespace Commandocoding\Desktop ;

class TempFolderPolicy{
    private $folderPath;
    private $folderBaseName;
    private $commandocoding_registry;
    public function __construct()
    {
        $this->folderPath=getcwd();
        $this->commandocoding_registry=$_SERVER['HOME'] . ".commandocoding";
    }
    function setFolder($folderPath)
    {
        $this->folderPath=$folderPath;        
    }

    /*Create a temporary folder under the path */
    function NewTempFolder()
    {
        $newTempFolder=$this->folderPath . "/temp-" . time();
        mkdir($newTempFolder);
        file_put_contents($newTempFolder. "/.icon.svg",$this->SvgIcon())  ;             
    }

    function codeSample(){
        $desktop=$_SERVER['HOME'] . "/Desktop/";
        $snippet= "//remember to include the class         
\$target=  \"$desktop\" ;
\$f = new Commandocoding\\Desktop\\TempFolderPolicy();
\$f->setFolder(\$target);
\$f->getIconList();
\$aryIcons=\$f->NewTempFolder();
print_r(\$aryIcons);";        
    return $snippet;
    }
    function randomColour(){
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
    function SvgIcon(){
        //TODO have to use the function instead of colour here
        $colour='#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
        $icon=
        "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>
<svg
   xmlns:dc=\"http://purl.org/dc/elements/1.1/\"
   xmlns:cc=\"http://creativecommons.org/ns#\"
   xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\"
   xmlns:svg=\"http://www.w3.org/2000/svg\"
   xmlns=\"http://www.w3.org/2000/svg\"
   id=\"svg16\"
   enable-background=\"new 0 0 512 512\"
   viewBox=\"0 0 512 512\"
   version=\"1.1\">
  <metadata
     id=\"metadata22\">
    <rdf:RDF>
      <cc:Work
         rdf:about=\"\">
        <dc:format>image/svg+xml</dc:format>
        <dc:type
           rdf:resource=\"http://purl.org/dc/dcmitype/StillImage\" />
        <dc:title></dc:title>
      </cc:Work>
    </rdf:RDF>
  </metadata>
  <defs
     id=\"defs20\" />
  <path
     style=\"fill:$colour;fill-opacity:1\"
     d=\"m 411.313,123.313 c 6.25,-6.25 6.25,-16.375 0,-22.625 -6.25,-6.25 -16.375,-6.25 -22.625,0 l -32,32 -9.375,9.375 -20.688,-20.688 c -12.484,-12.5 -32.766,-12.5 -45.25,0 l -16,16 c -1.261,1.261 -2.304,2.648 -3.31,4.051 C 240.326,132.865 216.741,128 192,128 86.133,128 0,214.133 0,320 c 0,105.867 86.133,192 192,192 105.867,0 192,-86.133 192,-192 0,-24.741 -4.864,-48.327 -13.426,-70.065 1.402,-1.007 2.79,-2.049 4.051,-3.31 l 16,-16 c 12.5,-12.492 12.5,-32.758 0,-45.25 l -20.688,-20.688 9.375,-9.375 z M 192,224 c -52.938,0 -96,43.063 -96,96 0,8.836 -7.164,16 -16,16 -8.836,0 -16,-7.164 -16,-16 0,-70.578 57.422,-128 128,-128 8.836,0 16,7.164 16,16 0,8.836 -7.164,16 -16,16 z\"
     id=\"path2\" />
  <path
     style=\"fill:#ff8a00;fill-opacity:1\"
     d=\"m 459.02,148.98 c -6.25,-6.25 -16.375,-6.25 -22.625,0 -6.25,6.25 -6.25,16.375 0,22.625 l 16,16 c 3.125,3.125 7.219,4.688 11.313,4.688 4.094,0 8.188,-1.563 11.313,-4.688 6.25,-6.25 6.25,-16.375 0,-22.625 z\"
     id=\"path4\" />
  <path
     style=\"fill:#ff8a00;fill-opacity:1\"
     d=\"m 340.395,75.605 c 3.125,3.125 7.219,4.688 11.313,4.688 4.094,0 8.188,-1.563 11.313,-4.688 6.25,-6.25 6.25,-16.375 0,-22.625 l -16,-16 c -6.25,-6.25 -16.375,-6.25 -22.625,0 -6.25,6.25 -6.25,16.375 0,22.625 z\"
     id=\"path6\" />
  <path
     style=\"fill:#ff8a00;fill-opacity:1\"
     d=\"m 400,64 c 8.844,0 16,-7.164 16,-16 V 16 C 416,7.164 408.844,0 400,0 391.156,0 384,7.164 384,16 v 32 c 0,8.836 7.156,16 16,16 z\"
     id=\"path8\" />
  <path
     style=\"fill:#ff8a00;fill-opacity:1\"
     d=\"m 496,96.586 h -32 c -8.844,0 -16,7.164 -16,16 0,8.836 7.156,16 16,16 h 32 c 8.844,0 16,-7.164 16,-16 0,-8.836 -7.156,-16 -16,-16 z\"
     id=\"path10\" />
  <path
     style=\"fill:#ff8a00;fill-opacity:1\"
     d=\"m 436.98,75.605 c 3.125,3.125 7.219,4.688 11.313,4.688 4.094,0 8.188,-1.563 11.313,-4.688 l 32,-32 c 6.25,-6.25 6.25,-16.375 0,-22.625 -6.25,-6.25 -16.375,-6.25 -22.625,0 l -32,32 c -6.251,6.25 -6.251,16.375 -10e-4,22.625 z\"
     id=\"path12\" />
</svg>";
    return $icon;
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
