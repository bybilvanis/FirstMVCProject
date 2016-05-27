<?php
return "
<!DOCTYPE html>
<html>
<head>
    <title>$pageData->title</title>
    <meta http-equiv='CONTENT-TYPE' content='text/html;charset=UTF-8'>
    $pageData->css <!-- waarde bepaald in index-bestand, dit is placeholder voor stijlblad -->
    $pageData->embeddedStyle
</head>
<body>
$pageData->content
</body>
</html>
";