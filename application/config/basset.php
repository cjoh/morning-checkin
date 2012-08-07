<?php 

return array(
  'compression' => array(
  /**
   * Compression
   *
   * Globally enable compression for all assets, this is only recommended once an application
   * is live and when used in conjunction with caching.
   */
  'enabled' => true,

  /**
   * Preserve Lines
   *
   * When compressing CSS files you may experience problems with extremely large files. You can
   * enable preserving of lines to maintain the occasional line break to split the file up
   * instead of one long continuous line.
   */
  'preserve_lines' => false
),

'caching' => array(
  /**
   * Caching
   *
   * Globally enable caching for all assets, this is only recommended once an application
   * is live.
   */
  'enabled' => true,

  /**
   * Time
   *
   * The time in minutes to cache the assets for. By default it is set to one month, or 44640
   * minutes.
   */
  'time' => 44640,
),

);