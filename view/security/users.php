<?php
    $users = $result['data']['users'];
    $i=1;
?>
<section class="users">
    <?php
    foreach ($users as $user) {
        ?> <p><?=$user?> - <?= $user->getRole() ?> <?php 
        if ($i != 1){
            if($user->getRole()=='admin'){
            ?><a href="index.php?ctrl=home&action=changeRoleAdminToUser&id=<?=$user->getId()?>"><button > Changer le role</button></a> </p> <?php
            } else {
                ?> <a href="index.php?ctrl=home&action=changeRoleUserToAdmin&id=<?=$user->getId()?>"><button > Changer le role</button></a> </p> <?php 
            }
        }
        $i++;
    }
    ?>

</section>