<?php
require_once('Rule_Engine_1.php');

//// charles syntax
//file_put_contents('output/callback', print_r($_REQUEST['content'], FILE_APPEND));

if ($_REQUEST['topic'] != '') {

    // verbose message
    //echo "This message is from callback.php, good job O(∩_∩)O~";
    print("This message is from callback.php, good job O(∩_∩)O~!!!");

    // solve magic_quotes_gpc kicking by using stripslashes() due to urlencode() by sender
    $feed_content = stripslashes($_REQUEST['content']);

    // debug on file
//    file_put_contents('Parser_Debug/received_data.txt', $feed_content, FILE_APPEND);
    file_put_contents('log/received_data.txt', $feed_content, FILE_APPEND);
    //file_put_contents('received_data.txt', $feed_content, FILE_APPEND);

    // parse feed notification
    $parameter = parser($feed_content);

    print("Received new alert.");

    // Start the rule engine
    RuleEngine($parameter);


    // debug
    echo '<h2>Debug Message: Parameter Instance</h2>';
    my_print_debug($parameter);

    // debug
    echo '<h2>Debug Message: Feed Content (用檢視原始碼看寫死的 XML 格式的 Feed)</h2>';
    echo $feed_content;

} else if ($_REQUEST['query'] == 'true') {    // get query result from virtuoso via POST method

    // debug: query result (TouristAttraction.txt, GroupID.txt, Contact.txt)
    foreach($_REQUEST['result'] as $key => $value) {
        echo '$key = '."$key".', $value = '."$value"."\n";
    }

    // todo: send SMS, Line, etc.

} else {
    // verbose message
    echo "This message is from callback.php, bad job o(〒﹏〒)";
}

// parser
function parser($feed_content) {

    // load feed content
    $xml = new SimpleXmlElement($feed_content);

    // structure for getting value from feed-of-rdf by using RuleEngine's key
    $lookupArray = array("valueName"  => array("tag_name" => "station1StationName", "tag_type" => "Value"), 
                         "value"      => array("tag_name" => "station1ID",          "tag_type" => "Value"), 
                         "county"    => array("tag_name" => "County",              "tag_type" => "Attribute"), 
                         "town"       => array("tag_name" => "Town",                "tag_type" => "Attribute"), 
                         "vill"       => array("tag_name" => "Vill",                "tag_type" => "Attribute"), 
                         "debriesNo"  => array("tag_name" => "Debrisno",            "tag_type" => "Value"), 
                         "alertValue" => array("tag_name" => "AlertValue",          "tag_type" => "Value"), 
                         "alertType"  => array("tag_name" => "AlertType",           "tag_type" => "Value"), 
                         "timeStamp"  => array("tag_name" => "Time",                "tag_type" => "Value")
                     );

    // parse feed-of-rdf and save to array
    $resultArray = array();
    foreach($lookupArray as $key => $value) {
        //echo "[$key] ".$value["tag_name"]."=".$value["tag_type"]."<br />";

        if ($value["tag_type"] == "Value") {
            $resultArray["$key"] = getNodeValue($xml, $value["tag_name"]);
        } else if ($value["tag_type"] == "Attribute") {
            $resultArray["$key"] = getNodeAttribute($xml, $value["tag_name"]);
        } else {
            echo "Not Supported Yet."."<br />";
        }
    }

    // save to RuleEngine's structure
    $parameter = new Parameter($resultArray["valueName"], 
                               $resultArray["value"], 
                               $resultArray["county"], 
                               $resultArray["town"], 
                               $resultArray["vill"], 
                               $resultArray["debriesNo"], 
                               $resultArray["alertValue"], 
                               $resultArray["alertType"], 
                               $resultArray["timeStamp"]
                           );

    return $parameter;
}

// get xml node value
function getNodeValue($xml, $tag_name) {
    $results = $xml->children(NULL)->Description->children("ns1", true)->$tag_name;
    return (string) $results[0];
}

// get xml node attributes
function getNodeAttribute($xml, $tag_name) {
    $results = $xml->children(NULL)->Description->children("ns1", true)->$tag_name->attributes("rdf", true);
    return (string) $results['resource'];
}

// debug
function my_print_debug($message)
{
    echo '<pre>';
    //echo '@@ Test Begin'.'<br>';
    print_r($message).'<br>';
    //echo '@@ Test End'.'<br>';
    echo '</pre>';
}

// // rule engine input structure
// class Parameter
// //class Parameter extends Fact
// {
//     var $valueName;
//     var $value;

//     var $country;
//     var $town;
//     var $vill;
//     var $debriesNo;
//     var $alertValue;
//     var $alertType;
//     var $timeStamp;

//     function __construct($valueName, $value, $country, $town, $vill, $debriesNo, $alertValue, $alertType, $timeStamp)
//     {
//         $this->valueName  = $valueName;
//         $this->value      = $value;

//         $this->country    = $country;
//         $this->town       = $town;
//         $this->vill       = $vill;
//         $this->debriesNo  = $debriesNo;
//         $this->alertValue = $alertValue;
//         $this->alertType  = $alertType;
//         $this->timeStamp  = $timeStamp;
//     }
// }

?>
