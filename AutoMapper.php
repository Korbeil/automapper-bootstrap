<?php

namespace Korbeil\AutoMapperBootstrap;

use Jane\Component\AutoMapper\AutoMapper as BaseAutoMapper;
use Doctrine\Common\Annotations\AnnotationReader;
use Jane\Component\AutoMapper\AutoMapperInterface;
use Jane\Component\AutoMapper\Generator\Generator;
use Jane\Component\AutoMapper\Loader\FileLoader;
use PhpParser\ParserFactory;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;

final class AutoMapper extends BaseAutoMapper
{
    public static function bootstrap(string $cacheDir): AutoMapperInterface
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $loader = new FileLoader(new Generator(
            (new ParserFactory())->create(ParserFactory::PREFER_PHP7),
            new ClassDiscriminatorFromClassMetadata($classMetadataFactory)
        ), $cacheDir);

        return self::create(true, $loader);
    }
}
