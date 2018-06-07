<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Model\Testimonial;
use Dynamic\Elements\Model\TestimonialCategory;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\ORM\DB;
use SilverStripe\ORM\FieldType\DBField;
use Symbiote\GridFieldExtensions\GridFieldAddExistingSearchButton;

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

            if ($this->exists()) {
                $config = $fields->dataFieldByName('TestimonialCategories')->getConfig();
                $config->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
                $config->addComponent(new GridFieldAddExistingSearchButton());
            }
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

        $categories = $this->TestimonialCategories();
        if ($categories->count() > 0) {
            $testimonials = $testimonials->filterAny(['TestimonialCategories.ID' => $categories->column()]);
        }

        $testimonials = $testimonials->sort($random);
        if (0 < $this->Limit) {
            $testimonials = $testimonials->limit($this->Limit);
        }

        return $testimonials;
    }
}
