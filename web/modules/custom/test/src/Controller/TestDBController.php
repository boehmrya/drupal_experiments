<?php

namespace Drupal\test\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Defines HelloController class.
 */
class TestDBController extends ControllerBase {

  $query = \Drupal::entityQuery('node');
  $query->condition('status', 1);
  $query->condition('type', 'artice');
  $article_list = $query->execute();
  dpm($article_list);

  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello, Good Bye!'),
    ];
  }

}
