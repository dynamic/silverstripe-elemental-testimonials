<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementTestimonials;
use SilverStripe\ORM\DataObject;

/**
 * Class TestimonialCategory
 * @package Dynamic\Elements\Model
 *
 * @property string $Title
 */
class TestimonialCategory extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Testimonial Category';

    /**
     * @var string
     */
    private static $plural_name = 'Testimonial Categories';

    /**
     * @var string
     */
    private static $table_name = 'TestimonialCategory';

    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(255)',
    ];

    /**
     * @var array
     */
    private static $belongs_many_many = [
        'Testimonials' => Testimonial::class,
        'TestimonialElements' => ElementTestimonials::class,
    ];

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canCreate($member = null, $context = [])
    {
        return Testimonial::singleton()->canCreate($member, $context);
    }

    /**
     * @param null $member
     * @return bool
     */
    public function canEdit($member = null)
    {
        return Testimonial::singleton()->canEdit($member);
    }

    /**
     * @param null $member
     * @return bool
     */
    public function canDelete($member = null)
    {
        return Testimonial::singleton()->canDelete($member);
    }

    /**
     * @param null $member
     * @return bool
     */
    public function canView($member = null)
    {
        return true;
    }
}
