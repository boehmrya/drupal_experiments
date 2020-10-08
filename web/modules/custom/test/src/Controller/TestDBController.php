<?php

namespace Drupal\test\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Defines HelloController class.
 */
class TestDBController extends ControllerBase {

  /**
   * Get a list of articles.
   *
   * @return array
   *   Return array of articles.
   */
  public function getArticles() {
    $query = \Drupal::entityQuery('node');
    $query->condition('status', 1);
    $query->condition('type', 'article');
    $article_list = $query->execute();
    dpm($article_list);
    return $article_list;
  }


  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function content() {
    return [
      '#theme' => 'test_page',
      '#test_articles' => $this->getArticles(),
    ];
  }

}
