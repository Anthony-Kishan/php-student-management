<?php
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function disableElement($isLoggedIn, $type = 'a')
{
    if (!$isLoggedIn) {
        return 'disabled';
    }
    return '';
}

function disableLink($isLoggedIn)
{
    if (!$isLoggedIn) {
        return 'style="pointer-events: none; color: black; display: none;"';
    }
    return '';
}

function addViewButton($isLoggedIn)
{
    if (!$isLoggedIn) {
        return 'style="display: inline-block;"';
    }
    return 'style="display:;"';
}




?>