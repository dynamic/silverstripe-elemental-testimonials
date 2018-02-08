<?php

namespace Dynamic\Elements\Model;

use SilverStripe\ORM\DataObject;

/**
 * Class Testimonial
 * @package Dynamic\Elements\Model
 *
 * @property string $Title
 * @property string $Content
 * @property string $Name
 * @property string $Position
 * @property string $Affiliation
 */
class Testimonial extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Testimonial';

    /**
     * @var string
     */
    private static $plural_name = 'Testimonials';

    /**
     * @var string
     */
    private static $table_name = 'Testimonial';

    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(255)',
        'Content' => 'Text',
        'Name' => 'Varchar(255)',
        'Position' => 'Varchar(255)',
        'Affiliation' => 'Varchar(255)',
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
    private static $field_labels = [
        'Title' => 'Title',
        'Content.Summary' => 'Testimonial',
        'Name' => 'Name',
    ];

    /**
     *
     * @var array
     */
    private static $summary_fields = [
        'Title',
        'Content.Summary',
        'Name'
    ];
}
