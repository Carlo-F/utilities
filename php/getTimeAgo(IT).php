<?php
/**
 * Restituisce il tempo trascorso dalla pubblicazione di un post
 *
 * @param int $ptime la data di pubblicazione in formato Unix timestamp 
 * 
 * @return string il tempo trascorso dalla data indicata es. 'pubblicato meno di 1 secondo fa'
 */
function get_timeago( $ptime )
{
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'pubblicato meno di 1 secondo fa';
    }

    $condition = array(
                12 * 30 * 24 * 60 * 60  =>  'anno',
                30 * 24 * 60 * 60       =>  'mese',
                24 * 60 * 60            =>  'giorno',
                60 * 60                 =>  'ora',
                60                      =>  'minuto',
                1                       =>  'secondo'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );

            if ($str == 'ora') {
                return 'pubblicato circa ' . $r . ' ' . ( $r > 1 ? substr($str, 0, -1).'e' : $str ) . ' fa';
            } else {
                return 'pubblicato circa ' . $r . ' ' . ( $r > 1 ? substr($str, 0, -1).'i' : $str ) . ' fa';
            }
            
        }
    }
}
?>
