<?php

require_once 'preventcontactdelete.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function preventcontactdelete_civicrm_config(&$config) {
  _preventcontactdelete_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function preventcontactdelete_civicrm_xmlMenu(&$files) {
  _preventcontactdelete_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function preventcontactdelete_civicrm_install() {
  _preventcontactdelete_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function preventcontactdelete_civicrm_postInstall() {
  _preventcontactdelete_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function preventcontactdelete_civicrm_uninstall() {
  _preventcontactdelete_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function preventcontactdelete_civicrm_enable() {
  _preventcontactdelete_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function preventcontactdelete_civicrm_disable() {
  _preventcontactdelete_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function preventcontactdelete_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _preventcontactdelete_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function preventcontactdelete_civicrm_managed(&$entities) {
  _preventcontactdelete_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function preventcontactdelete_civicrm_caseTypes(&$caseTypes) {
  _preventcontactdelete_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function preventcontactdelete_civicrm_angularModules(&$angularModules) {
  _preventcontactdelete_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function preventcontactdelete_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _preventcontactdelete_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function preventcontactdelete_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function preventcontactdelete_civicrm_navigationMenu(&$menu) {
  _preventcontactdelete_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'nl.schreeuwomleven.preventcontactdelete')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _preventcontactdelete_civix_navigationMenu($menu);
} // */

/**
 * Implements hook_civicrm_pre().
 *
 * @link https://docs.civicrm.org/dev/en/master/hooks/hook_civicrm_pre/
 */
function preventcontactdelete_civicrm_pre($op, $objectName, $id, &$params) {
  if($objectName=='Individual'&&$op=='update'){
     if($params['is_deleted']&&CRM_Preventcontactdelete_Check::hasRecentContribution($id)) {
       throw new Exception("Delete of contact $id not allowed - it has recent contributions");
     }
  }
}
