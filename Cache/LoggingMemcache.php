<?php
namespace Lsw\MemcacheBundle\Cache;

class LoggingMemcache extends \MemcachePool implements MemcacheInterface, LoggingMemcacheInterface {
    public function __construct($logging) {
        
        $this->calls = array();
        $this->logging = $logging;
    }
    private $calls;
    private $logging;
    public function getLoggedCalls() {
        return $this->calls;
    }
    private function logCall($start, $result) {
        $time = microtime(true) - $start;
        $this->calls[] = (object) compact('start', 'time', 'result');
        return $result;
    }
    // public function setFailureCallback($failureCallback) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'setFailureCallback';
    //         $arguments = array($failureCallback);
    //     }
    //     [$_failureCallback] = array($failureCallback);
    //     $result = parent::setFailureCallback($_failureCallback);
    //     [$failureCallback] = array($_failureCallback);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function getServerStatus($host,$port=11211) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'getServerStatus';
    //         $arguments = array($host,$port);
    //     }
    //     [$_host,$_port] = array($host,$port);
    //     $result = parent::getServerStatus($_host,$_port);
    //     [$host,$port] = array($_host,$_port);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function getVersion() {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'getVersion';
    //         $arguments = array();
    //     }
    //     $result = parent::getVersion();
    //
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function add($key,$var=null,$flag=0,$exptime=0) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'add';
    //         $arguments = array($key,$var,$flag,$exptime);
    //     }
    //     [$_key,$_var,$_flag,$_exptime] = array($key,$var,$flag,$exptime);
    //     $result = parent::add($_key,$_var,$_flag,$_exptime);
    //     [$key,$var,$flag,$exptime] = array($_key,$_var,$_flag,$_exptime);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function set($key,$var=null,$flag=0,$exptime=0) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'set';
    //         $arguments = array($key,$var,$flag,$exptime);
    //     }
    //     [$_key,$_var,$_flag,$_exptime] = array($key,$var,$flag,$exptime);
    //     $result = parent::set($_key,$_var,$_flag,$_exptime);
    //     [$key,$var,$flag,$exptime] = array($_key,$_var,$_flag,$_exptime);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function replace($key,$var=null,$flag=0,$exptime=0) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'replace';
    //         $arguments = array($key,$var,$flag,$exptime);
    //     }
    //     [$_key,$_var,$_flag,$_exptime] = array($key,$var,$flag,$exptime);
    //     $result = parent::replace($_key,$_var,$_flag,$_exptime);
    //     [$key,$var,$flag,$exptime] = array($_key,$_var,$_flag,$_exptime);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function cas($key,$var=null,$flag=0,$exptime=0,$cas=0) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'cas';
    //         $arguments = array($key,$var,$flag,$exptime,$cas);
    //     }
    //     [$_key,$_var,$_flag,$_exptime,$_cas] = array($key,$var,$flag,$exptime,$cas);
    //     $result = parent::cas($_key,$_var,$_flag,$_exptime,$_cas);
    //     [$key,$var,$flag,$exptime,$cas] = array($_key,$_var,$_flag,$_exptime,$_cas);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function prepend($key,$var=null,$flag=0,$exptime=0) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'prepend';
    //         $arguments = array($key,$var,$flag,$exptime);
    //     }
    //     [$_key,$_var,$_flag,$_exptime] = array($key,$var,$flag,$exptime);
    //     $result = parent::prepend($_key,$_var,$_flag,$_exptime);
    //     [$key,$var,$flag,$exptime] = array($_key,$_var,$_flag,$_exptime);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function get($key,&$flags=null,&$cas=null) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'get';
    //         $arguments = array($key,$flags,$cas);
    //     }
    //     [$_key,$_flags,$_cas] = array($key,$flags,$cas);
    //     $result = parent::get($_key,$_flags,$_cas);
    //     [$key,$flags,$cas] = array($_key,$_flags,$_cas);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function getStats($type='',$slabid=0,$limit=100) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'getStats';
    //         $arguments = array($type,$slabid,$limit);
    //     }
    //     [$_type,$_slabid,$_limit] = array($type,$slabid,$limit);
    //     if ($_type == '') {
    //         $result = parent::getStats();
    //     } else {
    //         $result = parent::getStats($_type, $_slabid, $_limit);
    //     }
    //     [$type,$slabid,$limit] = array($_type,$_slabid,$_limit);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function getExtendedStats($type='',$slabid=0,$limit=100) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'getExtendedStats';
    //         $arguments = array($type,$slabid,$limit);
    //     }
    //     [$_type,$_slabid,$_limit] = array($type,$slabid,$limit);
    //     if ($_type == '') {
    //         $result = parent::getExtendedStats();
    //     } else {
    //         $result = parent::getExtendedStats($_type, $_slabid, $_limit);
    //     }
    //     [$type,$slabid,$limit] = array($_type,$_slabid,$_limit);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function setCompressThreshold($threshold,$minSavings=0.2) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'setCompressThreshold';
    //         $arguments = array($threshold,$minSavings);
    //     }
    //     [$_threshold,$_minSavings] = array($threshold,$minSavings);
    //     $result = parent::setCompressThreshold($_threshold,$_minSavings);
    //     [$threshold,$minSavings] = array($_threshold,$_minSavings);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function delete($key,$exptime=0) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'delete';
    //         $arguments = array($key,$exptime);
    //     }
    //     [$_key,$_exptime] = array($key,$exptime);
    //     $result = parent::delete($_key,$_exptime);
    //     [$key,$exptime] = array($_key,$_exptime);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function increment($key,$value=1,$defval=0,$exptime=0) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'increment';
    //         $arguments = array($key,$value,$defval,$exptime);
    //     }
    //     [$_key,$_value,$_defval,$_exptime] = array($key,$value,$defval,$exptime);
    //     $result = parent::increment($_key,$_value,$_defval,$_exptime);
    //     [$key,$value,$defval,$exptime] = array($_key,$_value,$_defval,$_exptime);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function decrement($key,$value=1,$defval=0,$exptime=0) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'decrement';
    //         $arguments = array($key,$value,$defval,$exptime);
    //     }
    //     [$_key,$_value,$_defval,$_exptime] = array($key,$value,$defval,$exptime);
    //     $result = parent::decrement($_key,$_value,$_defval,$_exptime);
    //     [$key,$value,$defval,$exptime] = array($_key,$_value,$_defval,$_exptime);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function close() {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'close';
    //         $arguments = array();
    //     }
    //     $result = parent::close();
    //
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }
    // public function flush($delay=0) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'flush';
    //         $arguments = array($delay);
    //     }
    //     [$_delay] = array($delay);
    //     $result = parent::flush($_delay);
    //     [$delay] = array($_delay);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }

    // public function addServer(
    //     $host,
    //     $tcpPort = 11211,
    //     $persistent = true,
    //     $weight = 1,
    //     $timeout = 1,
    //     $retryInterval = 15,
    //     $status = true,
    //     callable $failure_callback = null,
    //     $timeoutms = null
    // ) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'addServer';
    //         $arguments = array($host,$tcpPort,$persistent,$weight,$timeout,$retryInterval,$status);
    //     }
    //     list($_host,$_tcpPort,$_persistent,$_weight,$_timeout,$_retryInterval,$_status) = array($host,$tcpPort,$persistent,$weight,$timeout,$retryInterval,$status);
    //     $result = parent::addServer($_host,$_tcpPort,$_persistent,$_weight,$_timeout,$_retryInterval,$_status);
    //     list($host,$tcpPort,$persistent,$weight,$timeout,$retryInterval,$status) = array($_host,$_tcpPort,$_persistent,$_weight,$_timeout,$_retryInterval,$_status);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }

    // public function connect($host, $tcpPort = 11211, $timeout = 1)
    // {
    //     if ($this->logging) {
    //         $start = microtime(true);
    //         $name = 'connect';
    //         $arguments = array($host, $tcpPort, $timeout);
    //     }
    //     list($_host, $_tcpPort, $_timeout) = array($host, $tcpPort, $timeout);
    //     $result = parent::connect($_host, $_tcpPort, $_timeout);
    //     list($host, $tcpPort, $timeout) = array($_host, $_tcpPort, $_timeout);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //
    //     return $result;
    // }
    // public function findServer($key) {
    //     if ($this->logging) { 
    //         $start = microtime(true);
    //         $name = 'findServer';
    //         $arguments = array($key);
    //     }
    //     [$_key] = array($key);
    //     $result = parent::findServer($_key);
    //     [$key] = array($_key);
    //     if ($this->logging) {
    //         $time = microtime(true) - $start;
    //         $this->calls[] = (object) compact('start', 'time', 'name', 'arguments', 'result');
    //     }
    //     return $result;
    // }

}
