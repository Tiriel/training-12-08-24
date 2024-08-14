<?php

namespace User;

use App\Auth\Exception\AuthException;
use App\User\Member;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Member::class)]
class MemberTest extends TestCase
{
    public function testAuthReturnsTrueWithProperLoginAndPassword(): void
    {
        $member = new Member('Benjamin', 'abcd1234', 37, 'Ben');

        $this->assertTrue($member->auth('Benjamin', 'abcd1234'));
        unset($member);
    }

    public function testAuthThrowsExceptionOnWrongLogin(): void
    {
        $this->expectException(AuthException::class);

        $member = new Member('Benjamin', 'abcd1234', 37, 'Ben');
        $member->auth('John', 'abcd1234');
        unset($member);
    }

    public function testAuthThrowsExceptionOnWrongPassword(): void
    {
        $this->expectException(AuthException::class);

        $member = new Member('Benjamin', 'abcd1234', 37, 'Ben');
        $member->auth('Benjamin', 'abcd4567');
        unset($member);
    }

    public function testCountReturns0ByDefault(): void
    {
        $this->assertSame(0, Member::count());
    }

    public function testCountIncrementsWithEachNewInstance(): void
    {
        $member = new Member('Benjamin', 'abcd1234', 37, 'Ben');

        $this->assertSame(1, Member::count());

        $member2 = new Member('John', 'abcd1234', 37, 'John');

        $this->assertSame(2, Member::count());
        unset($member);
        unset($member2);
    }

    public function testCountDecrementsWithEachObjectDestruction(): void
    {
        $member = new Member('Benjamin', 'abcd1234', 37, 'Ben');
        $member2 = new Member('John', 'abcd1234', 37, 'John');

        $this->assertSame(2, Member::count());

        unset($member2);

        $this->assertSame(1, Member::count());
        unset($member);
    }

    public function testToStringDisplaysUserName(): void
    {
        $member = new Member('Benjamin', 'abcd1234', 37, 'Ben');

        $this->assertSame('Member : Ben', (string) $member);
    }
}
