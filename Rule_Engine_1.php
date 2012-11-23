<?php
    require_once('phprules/phprules.php');
    require_once('fact.php');
    require_once('boody.php');

    function RuleEngine($alert_info)    {

    	$wm = new WorkingMemory();
        

        //print("Start Rule Engine.");
        PrintText("Start%20Rule%20Engine.");

        //$wm->insert( new Parameter($RecvCountry, $RecvTown, $RecvVill, $RecvDebriesNo, $RecvAlertValue, $RecvAlertType, $RecvTimeStamp));
        $wm->insert($alert_info);
        
        // Initial actions for rule engine
        $wm->insertActionFassade('ResponseComponent', new ResponseComponent());

    	$rr = new RuleReader();
    	$rs = new RuleSession($rr->parseFile("rule.srl"),$wm);
    	$rs->maxFiringPerRule = 1;
    	$rs->verbosity = 1;
    	
        // Fire the rule engine
        $rs->fireAll();
    }
?>
