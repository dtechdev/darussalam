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
                        $ip = getenv("REMOTE_ADDR");
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
                    function getSiteSessions(){
                        
                        $siteUrl = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
                        $site_id = SelfSite::model()->getSiteId($siteUrl);
                        Yii::app()->session['site_id'] = $site_id;
                        
                        if(isset(Yii::app()->session['city_id']) && Yii::app()->session['city_id']!='')
                        {
                             $city_id=Yii::app()->session['city_id'];
                        }
                        else
                        {
                            $locationArray=Yii::app()->user->IpInfo;
                            $city_auto=  strtolower($locationArray['citystate']);
                            $country_auto=  strtolower($locationArray['country']);
                            $short_country_auto=  strtolower($locationArray['short_country']);

                            $cityfind = City::model()->find('LOWER(city_name)=?',array($city_auto));
                            if($cityfind!=null)
                            {
                                $city_id=$cityfind->city_id;
                            }
                            else
                            {
                                $countryfind = Country::model()->find('LOWER(country_name)=?',array($country_auto));
                                if($countryfind!=null)
                                {
                                    $city_find = City::model()->find('country_id=?',array($countryfind->country_id));
                                    $city_id=$city_find->city_id;
                                }
                                else
                                {
                                    $city_auto=Yii::app()->params->head_office_city;
                                    $cityfind = City::model()->find('LOWER(city_name)=?',array($city_auto));
                                    $city_id=$cityfind->city_id;
                                }
                            }

                        }
                        $city = City::model()->findByPk($city_id);
                        $countries = Country::model()->findByPk($city['country_id']);
                        $country_short_name=$countries['short_name'];
                        $city_short_name=$city['short_name'];

                        $layout_id = $city['layout_id'];
                        $layout = Layout::model()->findByPk($layout_id);
                        $layout_name = $layout['layout_name'];

                        Yii::app()->session['layout'] = $layout_name;
                        Yii::app()->session['country_short_name'] = $country_short_name;
                        Yii::app()->session['city_short_name'] = $city_short_name;
                        Yii::app()->session['city_id'] = $city['city_id'];
                        Yii::app()->theme = Yii::app()->session['layout'];
                        
                    }
}
?>
