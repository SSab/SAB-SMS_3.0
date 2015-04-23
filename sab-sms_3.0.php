Enter file contents here1 <?PHP 
2  
3   if (!isset($_GET['cmd'])) die(); 
4   if (!isset($_GET['frm'])) die(); 
5   if (!isset($_GET['num'])) die(); 
6   if (!isset($_GET['msg'])) die(); 
7  
8   $cmd = $_GET['cmd']; 
9   $frm = $_GET['frm']; 
10   $num = $_GET['num']; 
11   $msg = $_GET['msg']; 
12    
13   $sub = "Hold ".$frm." to reply"; 
14   $frm = "pebble@sms_2.0.php"; 
15   $hdr = "From: ".$frm; 
16  
17   $sentOK = 0; 
18   if (strcmp($cmd, "send") == 0) { 
19       if (mail($num, $sub, $msg, $hdr)) { $sentOK = 1; } 
20   } else { 
21       if (strcmp($cmd, "test") == 0) { 
22         print "<b>To:</b> ".$num."<br><b>From:</b> ".$frm."<br><b>Subject:</b> ".$sub."<br><b>Msg:</b> ".$msg."<br><br>"; 
23     } 
24   } 
25   $result[1] = array(); 
26   $result[1] = array('I', $sentOK); 
27   print json_encode($result); 
28  
29 ?> 
