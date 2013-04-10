<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WebUser extends CWebUser{
                    private $_user;
                    //is the user a superadmin ?
                    function getIsSuperAdmin(){
                     return ( $this->user && $this->user->role_id == User::LEVEL_SUPERADMIN );
                    }
                    //is the user an administrator ?
                    function getIsAdmin(){
                     return ( $this->user && $this->user->role_id == User::LEVEL_ADMIN );
                    }
                   
                    //is user a customer
                    function getIsCustomer()
                    {
                        
                        return ($this->user && $this->user->role_id==User::LEVEL_CUSTOMER);
                    }

                     //get the logged user
                     function getUser(){
                     if( $this->isGuest )
                      return;
                     if( $this->_user === null ){
                      $this->_user = User::model()->findByPk( $this->id );
                     }
                     return $this->_user;
                    }
                     
                    function getIpInfo(){
                        $ip = getenv("REMOTE_ADDR") ;
                        $content = @file_get_contents('http://api.hostip.info/?ip='.$ip);
                        if ($content != FALSE) {
                                $xml = new SimpleXmlElement($content);
                                $location['citystate'] = $xml->children('gml', TRUE)->featureMember->children('', TRUE)->Hostip->children('gml', TRUE)->name;
                                $location['country'] =  $xml->children('gml', TRUE)->featureMember->children('', TRUE)->Hostip->countryName;
                                $location['short_country'] =  $xml->children('gml', TRUE)->featureMember->children('', TRUE)->Hostip->countryAbbrev;
                                return $location;
                        }
                        else return false;
                    }
}
?>
