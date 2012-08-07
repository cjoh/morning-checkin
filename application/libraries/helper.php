<?php

Class Helper {
  public static function fullTitle($title = "") {
    if ($title == "") {
      return "MorningCheckIn";
    } else {
      return "$title | MorningCheckIn";
    }
  }
}
