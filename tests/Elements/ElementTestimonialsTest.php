<?php

namespace Dynamic\Elements\Tests\Elements;

use Dynamic\Elements\Elements\ElementTestimonials;
use Dynamic\Elements\Elements\TestimonialsElement;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\NumericField;
use SilverStripe\ORM\DataList;

/**
 * Class ElementTestimonialsTest
 * @package Dynamic\Elements\Tests\Elements
 */
class ElementTestimonialsTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testGetSummary()
    {
        $element = $this->objFromFixture(ElementTestimonials::class, 'one');
        $this->assertEquals('4 testimonials', $element->getSummary());
    }

    /**
     *
     */
    public function testGetType()
    {
        $element = $this->objFromFixture(ElementTestimonials::class, 'one');
        $this->assertEquals('Testimonials', $element->getType());
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $element = $this->objFromFixture(ElementTestimonials::class, 'one');
        $fields = $element->getCMSFields();
        $this->assertInstanceOf(HTMLEditorField::class, $fields->dataFieldByName('Content'));
        $this->assertInstanceOf(NumericField::class, $fields->dataFieldByName('Limit'));
    }

    /**
     *
     */
    public function testGetTestimonialsList()
    {
        $element = $this->objFromFixture(ElementTestimonials::class, 'one');
        $this->assertInstanceOf(DataList::class, $element->getTestimonialsList());

        $elementTwo = $this->objFromFixture(ElementTestimonials::class, 'two');
        $this->assertInstanceOf(DataList::class, $elementTwo->getTestimonialsList());

        $elementThree = $this->objFromFixture(ElementTestimonials::class, 'three');
        $this->assertInstanceOf(DataList::class, $elementThree->getTestimonialsList());

        $setOne = $element->getTestimonialsList();
        $setTwo = $elementTwo->getTestimonialsList();
        $setThree = $elementThree->getTestimonialsList();

        $this->assertEquals(4, $setOne->count());
        $this->assertEquals(1, $setTwo->count());
        $this->assertEquals(3, $setThree->count());
    }
}
