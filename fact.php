<?php
    require_once('phprules/phprules.php');
	require_once('SMS.php');
    require_once('boody.php');    
    class Parameter extends Fact
    {
        var $valueName;
        var $value;

        var $county;
        var $town;
        var $vill;
        var $debriesNo;
        var $alertValue;
        var $alertType;
        var $timeStamp;

       function __construct( $valueName, $value, $county, $town, $vill, $debriesNo, $alertValue, $alertType, $timeStamp ) {
        // function __construct($country, $town, $vill, $debriesNo, $alertValue, $alertType, $timeStamp ) {
            $this->valueName    = $valueName;
            $this->value        = $value;

            $this->county     = $county;
            $this->town        = $town ;
            $this->vill        = $vill;
            $this->debriesNo   = $debriesNo;
            $this->alertValue  = $alertValue;
            $this->alertType   = $alertType;
            $this->timeStamp   = $timeStamp;

            print_r($this);
        }
    }



    ############################ 
    ##### Action Component #####
    ############################    
    class ResponseComponent {
        var $list_of_phone_number;

        function do_action() {
           print("LED light up");
            // exec('led 1 1'); # light up led[1]
            // sleep(3);
            // exec('led 1 0'); # turn off led[1]
        }

        function do_action_3() {

           //print("do_action_3");
           // print("Rule: Debries_Flow_3 is fired.");
           // print("Start to perform actions.");
           PrintText("Rule:%20Debries_Flow_3%20is%20fired.");
           PrintText("Start%20to%20perform%20actions.");

           
            $arrayContact = array();
            $alert_message = "Debries Alert! Check on Mobile Assistant for Disaster (MAD).";

            // Query TouristAttraction
            exec("C:\\Ruby193\\bin\\ruby.exe QueryScript/query_TouristAttraction.rb");
            // print("Query tourist attraction from VR.");
            PrintText("Query%20tourist%20attraction%20from%20VR.");
            
            // sleep(1);
            
            // Parse TouristAttraction.txt
            //$fileTouristAttraction = file_get_contents('/QueryScript/QueryResult/TouristAttraction.txt', true);
            $fileTouristAttraction = file_get_contents('QueryScript/QueryResult/TouristAttraction.txt', true);
            $rowsTouristAttraction = explode("\n", $fileTouristAttraction);
            foreach ($rowsTouristAttraction as $rowTouristAttraction => $dataTouristAttraction) {
                echo($dataTouristAttraction);
                echo("<br>");
            }
            //print("Receive tourist attraction from VR.");
            PrintText("Receive%20tourist%20attraction%20from%20VR.");

            // Query GuroupID within TouistAttraction.txt
            exec("C:\\Ruby193\\bin\\ruby.exe QueryScript/query_TouristGroupID.rb");
            //print("Query tourist tourist group ID from VR.");
            PrintText("Query%20tourist%20group%20ID%20from%20VR.");
            // sleep(1);

            // Parse GroupID.txt
            $fileGroupID = file_get_contents('QueryScript/QueryResult/GroupID.txt', true);
            $rowsGroupID = explode("\n", $fileGroupID);
            foreach ($rowsGroupID as $rowGroupID => $dataGroupID) {
                echo($dataGroupID);
                echo("<br>");                    
            }
            //print("Receive tourist tourist group ID from VR.");
            PrintText("Receive%20tourist%20group%20ID%20from%20VR.");


            // Query Contact of each GroupID
            exec("C:\\Ruby193\\bin\\ruby.exe QueryScript/query_Contact.rb");
            // print("Query tourist contact from VR.");
            PrintText("Query%20tourist%20contact%20from%20VR.");
            //sleep(1);

            // Parse Contact.txtz
            $fileContact = file_get_contents('QueryScript/QueryResult/Contact.txt', true);
            $rowsContact = explode("\n", $fileContact);
            foreach ($rowsContact as $rowContact => $dataContact) {
                $dataContactArray = explode(",", $dataContact);
                
                if ($dataContactArray[1] != "") {
                    array_push($arrayContact, $dataContactArray[1]);
                    //echo($dataContactArray[1]);
                    //echo("<br>");    
                }
                
            }
            // print("Receive tourist contact from VR.");
            PrintText("Receive%20tourist%20contact%20from%20VR.");

            //print_r($arrayContact);
            file_put_contents('log/received-data-PHONE.txt', $arrayContact.PHP_EOL, FILE_APPEND);

            // Call the SendSMS with Contacts
            SendSMS($arrayContact, $alert_message);

        }


        function do_action_2() {
           print("Rule: Debries_Flow_2 is fired.");
           print("Magnitude: moderate debreies flow alert!");
            // exec('led 1 1'); # light up led[1]
            // sleep(3);
            // exec('led 1 0'); # turn off led[1]
        }

        function do_action_1() {
           print("Rule: Debries_Flow_1 is fired.");
           print("Magnitude: slight debreies flow alert!");
            // exec('led 1 1'); # light up led[1]
            // sleep(3);
            // exec('led 1 0'); # turn off led[1]
        }
    }

?>
