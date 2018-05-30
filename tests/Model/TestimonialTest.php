<?php

namespace Dynamic\Elements\Tests\Model;

use Dynamic\Elements\Model\Testimonial;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Security\Member;

/**
 * Class TestimonialTest
 * @package Dynamic\Elements\Tests\Model
 */
class TestimonialTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     * 
     */
    public function testProvidePermissions()
    {
        $this->assertTrue(is_array(Testimonial::singleton()->providePermissions()));
    }

    /**
     *
     */
    public function testCanCreate()
    {
        $this->assertTrue(Testimonial::singleton()->canCreate($this->objFromFixture(Member::class, 'site-owner')));
        $this->assertFalse(Testimonial::singleton()->canCreate(Member::singleton()));
    }

    /**
     *
     */
    public function testCanEdit()
    {
        $this->assertTrue($this->objFromFixture(Testimonial::class, 'one')->canEdit($this->objFromFixture(Member::class, 'site-owner')));
        $this->assertFalse($this->objFromFixture(Testimonial::class, 'one')->canEdit(Member::singleton()));
    }

    /**
     *
     */
    public function testCanDelete()
    {
        $this->assertTrue($this->objFromFixture(Testimonial::class, 'one')->canDelete($this->objFromFixture(Member::class, 'site-owner')));
        $this->assertFalse($this->objFromFixture(Testimonial::class, 'one')->canDelete(Member::singleton()));
    }

    /**
     *
     */
    public function testCanView()
    {
        $this->assertTrue($this->objFromFixture(Testimonial::class, 'one')->canView($this->objFromFixture(Member::class, 'site-owner')));
        $this->assertTrue($this->objFromFixture(Testimonial::class, 'one')->canView(Member::singleton()));
    }
}
