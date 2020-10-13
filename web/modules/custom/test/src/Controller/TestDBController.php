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
    $entity_type = 'node';
    $query = \Drupal::entityQuery($entity_type);
    $query->condition('status', 1);
    $query->condition('type', 'article');
    $article_list = $query->execute();

    // build list of rendered articles
    $article_nodes = [];
    $view_mode = 'default';
    $view_builder = \Drupal::entityTypeManager()->getViewBuilder($entity_type);
    $storage = \Drupal::entityTypeManager()->getStorage($entity_type);
    foreach ($article_list as $nid) {
      $node = $storage->load($nid);
      $build = $view_builder->view($node, $view_mode);
      $output = render($build);
      array_push($article_nodes, $output);
    }

    return $article_nodes;
  }


  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function content() {
    return [
     '#theme' => 'my_template',
     '#test_var' => $this->getArticles(),
   ];
  }

}
