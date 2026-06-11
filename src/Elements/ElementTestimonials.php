<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Model\Testimonial;
use Dynamic\Elements\Model\TestimonialCategory;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\ListboxField;
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
    private static $icon = 'font-icon-chat';

    /**
     * @var string
     */
    private static $singular_name = 'Testimonials';

    /**
     * @var string
     */
    private static $plural_name = 'Testimonials Blocks';

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
    public function getSummary()
    {
        if ($this->TestimonialCategories()->count() > 0) {
            $ct = 0;
            foreach ($this->TestimonialCategories() as $category) {
                $ct += $category->Testimonials()->count();
            }
            if ($ct == 1) {
                $label = ' testimonial';
            } else {
                $label = ' testimonials';
            }
            return DBField::create_field(
                'HTMLText',
                $ct . $label
            )->Summary(20);
        }
    }

    /**
     * @return array
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();
        return $blockSchema;
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
                ->setTitle('Number of testimonials to show');

            if ($this->exists()) {
                $fields->removeByName([
                    'TestimonialCategories'
                ]);

                $fields->addFieldToTab(
                    'Root.Main',
                    ListboxField::create(
                        'TestimonialCategories',
                        'Categories',
                        TestimonialCategory::get()->map()->toArray()
                    ),
                    'Limit'
                );
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

        $testimonials = $testimonials->orderBy($random);
        if (0 < $this->Limit) {
            $testimonials = $testimonials->limit($this->Limit);
        }

        return $testimonials;
    }
}
