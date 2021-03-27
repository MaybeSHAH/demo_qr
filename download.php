<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
$output=null;
$retval=null;
exec('brother_ql print --label 62 sshhs.png', $output, $retval);
echo "Returned with status $retval and output:\n";
print_r($output);


$output = shell_exec('brother_ql print --label 62 sshhs.png');
echo "<pre>$output</pre>";
?>