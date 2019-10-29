<?php

/**
 * algerias cities project by lotfio lakehal
 * https://onil.dz/wp-content/uploads/2017/10/10BOUIRA.pdf wilaya id + name capital .pdf
 *
 * https://pdftables.com/ to convert data to csv
 *
 */


function parse_dz($htmlFile, $type = 'district', $lang = 'en')
{
    $dairas = file_get_contents($htmlFile);
    preg_match('/<table class="table table-striped table-bordered">(.*)<\/table>/sm', $dairas, $m);


    $a = explode("<tr>", $m[1]);
    // remove heading
    $a = preg_replace('/<h2\s*(.*)>.*<\/h2>\s*/', NULL, $a);
    $a = preg_replace('/<td style=".*?">(.*?)<\/td>/s', "$1", $a);
    $a = str_replace('</tr>', NULL, $a);

    $a = preg_replace('/<td\s*(.*?)>(.*?)<\/td>/s', "#$2#", $a);

    unset($a[0], $a[1], $a[2]);

    $a = array_values(array_filter(array_map(function($elem){
        // if pdf has more than one page
        // clean the middle
        $elem = preg_replace('/<table\s*(.*)>/', NULL, $elem);
        $elem = preg_replace('/<\/table>\s*/', NULL, $elem);
        if(strpos($elem, "Liste") !== false) return;
        return trim($elem, '#');
    }, $a)));




    $districts = array();
    $counies   = array();

    $id = trim(pathinfo($htmlFile, PATHINFO_FILENAME), '.html');

    foreach($a as $k => $data)
    {
        $daira =  explode('#', $data);

        $districts[$k][$lang == 'en' ? 'district_name'   : 'daira']          = $daira[2] ?? "-----";
        $districts[$k][$lang == 'en' ? 'district_code'   : 'code_daira']     = $daira[1] ?? "-----";
        $districts[$k][$lang == 'en' ? 'state_id'        : 'wilaya_id']      = $id;

        $counies[$k][$lang   == 'en' ? 'county_name'     : 'commune']        = $daira[4] ?? "-----";
        $counies[$k][$lang   == 'en' ? 'county_code'     : 'code_commune']   = $daira[3] ?? "-----";
        $counies[$k][$lang   == 'en' ? 'district_code'   : 'code_daira']     = $daira[1] ?? "-----";
        $counies[$k][$lang   == 'en' ? 'state_id'        : 'wilaya_id']      = $id;

    }

    $districts = array_map("unserialize", array_unique(array_map("serialize", $districts)));
    $counies   = array_map("unserialize", array_unique(array_map("serialize", $counies)));

    return array_values($type == 'district' ? $districts : $counies);
}


$files = array_slice(scandir(__DIR__.'/html'), 2);


$data = array();

foreach($files as $file)
{
    $data =  array_merge($data, parse_dz('html/'.$file, 'county', 'fr'));
}
