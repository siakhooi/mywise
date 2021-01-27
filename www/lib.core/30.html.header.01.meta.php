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

  global $WISE_WEBSITE_META_DESCRIPTION; 
  global $WISE_WEBSITE_META_KEYWORDS; 
  if($WISE_WEBSITE_META_DESCRIPTION<>""){
?><META name="description" content="<?php echo $WISE_WEBSITE_META_DESCRIPTION; ?>" /><?PHP
  }
  if($WISE_WEBSITE_META_KEYWORDS<>""){ 
?><META name="keywords" content="<?php echo $WISE_WEBSITE_META_KEYWORDS; ?>" /><?PHP
  }
?>