<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
    /**
     * stores current project if current request contains project_slug
     * @var afsProject
     */
    private $currentProject;

  public function setup()
  {
    // for compatibility / remove and enable only the plugins you want
    $this->enableAllPluginsExcept(array('sfDoctrinePlugin','sfPropelPlugin'));
    $this->dispatcher->connect('context.load_factories', array($this, 'configureProject'));
  }

  public function configureProject()
  {
      $context = sfContext::getInstance();
      if (!$context) {
          return;
      }

      $request = $context->getRequest();

      if (!$request) {
          return;
      }

//      $this->currentProject = afsProjectQuery::create()->findOneBySlug('seedcontrol');
//      return;

//      if ($request->hasParameter('project_slug')) {
//          $projectSlug = $request->getParameter('project_slug');
//          $this->currentProject = afsProjectQuery::create()->findOneBySlug($projectSlug);
//          if (!$this->currentProject) {
//              throw new Exception("Could not find project with slug: $projectSlug");
//          }
//      }
  }

  public function getCurrentProject()
  {
      return $this->currentProject;
  }
}
