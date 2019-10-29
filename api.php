
<?php

function convertToHtmlFromPdfTables($pdf_file)
{
    if (!is_readable($pdf_file)) {
            print("Error: file does not exist or is not readable: $pdf_file\n");
            return;
    }


    $c = curl_init();

    $cfile = curl_file_create($pdf_file, 'application/pdf');

    $apikey = 'secret'; // from https://pdftables.com/api

    curl_setopt($c, CURLOPT_URL, "https://pdftables.com/api?key=$apikey&format=html");
    curl_setopt($c, CURLOPT_POSTFIELDS, array('file' => $cfile));
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
        file_put_contents (__DIR__.'/html/000'.pathinfo($pdf_file, PATHINFO_FILENAME) . ".html", $result);
    }
    curl_close($c);
}

$files = array_slice(scandir(__DIR__.'/pdf'), 2);

/**
 * convert all pdf files to html
 */
foreach($files as $file)
{
    convertToHtmlFromPdfTables(__DIR__.'/pdf/'.$file);
}