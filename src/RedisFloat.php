<?php
declare(strict_types=1);

namespace icePHP;

/**
 * 位类型,String类型的子类型
 */
final class RedisFloat extends RedisElement
{
    /**
     * 获取当前存储对象的类型(字符串格式)
     * @return string
     */
    public function getType(): string
    {
        return 'Float';
    }

    /**
     * 数值增减(浮点)
     * @param $diff float 1/-1/N/-N
     * @return float 操作过后的值
     */
    public function crease(float $diff = 1): float
    {
        //参数修正为浮点
        $diff = floatval($diff);

        return $this->handle->incrByFloat($this->key, $diff);
    }

    /**
     * 获取当前缓存值,转换成浮点
     * @return float
     */
    public function get(): float
    {
        return floatval(parent::getRaw());
    }

    /**
     * 设置一个键值
     * @param $value float 值
     * @param bool $replace 是否覆盖
     * @param int $expire 生存期
     * @return bool 成功否
     */
    public function set(float $value,bool $replace = true, int $expire = 0):bool
    {
        return parent::setString(strval($value), $replace, $expire);
    }
}