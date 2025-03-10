<section class="add">
    <?php
        $book = $result['data']['book']; 
        $categories_book = $result['data']['cb']; ?>
    <form action="index.php?ctrl=forum&action=topicBookBDD&id=<?= $book->getId()?>" method="post">
        
        <h2>Livre choisi : <?= $book->getTitle() ?></h2>

        <select name="category" id=""  class="in">
                <option value="default">Choissisiez la catégorie du topic :</option>
                <?php foreach( $categories_book as $category_book){ ?>
                        <option name="<?= $category_book->getCategory()->getId() ?>" value="<?= $category_book->getCategory()->getId() ?>"> <?= $category_book->getCategory()->getTypeCategory()?> </option>
                <?php } ?>
            </select>
        <label for="">Titre du post : </label> 
        <input type="text" name="title" class="in">
        
        <label for="">Message du post : </label> 
        <textarea name="first_post" id=""value="premier message"></textarea>
        <!-- <input type="text" name="first_post"> -->

        <button value="submit" name="submit">Valider </button> <br>
    </form>
</section>