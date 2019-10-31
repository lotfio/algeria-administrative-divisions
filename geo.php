<?php


function getLatLang($location)
{
    $c = curl_init();

    $apikey = '4f01lhzGl5YdUefwHj8sWBEY1pCTfs3E'; // from https://pdftables.com/api

    curl_setopt($c, CURLOPT_URL, "https://open.mapquestapi.com/geocoding/v1/address?key=$apikey&location=$location,ALGERIA");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_FAILONERROR,true);
    curl_setopt($c, CURLOPT_ENCODING, "gzip,deflate");
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);

    $result = curl_exec($c);

    if (curl_errno($c) > 0) {
        print('Error calling PDFTables: '.curl_error($c).PHP_EOL);
    } else {
        // save the html we got from PDFTables to a file

        $result = json_decode($result, true);
        print_r($result);

    }
    curl_close($c);
}

getLatLang("AIN EL MELH MSILA");