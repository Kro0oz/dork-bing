<?php

print "

  _ _______________ _               
 / |___ /___ /___  | | ___ __ ___   
 | | |_ \ |_ \  / /| |/ / '__/ _ \  
 | |___) |__) |/ / |   <| | | (_) | 
 |_|____/____//_/  |_|\_\_|  \___/  
           scanner bing.com
          twitter/1337Kro
 
      
";
// usage : php 1337kro.php

function getsource($url, $proxy) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    if ($proxy) {
        $proxy = explode(':', autoprox());
        curl_setopt($curl, CURLOPT_PROXY, $proxy[0]);
        curl_setopt($curl, CURLOPT_PROXYPORT, $proxy[1]);
    }
    $content = curl_exec($curl);
    curl_close($curl);
    return $content;
}

echo "\n\t ur dork here (: : ";$dork=trim(fgets(STDIN,1024));
$do=urlencode($dork);
        //$ip="200.58.111.34";
        $npage = 1;
        $npages = 30000;
        $allLinks = array();
        $lll = array();
        while($npage <= $npages) {
            $x = getsource("http://www.bing.com/search?q=".$do."&first=" . $npage."&FORM=PERE4", $proxy);
            if ($x) {
                preg_match_all('#<h2><a href="(.*?)" h="ID#', $x, $findlink);
                foreach ($findlink[1] as $fl) array_push($allLinks, $fl);
                $npage = $npage + 10;
                if (preg_match("(first=" . $npage . "&amp)siU", $x, $linksuiv) == 0) break;
            } else break;
        }
        $URLs = array();
        foreach($allLinks as $url){
            $exp = explode("/", $url);
            $URLs[] = $exp[2];
        }
        $array = array_filter($URLs);
        $array = array_unique($array);
        $sss=count(array_unique($array));
		echo"\nToTaL SiTe : ". $sss.'';

        foreach ($array as $domain) {

            echo"\nhttp://".$domain.'/';

        }
?>
