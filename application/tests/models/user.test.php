<?php

class UserTest extends PHPUnit_Framework_TestCase {

  protected $user;
  protected $team;

  protected function setUp()
  {
    $this->user = User::create(array('email' => 'example1@example.com'));
    $this->team = Team::create(array('name' => 'awesome team'));
    $this->team->users()->attach($this->user->id);
  }

  protected function tearDown()
  {
    $this->user->teams_in()->delete();
    $this->user->delete();
    $this->team->delete();
  }

  public function testUserTeamsRelation() {
    $this->assertEquals($this->user->id, $this->team->users()->first()->id);
    $this->assertEquals($this->team->id, $this->user->teams_in()->first()->id);
  }

  public function testGravatar() {
    $this->assertContains("gravatar", $this->user->gravatar());
    $this->assertContains("s=40", $this->user->gravatar());
    $this->assertContains("s=100", $this->user->gravatar(100));
  }

}