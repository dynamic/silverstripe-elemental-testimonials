<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Model\Testimonial;
use Dynamic\Elements\Model\TestimonialCategory;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DB;
use SilverStripe\ORM\FieldType\DBField;

/**
 * Class ElementTestimonials
 * @package Dynamic\Elements\Elements
 *
 * @property int $Limit
 * @property string $Content
 */
class ElementTestimonials extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'vendor/dnadesign/silverstripe-elemental/images/base.svg';

    /**
     * @var string
     */
    private static $singular_name = 'Testimonials Element';

    /**
     * @var string
     */
    private static $plural_name = 'Testimonials Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementTestimonials';

    /**
     * @var array
     */
    private static $db = [
        'Limit' => 'Int',
        'Content' => 'HTMLText',
    ];

    /**
     * @var array
     */
    private static $many_many = [
        'TestimonialCategories' => TestimonialCategory::class,
    ];

    /**
     * @var array
     */
    private static $defaults = [
        'Limit' => 3,
    ];

    /**
     * @return DBHTMLText
     */
    public function ElementSummary()
    {
        return DBField::create_field('HTMLText', $this->Content)->Summary(20);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Testimonials');
    }

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->dataFieldByName('Content')
                ->setRows(8);

            $fields->dataFieldByName('Limit')
                ->setTitle('Testimonials to show');
        });

        return parent::getCMSFields();
    }

    /**
     * @return mixed
     */
    public function getTestimonialsList()
    {
        $random = DB::get_conn()->random();
        $testimonials = Testimonial::get();

        if ($this->TestimonialCategories()) {
            $testimonials = $testimonials->filterAny(['TestimonialCategories.ID' => $this->TestimonialCategories()->column()]);
        }

        return $testimonials->sort($random)->limit($this->Limit);
    }
}
