<?php

namespace Fromholdio\ElementalGroup\Model;

use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementalArea;
use Fromholdio\ElementalMultiArea\Extensions\MultiElementalAreasExtension;

class ElementGroup extends BaseElement
{
    private static string $table_name = 'ElementalGroup';

    private static string $singular_name = 'Group';

    private static string $plural_name = 'Groups';

    private static bool $inline_editable = false;

    private static array $extensions = [
        MultiElementalAreasExtension::class
    ];

    private static array $has_one = [
        'Elements' => ElementalArea::class
    ];

    private static array $owns = [
        'Elements'
    ];

    private static array $cascade_deletes = [
        'Elements'
    ];

    private static array $cascade_duplicates = [
        'Elements'
    ];

    public function getIsElementEmpty(): bool
    {
        return ($this->getComponent('Elements')->Elements()->count() < 1);
    }

    public function getType()
    {
        return $this->i18n_singular_name();
    }
}
