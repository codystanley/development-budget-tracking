<?php
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'public/index.html';
        break;
    default:
        http_response_code(404);
        exit('Not Found');
}
?>