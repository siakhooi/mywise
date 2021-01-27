<?PHP
// *****************************************************************************
// MyWISE - My Wiki Inside Site Engine
// Copyright (C) 2008 - 2010 GQR Solutions. All rights reserved.
// http://www.mywise.org
//
// Unless you have purchased a commercial license agreement from GQR Solutions,
// the following license terms apply:
//
// This program is part of MyWISE.
//
// MyWISE is released under the terms of the GNU Lesser General Public License 
// as published by the Free Software Foundation, either version 3 of the 
// License, or any later version.
//
// You should have received a copy of the GNU Lesser General Public License
// along with MyWISE.
// If not, see http://www.gnu.org/licenses/.
//
// *****************************************************************************

  global $WISE_URL_NAME_MODE;
  global $WISE_URL_NAME_GROUP;
  global $WISE_URL_NAME_TYPE;
  global $WISE_URL_NAME_PAGE;
  global $WISE_MODE;
  global $WISE_GROUP;
  global $WISE_TYPE;
  global $WISE_PAGE;
  global $WISE_DEFAULT_GROUP;
  global $WISE_DEFAULT_TYPE;
  global $WISE_DEFAULT_PAGE;
  global $WISE_DEFAULT_MODE;
  
	$WISE_MODE=$_GET[$WISE_URL_NAME_MODE];
	$WISE_GROUP=$_GET[$WISE_URL_NAME_GROUP];
	$WISE_TYPE=$_GET[$WISE_URL_NAME_TYPE];
	$WISE_PAGE=$_GET[$WISE_URL_NAME_PAGE];

	global $WISE_URL_DO_ENCODE;
	if($WISE_URL_DO_ENCODE=="Y"){
  	$WISE_GROUP=urldecode($WISE_GROUP);
  	$WISE_TYPE=urldecode($WISE_TYPE);
  	$WISE_PAGE=urldecode($WISE_PAGE);
	}
	
	if($WISE_GROUP=='') $WISE_GROUP=$WISE_DEFAULT_GROUP;
	if($WISE_TYPE=='')  $WISE_TYPE=$WISE_DEFAULT_TYPE;
	if($WISE_PAGE=='')  $WISE_PAGE=$WISE_DEFAULT_PAGE;
	if($WISE_MODE=='')  $WISE_MODE=$WISE_DEFAULT_MODE;
	
  if (get_magic_quotes_gpc()) {
	  $WISE_GROUP= stripslashes($WISE_GROUP);
	  $WISE_TYPE= stripslashes($WISE_TYPE);
    $WISE_PAGE= stripslashes($WISE_PAGE);
  }
?>