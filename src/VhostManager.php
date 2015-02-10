<?php namespace Jehaby\XamppVhostManager;


class VhostManager {


    public $vhosts;


    public function __construct() {

        $etc_hosts = file_get_contents(HOSTS);
        $httpd_vhosts = file_get_contents(HTTPD_VHOSTS);

        preg_match_all('/127\.0\.0\.1[\t ]+(.+)/', $etc_hosts, $matches);
        $etc_hosts_array = array_flip($matches[1]);

        preg_match_all('#(<VirtualHost [^>]*>\s*.*?</VirtualHost>)#s', $httpd_vhosts, $matches);

        foreach($matches[1] as $record) {
            preg_match('|ServerName\s*(.*)|', $record, $match);

            if (array_key_exists($match[1], $etc_hosts_array)) {
                $this->vhosts[] = $match[1];
            }
        }

    }

    public static function add($vhost) {

        $new_vhost = <<< VHOST
\n
<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host.zebra.com
    DocumentRoot "%s{$vhost}"
    ServerName {$vhost}
    ErrorLog "logs/{$vhost}_err_log"
    CustomLog "logs/{$vhost}_custom_log" common
</VirtualHost>
VHOST;
        $new_vhost = sprintf($new_vhost, HTDOCS);

        if (!file_put_contents(HOSTS, "\n127.0.0.1 " . $vhost, FILE_APPEND)
            || !file_put_contents(HTTPD_VHOSTS, $new_vhost, FILE_APPEND)) {
            return false;
        }

        return true;
    }


    public function remove() {

        echo 'To be written...';

        return;

    }


}