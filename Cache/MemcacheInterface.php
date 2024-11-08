<?php

namespace Lsw\MemcacheBundle\Cache;

interface MemcacheInterface
{
    public function setFailureCallback(?callable $failureCallback): bool;

    public function getServerStatus(string $host, int $port = 11211): int|bool;

    public function getVersion(): string|bool;

    public function add(array|string $key, $var = null, int $flag = 0, int $exptime = 0, int $cas = 0): bool;

    public function set(array|string $key, $var = null, int $flag = 0, int $exptime = 0, int $cas = 0): bool;

    public function replace(array|string $key, $var = null, int $flag = 0, int $exptime = 0, int $cas = 0): bool;

    public function cas(array|string $key, $var = null, int $flag = 0, int $exptime = 0, int $cas = 0): bool;

    public function prepend(array|string $key, $var = null, int $flag = 0, int $exptime = 0, int $cas = 0): bool;

    public function get(array|string $key, &$flags = null, &$cas = null): mixed;

    public function getStats(string $type = '', int $slabid = 0, int $limit = 100): array|bool;

    public function getExtendedStats(string $type = '', int $slabid = 0, int $limit = 100): array|bool;

    public function setCompressThreshold(int $threshold, float $minSavings = 0.2): bool;

    public function delete(array|string $key, int $exptime = 0): array|bool;

    public function increment(array|string $key, int $value = 1, int $defval = 0, int $exptime = 0): array|int|bool;

    public function decrement(array|string $key, int $value = 1, int $defval = 0, int $exptime = 0): array|int|bool;

    public function close(): bool;

    public function flush(int $delay = 0): bool;

    public function addServer(
        $host,
        $tcpPort = 11211,
        $udpPort = 0,
        $persistent = true,
        $weight = 1,
        $timeout = 1,
        $retryInterval = 15,
        $status = true
    ): bool;

    public function connect(
        $host,
        $tcpPort = 11211,
        $udpPort = 0,
        $persistent = true,
        $weight = 1,
        $timeout = 1,
        $retryInterval = 15
    );

    public function findServer(string $key): string|bool;
}
