<?php



/**
 * Configuration
 */
$debugDir="../www/debug";                            // Relative path of directory to compress
$releaseDir="../www/release";                          // Relative path of release directory where the compressed contents will be saved
$dirNotToInclude=array('.','..','.svn');       // Directories not to compress
$extToCompress=array('js','css');              // Files with these extensions will be compressed
$minNeedle=array('-min','.min');               // Files with names having these strings will be considered as minified and will just be copied
$dirToCopy=array('img');                        // contents of these directories will be copied to the release directory as it is
$compressedFileExt=".min.";                     // string that should come between file name and file ext.
$pathToJar="lib/yuicompressor-2.4.7.jar";

$indent=" ";            // for terminal use ' ', for browser use ' . '
$lineEndDelimiter="\n"; // for terminal use '\n', for browser use </br>

/**
 * PROCEDURE
 *
 * Verify the configuration
 * Goto the directory having this file from terminal
 * run sudo php minify.php
 * Alternately, go to the browser and run localhost/sitename/export/minify.php
 *
 */


// initialize
echo "This script will minify the required files";
readFiles($debugDir,$indent,$releaseDir);


/**
 * @param $root
 * @param $indent
 */
function readFiles($root,$indent,$releaseRoot=false)
{
    $lineEndDelimiter= '<br />';//$GLOBALS['lineEndDelimiter'];
    echo $indent.strtoupper($root).$lineEndDelimiter;
    $dir= opendir($root);
    while(false != ($file = readdir($dir)))
    {
        if(is_array($GLOBALS['dirNotToInclude']) && (!in_array($file,$GLOBALS['dirNotToInclude'])))
        {
            if(is_dir($root."/".$file))
            {
                if(in_array($file,$GLOBALS['dirToCopy']))
                {
                    shell_exec("sudo cp -r ".($root."/".$file)." ".$releaseRoot."/".$file);
                    echo $indent."cp ".$file.$lineEndDelimiter;
                }
                else
                {
                    $indent.=" ";
                    readFiles($root.'/'.$file,$indent,$releaseRoot."/".$file);
                }
            }
            else{

                $name=pathinfo($file,PATHINFO_FILENAME);
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if(in_array($ext,$GLOBALS['extToCompress']))
                {
                    if(!file_exists($releaseRoot)){
                        mkdir($releaseRoot,0777,TRUE);
                    }
                    if(match($GLOBALS['minNeedle'],$name))
                    {
                        shell_exec("cp ".$root."/".$file." ".$releaseRoot."/".$file);
                        echo $indent."cp ".$file.$lineEndDelimiter;
                    }
                    else
                    {
                        $unCompressed=$root."/".$file;
                        $compressed=$releaseRoot."/".$name.$GLOBALS['compressedFileExt'].$ext;
                        shell_exec("java -jar ".$GLOBALS['pathToJar']." ".$unCompressed." -o ".$compressed."");
                        echo $indent.'[minifying...] '.$file." --> ".$name.$GLOBALS['compressedFileExt'].$ext.$lineEndDelimiter;
                    }


                }

            }
        }
        else{
            echo $indent." skipping ".$file.$lineEndDelimiter;
        }
    }

}

/**
 * @param $needle
 * @param $haystack
 * @return bool
 */
function match($needle,$haystack)
{
    $status=false;
    if(is_array($needle))
    {
        foreach($needle as $str)
        {
            if(substr_count($haystack,$str)>0)
            {
                $status=true;
                break;
            }
        }
    }
    return $status;
}
