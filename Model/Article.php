<?php

class Article{

  private $_id;
  private $title;
  private $_content;
  private $_dateArticle;
  private $_adminId;

  public function hydrate(array $donnees){
      foreach ($donnees as $key => $value){
        $method = 'set'.ucfirst($key);
      
          if (method_exists($this, $method))
          {
            $this->$method($value);
          }
      }
    }

    //getters
    public function id(){
      return $this->_id;
    }

  public function getTitle(){
    return $this->title;
  }   

    public function content(){
      return $this->_content;
    }

    public function dateArticle(){
      return $this->_dateArticle;
    }

    public function adminId(){
      return $this->_adminId;
    }

    //setters

    public function setId($id){
      $id = (int) $id;
    
      if ($id > 0)
      {
          $this->_id = $id;
      }
    }
    
  public function setTitle($title){
    if (is_string($title) && strlen($title) <= 70) {
      $this->title = $title;
    }
    return $this;
      
  }

    public function setContent($content){
    $content = htmlspecialchars($content);
    if (is_string($content)) {
      $this->content = $content;
    }
    return $this;
      
    }

    public function setDateArticle($dateArticle){
    $this->dateArticle = $dateArticle;
    return $this;     
    }

    public function setAdminId($adminId){
      $adminId = (int) $adminId;

      if($adminId>0){
        $this->_adminId = $adminId;
      }
    }
}
