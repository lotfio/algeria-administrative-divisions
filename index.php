<?php

/**
 * algeria cities project by lotfio lakehal
 * https://onil.dz/wp-content/uploads/2017/10/10BOUIRA.pdf wilaya id + name capital .pdf
 *
 * https://pdftables.com/ to convert data to csv
 *
 * TODO
 * when inserting into db add slashers
 * remove hyphens from names
 * strtoupper all names
 * remove é charachter it was found in one file
 *
 * images for wilayat
 * https://gadm.org/maps/DZA/eltarf.html
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

        $districts[$k][$lang == 'en' ? 'district_name'   : 'daira']          = (string)  $daira[2] ?? "-----";
        $districts[$k][$lang == 'en' ? 'district_code'   : 'code_daira']     = (int)     strlen($daira[1] ?? "-----") < 4 ? 0 . $daira[1]: $daira[1];
        $districts[$k][$lang == 'en' ? 'state_id'        : 'wilaya_id']      = (int)     strlen($id) < 2 ? 0 . $id: $id;

        $counies[$k][$lang   == 'en' ? 'county_name'     : 'commune']        = (string) $daira[4] ?? "-----";
        $counies[$k][$lang   == 'en' ? 'county_code'     : 'code_commune']   = (int)    strlen($daira[3] ?? "-----") < 4 ? 0 . $daira[3]: $daira[3];
        $counies[$k][$lang   == 'en' ? 'district_code'   : 'code_daira']     = (int)    strlen($daira[1] ?? "-----") < 4 ? 0 . $daira[1]: $daira[1];
        $counies[$k][$lang   == 'en' ? 'state_id'        : 'wilaya_id']      = (int)    strlen($id) < 2 ? 0 . $id: $id;

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

usort($data, function($a, $b){

    $c  = $a['wilaya_id'] - $b['wilaya_id'];
    $c .= $a['code_commune'] - $b['code_commune'];
    return $c;
});



/*
insert into DB
try{
    $con = new PDO("mysql:host=localhost;dbname=aad", 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
    die($e->getMessage());
}

$sql = "INSERT INTO communes (`id`, `name`, `code`, `daira_code`, `wilaya_code`, `post_code`, `surface`, `population`, `lat`, `lng`) VALUES ";

foreach($data as $commune)
{
    $d = array_values($commune);
    $d = array_map(function($elem){ return "'". str_replace('-', " ", strtoupper(addslashes($elem))) ."'"; }, $d);

    $sql .= "('NULL'," . implode(',', $d) .  ",'0','0','0','0','0'" . "),";
}

$sql =  rtrim($sql, "\n,") . ";";
$stmt = $con->prepare($sql);
$stmt->execute();
*/