# Installation in 5 simple steps

## 1. Download Gallery Bundle and Admin Gallery Bundle

Add to composer.json

```
"require": {
    "fsi/gallery-bundle": "1.0.*@dev",
    "fsi/admin-gallery-bundle": "1.0.*@dev"
    "doctrine/doctrine-bundle": "~1.2@dev",
}
```

## 2. Register bundles

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // Bundles required by FSiGalleryBundle
        new Liip\ImagineBundle\LiipImagineBundle(),
        new Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),
        new FSi\Bundle\DoctrineExtensionsBundle\FSiDoctrineExtensionsBundle(),
        new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),

        // FSiGalleryBundle
        new FSi\Bundle\GalleryBundle\FSiGalleryBundle(),
        new FSi\Bundle\AdminGalleryBundle\FSiAdminGalleryBundle(),
    );
}
```

## 3. Install FSiGalleryBundle

[FSiGallerBundle - Installation](https://github.com/fsi-open/gallery-bundle/blob/master/Resources/doc/installation.md)