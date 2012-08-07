<?php

class CheckinTest extends PHPUnit_Framework_TestCase {

  protected $user;
  protected $checkin;

  protected function setUp()
  {
    $this->user = User::create(array('email' => 'example1@example.com'));
    $this->checkin = Checkin::create(array('user_id' => $this->user->id,
                                           'checkintext' => '## sdlfkjasdfl ## asdfkajsdflk flas'));

  }

  protected function tearDown()
  {
    $this->user->delete();
    $this->checkin->delete();
  }

  public function testCheckinUserRelation() {
    $this->assertEquals($this->checkin->user->id, $this->user->id);
  }

}