<?php


define('ADMIN_RESOURCE', 'portal.pages.');


define('PROJECT_URGENT_ARRAY', serialize(array(
    '<div class="chip chip-warning">
        <div class="chip-body">
        <div class="chip-text text-dark bold mx-auto">No</div>
        </div>
    </div>',
    '<div class="chip chip-success">
        <div class="chip-body">
        <div class="chip-text text-dark bold mx-auto">Yes</div>
        </div>
    </div>'
)));

define('PROJECT_TYPE_ARRAY', serialize(array(
    '<div class="chip chip-primary">
        <div class="chip-body">
        <div class="chip-text mx-auto">Digitizing</div>
        </div>
    </div>',
    '<div class="chip chip-dark">
        <div class="chip-body">
        <div class="chip-text mx-auto">Vector</div>
        </div>
    </div>'
)));

define('WORK', 0);
define('NEWS', 1);
define('INSTAGRAM', 2);
define('TWITTER', 3);
