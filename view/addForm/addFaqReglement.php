<?php 
    $category = $result['data']['category'];
?>
<section class="add">
    <form action="index.php?ctrl=forum&action=FaqReglementBDD&id=<?= $category?>" method="post">
        <label for="">Donner le titre du topic : </label>
        <input type="text" name="title" class="in">


        <button value="submit" name="submit">Valider</button>
    </form>
</section>