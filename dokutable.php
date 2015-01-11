<?php
$wgExtensionFunctions[] = "wfcirclextension";
function wfcirclextension()
{
  global $wgParser;
  $wgParser->setHook("mextable", "mextablehtml");
}

function mextablehtml($code, $argv)
{
  $result="<table>";
  $lines=explode("\n",$code);
  for ($i=0;$i<sizeof($lines);++$i)
  {
    $result.="<tr>";
    $line=explode(" | ",$lines[$i]);
    for ($n=0;$n<sizeof($line);++$n)
    {
      $result.="<td>";
      $result.=$line[$n];
      $result.="</td>";
    }
    $result.="</tr>";
  }
  $result.="</table>";
  $result=preg_replace("/\n/","",$result);
  return $result;
}
