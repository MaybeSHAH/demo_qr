<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
if(isset($_GET['file'])){
    $var = $_GET['file']; //some_value
  }
//$cmdStat = exec('brother_ql info env'); 
//print_r($cmdStat);
//exec('brother_ql --printer /dev/usb/lp0 --model QL-800 print --red -l 62 -t 30 Validation.png', $output, $retval);
//echo "Returned with filename:\n";
//print_r($var);

   $command_exec = escapeshellcmd('/usr/bin/python3.6 print.py');
   $str_output = shell_exec($command_exec);
   echo $str_output;

//$output = shell_exec('brother_ql --printer /dev/usb/lp0 --model QL-800 print --red -l 62 -t 30 Validation.png');
//echo "<pre>$output</pre>";
//header("Location: index.php");
exit;
?>