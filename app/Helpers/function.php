<?php
function convertHoursToDaysAndHours($hours)
{
    $days = floor($hours / 24);
    $remainingHours = $hours % 24;

    $result = '';

    if ($days > 0)
    {
        $result .= $days . ' hari';
    }

    if ($remainingHours > 0)
    {
        $result .= ($days > 0 ? ' ' : '') . $remainingHours . ' jam';
    }

    return $result ?: '0 jam';
}


if(!function_exists('reloadPage')){

    function reloadPage(){
        return redirect(request()->header('Referer'));
    }

}
