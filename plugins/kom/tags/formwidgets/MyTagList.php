<?php namespace Kom\Tags\FormWidgets;

use Backend\Formwidgets\TagList;

class MyTagList extends TagList {

  protected $defaultAlias = 'mytaglist';

  public function render()
  {
      $this->prepareVars();

      return $this->makePartial('mytaglist');
  }

  /**
   * Returns an array suitable for saving against a relation (array of keys).
   * This method also creates non-existent tags.
   * @return array
   */
  protected function hydrateRelationSaveValue($names)
  {
      if (!$names) {
          return $names;
      }

      $relationModel = $this->getRelationModel();
      $existingTags = $relationModel
          ->whereIn($this->nameFrom, $names)
          ->lists($this->nameFrom, $relationModel->getKeyName())
      ;

      $newTags = $this->customTags ? array_diff($names, $existingTags) : [];

      foreach ($newTags as $newTag) {
          // $newModel = $relationModel::create([$this->nameFrom => $newTag]);
          $newModel = $relationModel;
          $newModel->name = $newTag;
          $newModel->slug = str_slug($newTag, "-");
          $newModel->save();
          $existingTags[$newModel->getKey()] = $newTag;
      }

      return array_keys($existingTags);
  }


}
