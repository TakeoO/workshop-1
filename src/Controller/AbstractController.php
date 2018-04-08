<?php

namespace Workshop\Controller;


abstract class AbstractController
{
  /**
   * @var \Twig_Environment $view
   */
  private $view;

  /**
   * @param array $data
   * @return string
   */
  public function json(array $data = []): string
  {
    return json_encode($data);
  }


  /**
   * @param array $data
   * @param string $template
   */
  public function view(string $template = "", array $data = [])
  {
    if (strpos($template, ".phtml") === false)
      $template = $template . ".phtml";
    return $this->view->render($template, $data);
  }


  public function setView(\Twig_Environment $twig)
  {
    $this->view = $twig;
  }
}