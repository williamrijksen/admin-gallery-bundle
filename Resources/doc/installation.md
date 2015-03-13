# Installation in 5 simple steps

## 1. Download Gallery Bundle and Admin Gallery Bundle

Add to composer.json

```
"require": {
    "fsi/admin-gallery-bundle": "1.1.*@dev"
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
        new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
        new Ivory\CKEditorBundle\IvoryCKEditorBundle(),

        // FSiGalleryBundle
        new FSi\Bundle\GalleryBundle\FSiGalleryBundle(),
        new FSi\Bundle\AdminGalleryBundle\FSiAdminGalleryBundle(),
    );
}
```

## 3. Install FSiGalleryBundle

[FSiGallerBundle - Installation](https://github.com/fsi-open/gallery-bundle/blob/master/Resources/doc/installation.md)

## 4. Add the bundle to the admin_menu.yml

Since the bundle now uses FSiAdminBundle 1.1, you need to add it to the menu configuration
file (```app\config\admin_menu.yml```):

```
    menu:
        - { id: gallery, name: admin.gallery.menu }
```

Where ```id``` is the id of the admin element, and ```name``` is the translation key.
