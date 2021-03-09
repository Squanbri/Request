<?php

  $ch = curl_init();
  $fp = fopen("out.pdf", 'w');

  curl_setopt($ch, CURLOPT_URL, 'https://localhost:9980/lool/convert-to/docx');
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_STDERR, $fp);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'data' => '@' .realpath('file.docx'));
  curl_setopt($ch, CURLOPT_FILE, $fp);

  $result = curl_exec($ch);
  fwrite($fp, $contents);
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);
  fclose($fp);
?>
