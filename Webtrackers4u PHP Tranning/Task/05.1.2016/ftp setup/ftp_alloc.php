<?php

$file = "/home/user/myfile";

// connect to the server
$conn_id = ftp_connect('ftp.example.com');
$login_result = ftp_login($conn_id, 'anonymous', 'user@example.com');

if (ftp_alloc($conn_id, filesize($file), $result)) {
  echo "Space successfully allocated on server.  Sending $file.\n";
  ftp_put($conn_id, '/incomming/myfile', $file, FTP_BINARY);
} else {
  echo "Unable to allocate space on server.  Server said: $result\n";
}

ftp_close($conn_id);

?> 