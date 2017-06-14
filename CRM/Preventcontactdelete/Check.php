<?php
/**
 *
 *
 *
 * @author Klaas Eikelbooml (CiviCooP) <klaas.eikelboom@civicoop.org>
 * @date 14-6-17 17:58
 * @license AGPL-3.0
 *
 */
class CRM_Preventcontactdelete_Check {

  public static function hasRecentContribution($contactId){
    $sql= "select count(id) from civicrm_contribution
           where date_add(receive_date,interval 7 YEAR) > current_date() 
           and contact_id = %1";
    $count = CRM_Core_DAO::singleValueQuery($sql,array('1'=>array($contactId,'Integer')));
    if($count>0){
       return true;
    } else {
       return false;
    }
  }
}