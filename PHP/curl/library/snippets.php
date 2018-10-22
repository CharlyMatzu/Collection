<?php









if ( isDomainAvailible('http://www.programacion.net') )
    echo "Up and running!";
else
    echo "Woops, nothing found there.";


//returns true, if domain is availible, false if not
function isDomainAvailible($domain)
{
    //check, if a valid url is provided
    if(!filter_var($domain, FILTER_VALIDATE_URL))
    {
            return false;
    }

    //initialize curl
    $curlInit = curl_init($domain);
    curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($curlInit,CURLOPT_HEADER,true);
    curl_setopt($curlInit,CURLOPT_NOBODY,true);
    curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

    //get answer
    $response = curl_exec($curlInit);

    curl_close($curlInit);

    if ($response) return true;

    return false;
}



function downloadPDF()
{
    $CurlConnect = curl_init();
    curl_setopt($CurlConnect, CURLOPT_URL, 'http://website.com/invoices/download/1');
    curl_setopt($CurlConnect, CURLOPT_POST,   1);
    curl_setopt($CurlConnect, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($CurlConnect, CURLOPT_POSTFIELDS, $request);
    curl_setopt($CurlConnect, CURLOPT_USERPWD, $login.':'.$password);
    $Result = curl_exec($CurlConnect);

    header('Cache-Control: public'); 
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="new.pdf"');
    header('Content-Length: '.strlen($Result));
    echo $Result;
}