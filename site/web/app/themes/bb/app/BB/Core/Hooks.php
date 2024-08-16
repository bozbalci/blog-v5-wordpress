<?php

namespace App\BB\Core;

use ReflectionAttribute;
use App\BB\Attributes\WpHook;

class Hooks
{
    /**
     * @template T
     * @param T $object
     * @return T
     */
    public static function apply($object)
    {
        $reflection = new \ReflectionObject($object);

        foreach ($reflection->getMethods() as $method) {
            $attributes = $method->getAttributes(
                WpHook::class,
                ReflectionAttribute::IS_INSTANCEOF
            );

            foreach ($attributes as $attribute) {
                $attribute->newInstance()->register([$object, $method->getName()]);
            }
        }

        return $object;
    }
}
