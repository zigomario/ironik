<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;




class FacebookDebugger extends Model
{


    /*
             * https://developers.facebook.com/docs/opengraph/using-objects
             *
             * Updating Objects
             *
             * When an action is published, or a Like button pointing to the object clicked,
             * Facebook will 'scrape' the HTML page of the object and read the meta tags.
             * The object scrape also occurs when:
             *
             *      - Every 7 days after the first scrape
             *
             *      - The object URL is input in the Object Debugger
             *           http://developers.facebook.com/tools/debug
             *
             *      - When an app triggers a scrape using an API endpoint
             *           This Graph API endpoint is simply a call to:
             *
             *           POST /?id={object-instance-id or object-url}&scrape=true
             */



    public function clear_open_graph_cache($url)
    {
        $vars = array('id' => $url, 'scrape' => 'true','access_token'=>'1583810988597192|a47f46e96dce60895cf7a1d04eafc3d5');
        $body = http_build_query($vars);

        $fp = fsockopen('ssl://graph.facebook.com', 443);
        fwrite($fp, "POST / HTTP/1.1\r\n");
        fwrite($fp, "Host: graph.facebook.com\r\n");
        fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
        fwrite($fp, "Content-Length: " . strlen($body) . "\r\n");
        fwrite($fp, "Connection: close\r\n");
        fwrite($fp, "\r\n");
        fwrite($fp, $body);
        fclose($fp);
    }

}