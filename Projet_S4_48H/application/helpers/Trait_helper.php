<?php defined('BASEPATH') OR exit('No direct script access allowed');
//function which treats the words
public function traitWord ($word){
    $word=trim($word);
    //Remplacement des lettres invalide
    $word = strtr($word,  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

     // Remplacement des -@#$$%^&*&*(())
    $word = preg_replace('/([^.a-z0-9]+)/i', '-', $word);
    return $word;

 }
 
//  function which treats the number
 public function traitNumber($num,$champ){
    if(empty($num)){
        return "The ".$champ." should be completed";
    }
    if(!is_numeric($num)){
        return "The ".$champ." should not contains a letter";
    }
    else if(intval($num) < 0){
        return "The ".$champ." shouldn't be negative";
    }
    return intval($num);

 }


?>