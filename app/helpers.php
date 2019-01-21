<?php
function unique_file($fileName)
{
    return time() . uniqid().'-'.$fileName;
}
?>