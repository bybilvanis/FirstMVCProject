<?php

return "
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='CONTENT-TYPE' content='text/html;charset=UTF-8'>
    $pageData->css
    $pageData->embeddedStyle
    <title>$pageData->title</title>
</head>
<body>
    $pageData->content
</body>
</html>
";