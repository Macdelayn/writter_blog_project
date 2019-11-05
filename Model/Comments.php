<?php

class Comments{
  private $_id;
  private $_content;
  private $_dateComment;
  private $_idParent;
  private $_userId;
  private $_articleId;

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

    public function content(){
      return $this->_content;
    } 

    public function dateComment(){
    $date = new \DateTime($this->dateComment);
    return $date->format('d-m-Y à H:i');
    }

    public function idParent(){
      return $this->_idParent;
    }

    public function userId(){
      return $this->_userId;
    }

    public function articleId(){
      return $this->_articleId;
    }

    //setters
    public function setId($id){
      $id = (int) $id;
    
      if ($id > 0)
      {
          $this->_id = $id;
      }
    }

    public function setContent($content){
    if (is_string($content)) {
      $this->content = $content;
    }
    return $this;
    }

    public function setDateComment($dateComment){
    $this->dateComment = $dateComment;
    return $this;
    }

    public function setIdParent($idParent){
    $idParent = (int)$idParent;
    if ($idParent >= 0) {
      $this->idParent = $idParent;
    }
    return $this;
    }

    public function setUserId($userId){
      $userId = (int)$userId;
        if ($userId > 0){
          $this->userId = $userId;
        }
      return $this;  
    }

    public function setArticleId($articleId){
    $articleId=(int)$articleId;
    if ($articleId > 0) {
      $this->articleId=$articleId;
    }
    return $this;     
    }   
}
