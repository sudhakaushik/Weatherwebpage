<?php
                $street=$_GET["street"];
                $city=$_GET["city"];
                $state=$_GET["state"];
                $unit=$_GET["degree"];
                $googlekey="AIzaSyB0rzZTvslpJgSuKjqqpgSMeT9mc-ffOlM";
                $gurl="https://maps.google.com/maps/api/geocode/xml?address=$street,$city,$state&key=$googlekey";
                $xml=new SimpleXMLElement(urlencode($gurl), 0, TRUE);
                if($xml->status == "ZERO_RESULTS"){
                    echo "<div id=\"rarea\" style=\"border: 1px solid;width:400px;position:absolute;left:35%;top:46%\">";
                    echo "No Results, Try another address";
                    echo "</div>";
                    exit();
                }
                $lat=$xml->result[0]->geometry[0]->location[0]->lat;
                $lng=$xml->result[0]->geometry[0]->location[0]->lng;
                $key="80691734292bed78461936f2946019ad";
                $URL ="https://api.forecast.io/forecast/$key/$lat,$lng?units=$unit&exclude=flags";
                $wdata = file_get_contents($URL);
                echo $wdata;
?>