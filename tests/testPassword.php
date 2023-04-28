<?php

namespace App\Tests\Controller;

use App\passwordChecker;
use PHPUnit\Framework\TestCase;

class testPassword extends TestCase{


    public function testPasswordValid(){
        $test1 = new passwordChecker('1234567891');
        $result1 = $test1->checkPassword();
        $this->assertTrue($result1);

    }

    public function testPasswordUnvalid(){
        $test2 = new passwordChecker('123456789');
        $result2 =$test2->checkPassword();
        $this->assertFalse($result2);
    }

}