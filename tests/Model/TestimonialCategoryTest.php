<?php

namespace Dynamic\Elements\Tests\Model;

use Dynamic\Elements\Model\TestimonialCategory;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Security\Member;

/**
 * Class TestimonialCategoryTest
 * @package Dynamic\Elements\Tests\Model
 */
class TestimonialCategoryTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testCanCreate()
    {
        $this->assertTrue(TestimonialCategory::singleton()->canCreate($this->objFromFixture(Member::class, 'site-owner')));
        $this->assertFalse(TestimonialCategory::singleton()->canCreate(Member::singleton()));
    }

    /**
     *
     */
    public function testCanEdit()
    {
        $this->assertTrue($this->objFromFixture(TestimonialCategory::class, 'one')->canEdit($this->objFromFixture(Member::class, 'site-owner')));
        $this->assertFalse($this->objFromFixture(TestimonialCategory::class, 'one')->canEdit(Member::singleton()));
    }

    /**
     *
     */
    public function testCanDelete()
    {
        $this->assertTrue($this->objFromFixture(TestimonialCategory::class, 'one')->canDelete($this->objFromFixture(Member::class, 'site-owner')));
        $this->assertFalse($this->objFromFixture(TestimonialCategory::class, 'one')->canDelete(Member::singleton()));
    }

    /**
     *
     */
    public function testCanView()
    {
        $this->assertTrue($this->objFromFixture(TestimonialCategory::class, 'one')->canView($this->objFromFixture(Member::class, 'site-owner')));
        $this->assertTrue($this->objFromFixture(TestimonialCategory::class, 'one')->canView(Member::singleton()));
    }
}
