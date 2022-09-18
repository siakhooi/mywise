<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************

  function _wise_table_gettableid($option){
      preg_match_all ('/^\|\|id\:(.*)$/m', $option, $m1);
      return $m1[1][0];
  }
  function _wise_table_getheading($option){
      preg_match_all ('/^\|\|heading\:(.*)$/m', $option, $m1);
      $m2=trim($m1[1][0]);
      $r=explode(',', $m2);
      
      if($r[0]=="") $r[0]=1;  // default row heading: 1
      if($r[1]=="") $r[1]=0;  // default col heading: 0
      return $r;
  }
  function _wise_table_getcolumnstyle($option){
      preg_match_all ('/^\|\|col-class\:(.*)$/m', $option, $m1);
      $m2=trim($m1[1][0]);
      $r=explode(',', $m2);
      global $WIKI_TAG_TABLE_COLUMN_USER_STYLE_PREFIX;
      foreach($r as $n=>$r1){
          if($r1<>"") $r[$n]=" $WIKI_TAG_TABLE_COLUMN_USER_STYLE_PREFIX-$r1";
      }
      return $r;
  }
  function wise_tag_table($matches){
    global $WIKI_TAG_TABLE_USER_STYLE_PREFIX;
      $m=$matches[0];

      //extract option    
    preg_match_all ('/^(\|\|.*[^\|]\n)+/m', $m, $m1);
    $option=$m1[0][0];
    
    //extract content
    $table_content= preg_replace ('/^(\|\|.*[^\|]\n)+/si','',$m);
    
    //find table id
    $table_id=_wise_table_gettableid($option);
    $uc="";
    if($table_id<>"") $uc=" $WIKI_TAG_TABLE_USER_STYLE_PREFIX-$table_id";
    
    //find heading
    $h1=_wise_table_getheading($option);
    $heading_row=$h1[0];
    $heading_col=$h1[1];
    
    //find column style
    $column_style=_wise_table_getcolumnstyle($option);
    
    preg_match_all ('/^\|(.*)\|$/mU', $table_content, $m1);
    $m2=$m1[1];
      $s="<TABLE class='wiki-wiki$uc'>"; 
    foreach($m2 as $n=>$table_line){
        $s.="<TR class='wiki-wiki$uc'>";
        $b=explode('|', $table_line);
        foreach($b as $m=>$table_cell){
            $t="TD"; 
            if($m<$heading_col || $n<$heading_row) $t="TH";
            $s.="<$t class='wiki-wiki$uc$column_style[$m]'>";
            $s.=$table_cell;
            $s.="</$t>";
        }
        $s.="</TR>";
    }
      $s.="<TABLE>";
      return $s;
  }
?>