<?php

namespace Lsw\MemcacheBundle\Cache;

class LoggingMemcache extends \MemcachePool implements MemcacheInterface, LoggingMemcacheInterface
{
    public function __construct(bool $logging = false)
    {
        $this->calls = [];
        $this->logging = $logging;
    }

    private array $calls = [];

    /**
     * @var bool
     */
    private bool $logging = false;

    /**
     * @inheritDoc
     */
    public function getLoggedCalls(): array
    {
        return $this->calls;
    }

    private function logCall($start, $result)
    {
        $time = microtime(true) - $start;
        $this->calls[] = (object)compact('start', 'time', 'result');

        return $result;
    }

    public function setFailureCallback($failureCallback): bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'setFailureCallback';
            $arguments = [$failureCallback];
        }
        [$_failureCallback] = [$failureCallback];
        $result = parent::setFailureCallback($_failureCallback);
        [$failureCallback] = [$_failureCallback];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function getServerStatus($host, $port = 11211): int|bool
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'getServerStatus';
            $arguments = [$host, $port];
        }
        [$_host, $_port] = [$host, $port];
        $result = parent::getServerStatus($_host, $_port);
        [$host, $port] = [$_host, $_port];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function getVersion()
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'getVersion';
            $arguments = [];
        }
        $result = parent::getVersion();

        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function add($key, $var = null, $flag = 0, $exptime = 0)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'add';
            $arguments = [$key, $var, $flag, $exptime];
        }
        [$_key, $_var, $_flag, $_exptime] = [$key, $var, $flag, $exptime];
        $result = parent::add($_key, $_var, $_flag, $_exptime);
        [$key, $var, $flag, $exptime] = [$_key, $_var, $_flag, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function set($key, $var = null, $flag = 0, $exptime = 0)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'set';
            $arguments = [$key, $var, $flag, $exptime];
        }
        [$_key, $_var, $_flag, $_exptime] = [$key, $var, $flag, $exptime];
        $result = parent::set($_key, $_var, $_flag, $_exptime);
        [$key, $var, $flag, $exptime] = [$_key, $_var, $_flag, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function replace($key, $var = null, $flag = 0, $exptime = 0)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'replace';
            $arguments = [$key, $var, $flag, $exptime];
        }
        [$_key, $_var, $_flag, $_exptime] = [$key, $var, $flag, $exptime];
        $result = parent::replace($_key, $_var, $_flag, $_exptime);
        [$key, $var, $flag, $exptime] = [$_key, $_var, $_flag, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function cas($key, $var = null, $flag = 0, $exptime = 0, $cas = 0)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'cas';
            $arguments = [$key, $var, $flag, $exptime, $cas];
        }
        [$_key, $_var, $_flag, $_exptime, $_cas] = [$key, $var, $flag, $exptime, $cas];
        $result = parent::cas($_key, $_var, $_flag, $_exptime, $_cas);
        [$key, $var, $flag, $exptime, $cas] = [$_key, $_var, $_flag, $_exptime, $_cas];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function prepend($key, $var = null, $flag = 0, $exptime = 0)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'prepend';
            $arguments = [$key, $var, $flag, $exptime];
        }
        [$_key, $_var, $_flag, $_exptime] = [$key, $var, $flag, $exptime];
        $result = parent::prepend($_key, $_var, $_flag, $_exptime);
        [$key, $var, $flag, $exptime] = [$_key, $_var, $_flag, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function get($key, &$flags = null, &$cas = null)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'get';
            $arguments = [$key, $flags, $cas];
        }
        [$_key, $_flags, $_cas] = [$key, $flags, $cas];
        $result = parent::get($_key, $_flags, $_cas);
        [$key, $flags, $cas] = [$_key, $_flags, $_cas];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function getStats($type = '', $slabid = 0, $limit = 100)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'getStats';
            $arguments = [$type, $slabid, $limit];
        }
        [$_type, $_slabid, $_limit] = [$type, $slabid, $limit];
        if ($_type == '') {
            $result = parent::getStats();
        } else {
            $result = parent::getStats($_type, $_slabid, $_limit);
        }
        [$type, $slabid, $limit] = [$_type, $_slabid, $_limit];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function getExtendedStats($type = '', $slabid = 0, $limit = 100)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'getExtendedStats';
            $arguments = [$type, $slabid, $limit];
        }
        [$_type, $_slabid, $_limit] = [$type, $slabid, $limit];
        if ($_type == '') {
            $result = parent::getExtendedStats();
        } else {
            $result = parent::getExtendedStats($_type, $_slabid, $_limit);
        }
        [$type, $slabid, $limit] = [$_type, $_slabid, $_limit];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function setCompressThreshold($threshold, $minSavings = 0.2)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'setCompressThreshold';
            $arguments = [$threshold, $minSavings];
        }
        [$_threshold, $_minSavings] = [$threshold, $minSavings];
        $result = parent::setCompressThreshold($_threshold, $_minSavings);
        [$threshold, $minSavings] = [$_threshold, $_minSavings];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function delete($key, $exptime = 0)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'delete';
            $arguments = [$key, $exptime];
        }
        [$_key, $_exptime] = [$key, $exptime];
        $result = parent::delete($_key, $_exptime);
        [$key, $exptime] = [$_key, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function increment($key, $value = 1, $defval = 0, $exptime = 0)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'increment';
            $arguments = [$key, $value, $defval, $exptime];
        }
        [$_key, $_value, $_defval, $_exptime] = [$key, $value, $defval, $exptime];
        $result = parent::increment($_key, $_value, $_defval, $_exptime);
        [$key, $value, $defval, $exptime] = [$_key, $_value, $_defval, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function decrement($key, $value = 1, $defval = 0, $exptime = 0)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'decrement';
            $arguments = [$key, $value, $defval, $exptime];
        }
        [$_key, $_value, $_defval, $_exptime] = [$key, $value, $defval, $exptime];
        $result = parent::decrement($_key, $_value, $_defval, $_exptime);
        [$key, $value, $defval, $exptime] = [$_key, $_value, $_defval, $_exptime];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function close()
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'close';
            $arguments = [];
        }
        $result = parent::close();

        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function flush($delay = 0)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'flush';
            $arguments = [$delay];
        }
        [$_delay] = [$delay];
        $result = parent::flush($_delay);
        [$delay] = [$_delay];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function addServer(
        $host,
        $tcpPort = 11211,
        $udpPort = 0,
        $persistent = true,
        $weight = 1,
        $timeout = 1,
        $retryInterval = 15,
        $status = true
    ): bool {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'addServer';
            $arguments = array($host,$tcpPort,$udpPort,$persistent,$weight,$timeout,$retryInterval,$status);
        }
        list($_host,$_tcpPort,$_udpPort,$_persistent,$_weight,$_timeout,$_retryInterval,$_status) = array($host,$tcpPort,$udpPort,$persistent,$weight,$timeout,$retryInterval,$status);
        $result = parent::addServer($_host,$_tcpPort,$_udpPort,$_persistent,$_weight,$_timeout,$_retryInterval,$_status);
        list($host,$tcpPort,$udpPort,$persistent,$weight,$timeout,$retryInterval,$status) = array($_host,$_tcpPort,$_udpPort,$_persistent,$_weight,$_timeout,$_retryInterval,$_status);
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function connect($host,$tcpPort=11211,$udpPort=0,$persistent=true,$weight=1,$timeout=1,$retryInterval=15)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'connect';
            $arguments = array($host,$tcpPort,$udpPort,$persistent,$weight,$timeout,$retryInterval);
        }
        list($_host,$_tcpPort,$_udpPort,$_persistent,$_weight,$_timeout,$_retryInterval) = array($host,$tcpPort,$udpPort,$persistent,$weight,$timeout,$retryInterval);
        $result = parent::connect($_host,$_tcpPort,$_udpPort,$_persistent,$_weight,$_timeout,$_retryInterval);
        list($host,$tcpPort,$udpPort,$persistent,$weight,$timeout,$retryInterval) = array($_host,$_tcpPort,$_udpPort,$_persistent,$_weight,$_timeout,$_retryInterval);
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }

    public function findServer($key)
    {
        if ($this->logging) {
            $start = microtime(true);
            $name = 'findServer';
            $arguments = [$key];
        }
        [$_key] = [$key];
        $result = parent::findServer($_key);
        [$key] = [$_key];
        if ($this->logging) {
            $time = microtime(true) - $start;
            $this->calls[] = (object)compact('start', 'time', 'name', 'arguments', 'result');
        }

        return $result;
    }
}
