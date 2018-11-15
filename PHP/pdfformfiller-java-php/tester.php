<?php
error_reporting(E_ALL);

echo "Init\r\n";

$javacli = "java -cp " . dirname(__FILE__) . "/lib/itextpdf-5.5.14-SNAPSHOT.jar:" . dirname(__FILE__) . "/lib/itext-xtra-5.5.14-SNAPSHOT.jar" . " -Xmx128M -jar";
$formfillerjar = dirname(__FILE__) . "/pdfformfiller.jar";
$pdftemplate = dirname(__FILE__) . "/LS1730LA-TEMPLATE.pdf";
$option = "-flatten";

$execparams = $javacli . " " . $formfillerjar . " " . $pdftemplate . " " . $option;

echo "Execparams: " . print_r($execparams, true) . "\r\n";

$fieldValues = array ("LOAN" => "2343434", "MASTER" => "45435454");

$values = createFieldsInput( $fieldValues );

echo "$values\r\n";

$descriptorspec = array(
   0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
   1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
   2 => array("file", dirname(__FILE__) . "/error-output.txt", "a") // stderr is a file to write to
);

$process = proc_open($execparams, $descriptorspec, $pipes);

if (is_resource($process)) {
	// $pipes now looks like this:
    // 0 => writeable handle connected to child stdin
    // 1 => readable handle connected to child stdout
	fwrite($pipes[0], $values);
	fclose($pipes[0]);
	
	$pdf_content = stream_get_contents($pipes[1]);
    fclose($pipes[1]);
	
	// It is important that you close any pipes before calling
    // proc_close in order to avoid a deadlock
    $return_value = proc_close($process);
	echo "Return value: $return_value\r\n";
	
	if($return_value == 0) {
		$fp = fopen(dirname(__FILE__) . '/LS1730LA.pdf', 'w');
		fwrite($fp, $pdf_content);
		fclose($fp);
		echo "'LS1730LA.pdf' created\r\n";
	} else {
		echo "Problem creating PDF\r\n";
	}
	
	
}





function createFieldsInput( array $fieldValues )
{
    $data = "";
    foreach ( $fieldValues as $name => $value )
    {
        $data .= $name . " " . $value . PHP_EOL;
    }
 
    return $data;
}

