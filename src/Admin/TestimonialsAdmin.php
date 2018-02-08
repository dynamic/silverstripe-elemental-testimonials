<?php

namespace Dynamic\Elements\Admin;

use Dynamic\Elements\Model\Testimonial;
use Dynamic\Elements\Model\TestimonialCategory;
use SilverStripe\Admin\ModelAdmin;

/**
 * Class TestimonialsAdmin
 * @package Dynamic\Elements\Admin
 */
class TestimonialsAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = [
        Testimonial::class => [
            'title' => 'Testimonials',
        ],
        TestimonialCategory::class => [
            'title' => 'Testimonial Categories',
        ],
    ];

    /**
     * @var string
     */
    private static $url_segment = 'testimonials';

    /**
     * @var string
     */
    private static $menu_title = 'Testimonials';
}
