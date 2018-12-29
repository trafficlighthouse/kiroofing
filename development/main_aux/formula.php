<?php $ccurpage = $_GET['cp']; $TESTING = $_GET['TESTING']; $VER = $_GET['VER']; $tthm_dbtnHov = (isset($_GET['thm_dbtnHov']))? urldecode($_GET['thm_dbtnHov']) : '#b3d3ec'; $tthm_dbtnSel = (isset($_GET['thm_dbtnSel']))? urldecode($_GET['thm_dbtnSel']) : '#cbf0a6';  $hov = json_decode( base64_decode( str_replace(array('-','_','.'), array('+','/','='),$_GET['hov']) ), true); $ar_pathStr = array('Path1', 'Path2', 'Path3', 'Path4', 'Path5');  for($x=1;$x<6;$x++) { $s = (file_exists('snap/cp_txPath'.$x))? file_get_contents('snap/cp_txPath'.$x) : ""; if(!empty($s)) $ar_pathStr[$x-1] = $s; }  if($TESTING == 1) { $cf_button = '<link  href="../cssfiles/button.css"    rel="stylesheet" type="text/css" />'; $cf_accord = '<link  href="../cssfiles/accord.css" rel="stylesheet" type="text/css" />'; $jf_accord = '<script src="../jsfiles/accord.js"></script>'; $jq_acc1   = '<script src="../jsfiles/jquery/jquery.accordion.js"></script>'; $jq_acc2   = '<script src="../jsfiles/jquery/jquery-ui-1.8.custom.min.js"></script>'; $jq_acc3   = '<script src="../jsfiles/jquery/jquery-migrate-1.2.1.min.js"></script>'; $silk = '../cssfiles/'; } else { $cf_button = "<link rel=\"stylesheet\" href=\"css/mpc.button.$VER.min.css\" type=\"text/css\" />"; $cf_accord = "<link rel=\"stylesheet\" href=\"css/mpc.accord.$VER.min.css\" type=\"text/css\" />"; $jf_accord = "<script src=\"js/mpc.accord.$VER.min.js\"></script>"; $jq_acc1   = '<script src="js/jquery/jquery.accordion.js"></script>'; $jq_acc2   = '<script src="js/jquery/jquery-ui-1.8.custom.min.js"></script>'; $jq_acc3   = '<script src="js/jquery/jquery-migrate-1.2.1.min.js"></script>'; $silk = 'css/'; } ?> <!DOCTYPE html> <html> <head> <title>Formulas</title> <meta charset="utf-8"> <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>  <?php echo $cf_accord ?>  <?php echo $cf_button ?>  <?php echo $jf_accord ?>  <?php echo $jq_acc1 ?>  <?php echo $jq_acc2 ?>  <?php echo $jq_acc3 ?>  <script> function prevV() { parent.MpcCpanel.switchPrevPage('bv'); setAddBtn(); return true; } function nextV() { parent.MpcCpanel.switchNextPage('bv'); setAddBtn(); return true; } function setAddBtn() { n = parent.MpcCpanel.getCurPageVar(); jQuery('#bnAdd').html('Add Formula to Var'+n); }  function cboxClick(c) { var j = jQuery('#selCbox'+c);  var jtf = j.prop('checked'); jQuery('.cboxes').prop('checked', false); j.prop('checked', jtf); }  </script> <style type="text/css"> .compare { background-color:#FFFFF0;padding:0 2px; } .dia-status { font-size:12.8px; font-weight:normal; white-space:nowrap; padding: 0 5px 1px 5px; color:#000000 !important; background-color:pink; border-color:#808080; border-style:solid; border-width:1px; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; visibility:hidden; } .hover { cursor:default; } .hover:hover { text-decoration:underline; }  .noselect { -moz-user-select: -moz-none; -khtml-user-select: none; -webkit-user-select: none; } .selok:hover {background-color:<?php echo $tthm_dbtnHov ?>} .fsel, .fsel:hover {background-color:<?php echo $tthm_dbtnSel ?>} .bluelink {font-weight:bold;cursor:default;color:blue} .bluelink:hover {text-decoration:underline}  input#r_hyp input#r_und { margin:0 2px 0 0; padding:0; } .pnbox { padding:1px 5px; margin-bottom:2px; border:1px solid #AABBCC; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; } .pnbox:hover { background-color:#b3d3ec; } select#selState, select#selCity, select#selZip { border:1px solid #AABBCC; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; }    </style </head> <body>  <div class="dia-status" style="position:absolute;top:3px;left:6px;"></div> <div style="margin-top:24px;line-height:120%">  <div id="accordion" class="basic noselect" spellcheck="false" style="width:500px;margin:0 auto" onclick="hideDiaStatus();return true"> <!-- ================= Overview ================== --> <a alt=" " id="acc0">Overview</a> <div class="content"> <div class="inner"> Each line of the blueprint contains a unique <b>Url</b> as set by the 5 <b>Paths</b> and the Mpc files. Formulas create <b>Var</b> entries based upon these Urls. <p> Var list entries that do <b>not</b> begin with a <b>'[' bracket</b>, are <b>'simple phrases'</b>. When multiple phrases exist, Mpc will cycle through them <b>after</b> each page is created. Var entries beginning with a bracket will be considered one of the formulas as detailed below. </p>  Numerous formulas can be placed into the 9 Var spaces. The first formula that returns true will be used (top to bottom order).  All formulas (except RegExp) are case insensitive.  </div>   </div>    <!-- ================= [path] ==================== --> <a alt=" " id="acc1">1. Path Replaces Var</a> <div class="content"> <div class="inner"> <div class="fprompt">Select a <b>Path</b> (or <b>Custom</b> name) and click Add Formula. The contents of the <b>Path</b> will replace this <b>Var</b> in the blueprint.</div>  <div> <table class="table1"> <tr> <td><div class="tdv selok fsel" title="<?php echo $hov['path1'] ?>" onclick="pathSelect(this);return false;" id="f1path1"><?php echo $ar_pathStr[0] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path2'] ?>" onclick="pathSelect(this);return false;" id="f1path2"><?php echo $ar_pathStr[1] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path3'] ?>" onclick="pathSelect(this);return false;" id="f1path3"><?php echo $ar_pathStr[2] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path4'] ?>" onclick="pathSelect(this);return false;" id="f1path4"><?php echo $ar_pathStr[3] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path5'] ?>" onclick="pathSelect(this);return false;" id="f1path5"><?php echo $ar_pathStr[4] ?></div></td> </tr> </table> </div>  <div style="padding:0 5px;margin-top:12px;text-align:left"> Folder slashes at either end of <b>Path</b> entries are <b>NOT</b> included in the <b>Var</b> replacement. <br><br> Hover mouse over path buttons to see examples. </div>  </div> </div>  <!-- ================= [path=???] out ================ --> <a alt=" " id="acc2">2. Path Compare (outString replaces Var)</a> <div class="content"> <div class="inner"> <div class="fprompt">Select <b>Path</b> and <b>Comparison</b>. Enter <b>Search</b> and <b>Output</b> strings. If <b>Search</b> string compares with <b>Path</b>, the <b>Output</b> string  will replace this <b>Var</b>.</div>  <div style="margin:5px 0"> <table class="table1"> <tr> <td><div class="tdv selok fsel" title="<?php echo $hov['path1'] ?>" onclick="pathSelect(this);return false;" id="f2path1"><?php echo $ar_pathStr[0] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path2'] ?>" onclick="pathSelect(this);return false;" id="f2path2"><?php echo $ar_pathStr[1] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path3'] ?>" onclick="pathSelect(this);return false;" id="f2path3"><?php echo $ar_pathStr[2] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path4'] ?>" onclick="pathSelect(this);return false;" id="f2path4"><?php echo $ar_pathStr[3] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path5'] ?>" onclick="pathSelect(this);return false;" id="f2path5"><?php echo $ar_pathStr[4] ?></div></td> </tr> </table> </div>  <div style="margin:6px 20px 0 5px"> <table class="table1"> <tr> <td><div class="tdc selok fsel" onclick="divSelect(this,3);return false;" id="f2cmp1">Equal</div></td> <td><div class="tdc selok" onclick="divSelect(this,3);return false;" id="f2cmp2">Not Equal</div></td> <td><div class="tdc selok" onclick="divSelect(this,3);return false;" id="f2cmp3">Contains</div></td> <td style="width:90%;text-align:right;padding-right:4px">Search</td> <td><input type="text" class="tds" id="f2search"/></td> </tr> </table> </div>  <div style="margin:4px 10px 0 5px"> <table class="table1"> <tr> <td><div style="padding-right:4px;margin-top:4px">Output</div></td> <td><div style="margin-top:4px"><input type="text" class="tdo" id="f2out"/></div></td> <td style="width:90%">&nbsp;</td> </tr> </table> </div>  <div style="padding:0 5px;margin-top:8px;text-align:left"> Folder slashes at either end of <b>Path</b> entries are <b>NOT</b> used in comparisons. </div>  </div> </div>   <!-- ================= Url [=???] out ============= --> <a alt=" " id="acc3">3. Url Compare (outString replaces Var)</a> <div class="content"> <div class="inner">  <div class="fprompt">Select a <b>Comparison</b>, enter <b>Search</b> and <b>Output</b> strings. If <b>Search</b> string compares with <b>Url</b>, the <b>Output</b> string will replace this <b>Var</b>.</div>  <div> <table class="table1"> <tr> <td><div class="tdc selok fsel" onclick="divSelect(this,3);return false;" id="f3cmp1">Equal</div></td> <td><div class="tdc selok" onclick="divSelect(this,3);return false;" id="f3cmp2">Not Equal</div></td> <td><div class="tdc selok" onclick="divSelect(this,3);return false;" id="f3cmp3">Contains</div></td> </tr> </table> </div>  <div style="margin:8px 10px 0 5px"> <table class="table1"> <tr> <td style="padding-right:4px">Search</td> <td><input type="text" class="tds" id="f3search"/></td> <td style="width:90%">&nbsp;</td> </tr> <tr> <td><div style="padding-right:4px;margin-top:4px">Output</div></td> <td><div style="margin-top:4px"><input type="text" class="tdo" id="f3out"/></div></td> <td style="width:90%">&nbsp;</td> </tr> </table> </div>  <div style="padding:0 5px;margin-top:12px;text-align:left"> <span class="hover" title="<?php echo $hov['firsturl'] ?>"><b>Hover mouse here to see a Url example</b></span> </div>  </div>   </div>    <!-- ================= Full Url/DestFile [=???] out ================== --> <a alt=" " id="acc4">4. Url/DestFile Compare (outString replaces Var)</a> <div class="content"> <div class="inner">  <div class="fprompt">Select a <b>Comparison</b>, enter <b>Search</b> and <b>Output</b> strings. If <b>Search</b> compares with Full <b>Url/DestFile</b>, the <b>Output</b> string will replace this <b>Var</b>.</div>  <div> <table class="table1"> <tr> <td><div class="tdc selok fsel" onclick="divSelect(this,3);return false;" id="f4cmp1">Equal</div></td> <td><div class="tdc selok" onclick="divSelect(this,3);return false;" id="f4cmp2">Not Equal</div></td> <td><div class="tdc selok" onclick="divSelect(this,3);return false;" id="f4cmp3">Contains</div></td> </tr> </table> </div>  <div style="margin:8px 10px 0 5px"> <table class="table1"> <tr> <td style="padding-right:4px">Search</td> <td><input type="text" class="tds" id="f4search"/></td> <td style="width:90%">&nbsp;</td> </tr> <tr> <td><div style="padding-right:4px;margin-top:4px">Output</div></td> <td><div style="margin-top:4px"><input type="text" class="tdo" id="f4out"/></div></td> <td style="width:90%">&nbsp;</td> </tr> </table> </div>  <div style="padding:0 5px;margin-top:12px;text-align:left"> <span class="hover" title="<?php echo $hov['firsturl'].$hov['firstdest'] ?>"><b>Hover mouse here to see a Url/DestFile example</b></span> </div>  </div> </div>   <!-- ================= [url/dest=/regex/] matchout ============== --> <a alt=" " id="acc5">5. Url/DestFile Regular Expression (matchOutput replaces Var)</a> <div class="content"> <div class="inner">  <div class="fprompt">Enter a <b>Regex</b> pattern to match the combined <b>Paths and DestFile</b> as-is in the list boxes. If a match is found, the <b>Output</b> will replace the <b>Var</b>. The pattern <b>must</b> be surrounded by slashes. The Url/Dest is provided with <b>spaces</b> and <b>letter case</b> intact.</div>  <div style="margin:8px 10px 0 5px"> <table class="table1"> <tr> <td style="padding-right:4px">Pattern</td> <td><input type="text" class="tdx" id="f5pattern"/></td> <td style="width:90%">&nbsp;</td> </tr> <tr> <td><div style="padding-right:4px;margin-top:4px">Output</div></td> <td><div style="margin-top:4px"><input type="text" class="tdo" id="f5out"/></div></td> <td style="width:90%">&nbsp;</td> </tr> </table> </div>  <div style="padding:0 5px;margin-top:12px;text-align:left"> <span class="hover" title="<?php echo $hov['asisurl'].$hov['firstdest'] ?>"><b>Hover mouse here to see a Url/DestFile example</b></span>  <div style="padding-top:8px;text-align:left"><b>Using this advanced formula is explained in the </b><span class="bluelink" onclick="window.open('https://masspagecreator.com/forum/topic/6/using-regular-expressions-in-mpc-formulas/');return false">F.A.Q. section of our Support Forum</span> </div> </div>  </div>   </div>     <!-- ================= [aligned items] regex out ============== --> <a alt=" " id="acc6">6. Aligned Items in a Path (one item replaces Var)</a> <div class="content"> <div class="inner">  <div class="fprompt">Enter aligned items in a <b>single</b> Path listbox. For example: <b>city<span style="color:#ff0000">-</span>state</b> or <b>city<span style="color:#ff0000">/</span>state</b><br> This section will create a formula to set a Var to any of these aligned items. </div>  <div style="margin-top:5px"> <table class="table1"> <tr> <td><div class="tdv selok fsel" title="<?php echo $hov['path1'] ?>" onclick="pathSelect(this);return false;" id="f6path1"><?php echo $ar_pathStr[0] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path2'] ?>" onclick="pathSelect(this);return false;" id="f6path2"><?php echo $ar_pathStr[1] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path3'] ?>" onclick="pathSelect(this);return false;" id="f6path3"><?php echo $ar_pathStr[2] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path4'] ?>" onclick="pathSelect(this);return false;" id="f6path4"><?php echo $ar_pathStr[3] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path5'] ?>" onclick="pathSelect(this);return false;" id="f6path5"><?php echo $ar_pathStr[4] ?></div></td> </tr> </table> </div>   <div style="margin:10px 20px 0 5px"> <table class="table1"> <tr> <td><div class="pnbox" onclick="pnboxPrev();return false;"><img src="<?php echo $silk ?>silk/blue_prev.png"></div></td> <td><div style="margin:0 4px;font-size:1.1em" id="f6item">1</div></td> <td><div class="pnbox" onclick="pnboxNext();return false;"><img src="<?php echo $silk ?>silk/blue_next.png"></div></td> <td><div style="width:20px"></div></td> <td>&nbsp;</td> <td style="text-align:center" class="tdk"><div><input type="checkbox" id="cbDash"></div></td> <td style="text-align:center" class="tdk"><div><input type="checkbox" id="cbUnderscore"></div></td> <td style="text-align:center" class="tdk"><div><input type="checkbox" id="cbFolders" checked></div></td> <td style="text-align:center" class="tdk"><div><input type="checkbox" id="cbSpace"</div></td> </tr>  <tr> <td colspan="3" style="text-align:center"><b>Selected Item</b></td> <td>&nbsp;</td> <td style=""><b>Separator:</b></td> <td style="text-align:center"><label for="cbDash"><b>&nbsp;&nbsp;Dash&nbsp;&nbsp;</b></label></td> <td style="text-align:center"><label for="cbUnderscore"><b>&nbsp;&nbsp;Underscore&nbsp;&nbsp;</b></label></td> <td style="text-align:center"><label for="cbFolders"><b>&nbsp;&nbsp;Folder&nbsp;&nbsp;</b></label></td> <td style="text-align:center"><label for="cbSpace"><b>&nbsp;&nbsp;Space&nbsp;&nbsp;</b></label></td> </tr> </table> </div>   <div style="padding-top:20px;text-align:center"><b>Aligned Items are explained in the </b><span class="bluelink" onclick="window.open('https://masspagecreator.com/links.php?go=alignedItems');return false">F.A.Q. section of our Support Forum</span></div>  </div>   </div>     <!-- ================= var = function(path) ============== --> <a alt=" " id="acc7">7. Function(path) replaces Var</a> <div class="content"> <div class="inner">  <div class="fprompt">Select a <b>Path</b> for input to a <b>Function</b>. The output of the <b>Function</b> will replace this <b>Var</b> in the blueprint.<br> </div>  <div style="margin-top:5px"> <table class="table1"> <tr> <td><div class="tdv selok fsel" title="<?php echo $hov['path1'] ?>" onclick="pathSelect(this);return false;" id="f7path1"><?php echo $ar_pathStr[0] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path2'] ?>" onclick="pathSelect(this);return false;" id="f7path2"><?php echo $ar_pathStr[1] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path3'] ?>" onclick="pathSelect(this);return false;" id="f7path3"><?php echo $ar_pathStr[2] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path4'] ?>" onclick="pathSelect(this);return false;" id="f7path4"><?php echo $ar_pathStr[3] ?></div></td> <td><div class="tdv selok" title="<?php echo $hov['path5'] ?>" onclick="pathSelect(this);return false;" id="f7path5"><?php echo $ar_pathStr[4] ?></div></td> </tr> </table> </div>   <div style="margin:10px 20px 0 5px"> <table class="table1">  <tr> <td style="margin:0"><div><input id="abbrev" type="radio" name="func7" value="us_state_abbreviation" checked="checked" title="Toggle between U.S. State and 2-letter abbreviation"></div></td> <td style="text-align:left"><label for="abbrev" title="Toggle between U.S. State and 2-letter abbreviation"><b>U.S. State abbreviation toggle</b></label></td> </tr>  </table> </div>  </div>   </div>     <!-- ================= var = function(state, city) ============== --> <a alt=" " id="acc8">8. Function(state, city) replaces Var</a> <?php $ar_state = array( 'alabama','alaska','arizona','arkansas','california','colorado','connecticut','delaware','florida','georgia', 'hawaii','idaho','illinois','indiana','iowa','kansas','kentucky','louisiana','maine','maryland', 'massachusetts','michigan','minnesota','mississippi','missouri','montana','nebraska','nevada','new hampshire','new jersey', 'new mexico','new york','north carolina','north dakota','ohio','oklahoma','oregon','pennsylvania','rhode island','south carolina', 'south dakota','tennessee','texas','utah','vermont','virginia','washington','west virginia','wisconsin','wyoming' ); ?> <div class="content"> <div class="inner">  <div class="fprompt">Select <b>State and City Paths</b> for input to a <b>Function</b>. Output of the <b>Function</b> replaces <b>Var</b>. Multiple outputs can optionally be returned as spintax. <span style="font-weight:bold">&nbsp;State can be a fixed value (no Path required).&nbsp;</span> <br> </div>  <div style="margin-top:5px"> <table style="width:100%" class="table1"> <tr style="white-space:nowrap"> <!-- state selector --> <td style="width:10px"><div style="width:10px"></div></td> <td style="width:20px">State&nbsp;</td> <td style="width:100px"><select id="selState" class="sel sels" size="1"><option value="--" selected>-- select --</option> <?php for($x=1;$x<6;$x++) { echo '<option value="'.$ar_pathStr[$x-1].'">'.$ar_pathStr[$x-1].'</option>'; } for($x=0;$x<50;$x++) { echo '<option value="'.$ar_state[$x].'!">'.$ar_state[$x].'</option>'; }?> </select> </td>  <td style="width:20px"><div style="width:20px"></div></td>  <!-- city selector --> <td style="width:10px">City&nbsp;</td> <td style="text-align:left"><select id="selCity" class="sel selc" size="1"><option value="--" selected>-- select --</option> <?php for($x=1;$x<6;$x++) { echo '<option value="'.$ar_pathStr[$x-1].'">'.$ar_pathStr[$x-1].'</option>'; }?> </select> </td>  <td><div style="width:20px"></div></td> <td colspan="2"></td> </tr>  <tr><td colspan="9"><div style="margin:10px 0 0"></div></td></tr>  <tr> <!-- U.S. Zipcodes --> <td colspan="9"> <table class="table1"> <tr> <td style="margin:0"><div><input id="zipcode" type="radio" name="func8" value="us_zipcode" checked="checked" title="Input U.S. State and City. Outputs Zipcode"></div></td> <td style="text-align:left"><label for="zipcode" title="Input U.S. State and City. Outputs Zipcode"><b>U.S. Zipcodes</b></label></td>  <td style="text-align:left"> <div style="margin-left:10px"> <select id="selZip" size="1"> <option value="0">single zip</option> <option value="1">{spintax}</option> <option value="2">zip,zip,zip</option> <option value="3">zip, zip, zip</option> </select> </div> </td> </tr> </table> </td> </tr>  <tr><td colspan="9"><div style="height:8px"></div></td></tr>  <tr> <td colspan="9" style="text-align:center;font-size:14px;padding:6px 0 2px;background-color:yellow"> These zipcodes are supplied for the built-in city lists <b>ONLY</b>. </td> </tr>  <tr> <td colspan="9" style="text-align:center;font-size:14px;padding:2px 0 6px;background-color:yellow"> This function is <b>NOT</b> meant to supply codes for the 'Nearby cities' feature. </td> </tr>   </table> </div>  <!-- <div style="margin:10px 20px 0 5px"> <table class="table1">  <tr> <td style="margin:0"><div><input id="zipcode" type="radio" name="func8" value="us_zipcode" checked="checked" title="Input U.S. State and City. Outputs Zipcode"></div></td> <td style="text-align:left"><label for="zipcode" title="Input U.S. State and City. Outputs Zipcode"><b>U.S. Zipcodes</b></label></td> </tr>  </table> </div> --> </div>   </div>     </div>  <!-- End accordion --> <div style="margin-top:16px;padding:0 20px;text-align:center;"> <table style="width:100%"> <tr> <td> <button class="sexybutton" title="Place formula into Var listbox." onclick="putFormula();return false;"><span><span> <span id="bnAdd" class="add">Add Formula to Var<?php echo $ccurpage ?></span></span></span></button> </td> <td> <button class="sexybutton sexyicononly" title="Target Previous Var" onclick="hideDiaStatusK(event);prevV();return false;"> <span><span><span class="prev">&nbsp;</span></span></span></button> </td> <td> <button class="sexybutton sexyicononly" title="Target Next Var" onclick="hideDiaStatusK(event);nextV();return false;"> <span><span><span class="next">&nbsp;</span></span></span></button> </td> <td> <button class="sexybutton" title="Remove last entry in the Var list." onclick="hideDiaStatusK(event);parent.MpcCpanel.popVarbox();return false;"> <span><span><span class="delete">Remove Last</span></span></span></button> </td> <td> <button class="sexybutton" title="Close Formula Creator dialog." onclick="parent.Shadowbox.close();return false;"><span><span> <span class="accept">Close</span></span></span></button> </td> </tr> </table> </div> </div> </body> </html>