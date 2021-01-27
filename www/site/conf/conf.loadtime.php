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

  global $WISE_LOADTIME_SHOW;
  global $WISE_LOADTIME_PREFIX;
  global $WISE_LOADTIME_SUFFIX;
  global $WISE_LOADTIME_FORMAT;
  
  $WISE_LOADTIME_SHOW="Y";
  $WISE_LOADTIME_PREFIX="<DIV class='wise-loadtime'>This page was created in ";
  $WISE_LOADTIME_SUFFIX=" seconds.</DIV>";
  $WISE_LOADTIME_FORMAT='%4.5f';
?>