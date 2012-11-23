<?php
//$myname = $_GET['name'];
//sleep(1); //為了製造 ajax loading效果，所以延遲5秒
//echo "You input name is $myname <br />";

//$content = file_get_contents('./log/received-data.txt');
//echo $content."<br />";
echo file_get_contents('log/received-data.txt')."<br />";

//ini_set('output_buffering','on');
//ini_set('zlib.output_compression', 0);
//ob_implicit_flush();
//for($i=0;$i<10;$i++) {
//      echo $i;
//      echo str_repeat(" ", 500);
//      ob_flush();
//      flush();
//      sleep(1);
//}




//$myname = $_GET['name'];
//for ($i = 0; $i < 5; $i++) {
//    print("You input name is $myname <br>");
//    //echo "You input name is $myname <br>";
//    //ob_end_flush();
//    //ob_start();
//    //ob_implicit_flush(true);
//    //ob_implicit_flush(false);
//    ob_flush();
//    flush();
//    sleep(1); //為了製造 ajax loading效果，所以延遲5秒
//}

// GOOD
//ob_start();
//echo str_repeat("A\n", 256) . "\n";
//ob_flush();
//flush();
//sleep(10);
//echo str_repeat("B\n", 256) . "\n";
//ob_flush();
//flush();
//sleep(10);
//echo str_repeat("C\n", 256) . "\n";

//while (1)
//{
//    echo "hello\n";
//    sleep(1);
//    ob_flush;
//    flush();
//}

//ob_start();
//for ( $i = 0; $i < 5; $i++) {
//    sleep(3);
//    echo time();
//    echo "<br />";
//    echo "\n";
//    ob_flush();
//    flush();
//}

//for ($i = 0; $i < 5; $i++) {
//    print("You input name is XD\n <br />");
//    ob_flush();
//    flush();
//    sleep(5); //為了製造 ajax loading效果，所以延遲5秒
//}

//ob_start();
//for($i=0;$i<5;$i++)
//{
//    echo 'printing...<br />';
//    ob_flush();
//    flush();
//
//    usleep(300000);
//}

//ob_start();//打開output_buffer
//for($i=0;$i<10;$i++)
//{
//    echo $i;
//    ob_flush();
//    flush();
//    sleep(1);
//}
//ob_end_clean();//關閉output_buffer

//ob_start();
//
//echo "Line #1...<br>";
//ob_flush();
//flush();
//sleep(2);
//
//echo "Line #2...<br>";
//ob_flush();
//flush();
//sleep(2);
//
//echo "Line #4...<br>";

//$brush_price = 5; 
//
//echo "<table border=\"1\" align=\"center\">";
//echo "<tr><th>Quantity</th>";
//echo "<th>Price</th></tr>";
//for ( $counter = 10; $counter <= 100; $counter += 10) {
//    echo "<tr><td>";
//    echo $counter;
//    echo "</td><td>";
//    echo $brush_price * $counter;
//    echo "</td></tr>";
//}
//echo "</table>";

//ob_end_clean();//關閉output_buffer
//for($i=0;$i<5;$i++)
//{
//    echo $i;
//    flush();
//    sleep(1);
//}

//for ($i = 0; $i < 5; $i++) {
//    print("You input name is XD <br>");
//    //echo "You input name is $myname <br>";
//    //ob_end_flush();
//    //ob_start();
//    //ob_implicit_flush(true);
//    //ob_implicit_flush(false);
//    ob_flush();
//    flush();
//    sleep(1); //為了製造 ajax loading效果，所以延遲5秒
//}
?> 
