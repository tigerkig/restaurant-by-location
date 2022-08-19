<?PHP

    global $config;
    $config = [];
    
    $config['db_host'] = 'localhost';
    $config['db_username'] = 'root';
    $config['db_pass'] = '';
    $config['db_name'] = 'thesharepage_restaurant';

    $conn = new mysqli($config['db_host'], $config['db_username'], $config['db_pass'], $config['db_name']);