<?php
include_once "classDatabase.php";
require_once 'classOrderedMaterial.php';
include_once "classContent.php";

session_start();
 
class OrderedMaterialView
{
     public static function SelectAll()
	{
        
            include_once "header.php";
            $Result=OrderedMaterial::SelectAll();
           
    

            echo '<div id="x2">
            <form  class="form-valide"  method="post"   id="form" name="myForm">
            <div id="div_ctrl2">
            <label for="user" class="label" style="margin-left: 80%;font-size:20px;color:black;padding:10px;">اختار اللازمة<span class="text-danger">*</label>
            <select name="CurrentOptions2" id="CurrentOptions2ID" style="margin-left: 80%;width:170px;" > 
           <option value="0"   >    دوس علي السهم علشان تختار  </option> ';
      
      for($k=0;$k<count($Result);$k++)
      {
        $x=$Result[$k];
        $Result1=MaterialAvailable::SelectName($x);
      echo '<option value="'.$Result1->Name.'">'.$Result1->Name.'</option> ';
//$_SESSION['Name']=$Result1->Name;
      }  
      echo'</select> 
      </div>';
      $cont3=Content::Button(50,"save");
      echo'
 <input type="submit"  style="margin-right: 100px;"  id="AddingNewOptionsID"  name="save"    value="'.$cont3.'">        
</form>';
include_once "footer.php";
        }
         
   
}
