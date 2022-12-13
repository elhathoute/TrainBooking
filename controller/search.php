<?php
include_once '../modal/trainesModal.php';
if ((! empty($_POST["gared"]))) {
  
     $gared = "%{$_POST['gared']}%";
 
    $train = new TrainesModal();
    $result=$train->searchTrain($gared);
    $count=count($result);
        if($count>0){
         ?>
  <select  multiple="" class="form-select w-100" id="select-gare">
 <?php
         foreach ($result as $gare) {
             ?>
    <option  onClick="selectgare('<?php echo $gare["nom"]; ?>');">
    <?php  echo $gare["nom"]?>
     </option>
 <?php
         } // end for
         ?>
  </select>
 <?php
     } // end if count of gares sup a zero 
     else{
        echo ' <div
        
        data-gare='.$count.'
         class="text-danger"  id="suggesstion-gare-error">gare non exist!</div>';
        // echo 'no suggess';
     }

//gare arrivé
}     //end if not empty 

if ((!empty($_POST["garea"]))) {
    $garea = "%{$_POST['garea']}%";

    $train2 = new TrainesModal();
    $result2 = $train2->searchTrain($garea);
    $count2 = count($result2);
    if ($count2 > 0) {
 ?>
<select  multiple="" class="form-select w-100" id="select-gare2">
<?php
        foreach ($result2 as $gare) {
?>
<option  onClick="selectgare2('<?php echo $gare["nom"]; ?>');">
<?php echo $gare["nom"] ?>
</option>
<?php
        } // end for
?>
</select>
<?php
    } // end if count of gares sup a zero 
    else {
        echo ' <div
   
   data-gare2=' . $count2 . '
    class="text-danger"  id="suggesstion-gare-error2">gare non exist!</div>';
        // echo 'no suggess';
    }
}





?>