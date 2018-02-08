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
}
