Automatic Disaster Alert System for Tourist (ADAST) Read me

1. Files Structure

ADAST
	-/bootstrap				# library for UI use
	|
	-/log					# log files for debug and track
	|
	-/phprules/*.php 		# php files for rule engine library
	|
	-/QueryScript/*.rb		# ruby file for query information from virtual repository
	|			 |
	|			 -/QueryResult	# text file of query result
	|
	-ADAST.php 				# entry pages of ADAST
	|
	-sub.php 				#
	|
	-list.php 				#
	|
	-boody.php              # library for print message on the text area in ADAST.php
	|
	-Rule_Engine.php 		# the entry point of rule engine
	|
	-fact.php 				# the data structure and performed actions of rule engine
	|
	-rule.srl				# rules used in rule engine
	|
	-subscribe.php 			# library for submiting parameter to ADAST
	|
	-SMS.php 				# library for sendinf SMS message


VR
	-VR_publisher.php 		# to simulate VR publish data 

2. Current Publish and Subscribe address
2.1 Publish (Active Update Data)
http://hub.ccg.tw/?notification=true&topic=http://vrtestbed.iis.sinica.edu.tw:3000/data/debris_alerts.xml

2.2 Subcribe (@Anderson)
http://hub.ccg.tw/?callback=http://140.109.22.187/ADAST_rule_engine/ADAST.php&topic=http://vrtestbed.iis.sinica.edu.tw:3000/data/debris_alerts.xml

2.3 Subcribe (@Old Yu)
http://hub.ccg.tw/?callback=http://adast.servequake.com/hub/broker/callback.php&topic=http://vrtestbed.iis.sinica.edu.tw:3000/data/debris_alerts.xml
