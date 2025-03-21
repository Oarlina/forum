<section class="add">
    <?php
        $books = $result['data']['books'];
        $category = $result['data']['category']; ?>
    <form action="index.php?ctrl=forum&action=addTopicBDD&id=<?= $category->getId() ?>" method="post">
        
        <?php if( $books !=null ){?> 
            <select name="book" id=""  class="in">
                <option value="default">Choissisiez le livre du post :</option>
                <?php foreach( $books as $book){ ?>
                        <option name="book_id" value="<?= $book->getBook()->getId() ?>">
                             <?= $book->getBook()->getTitle()," - ", $book->getBook()->getAuthor() ?> 
                        </option>
                <?php } ?>
            </select>
            <?php }else { ?>
                <p><b>Aller dans blibliostar et ajouter le livre pour le post </b></p>
        <?php } ?>

        <label for="">Titre du post : </label> 
        <input type="text" name="title" class="in">
        
        <label for="">Message du post : </label> 
        <textarea name="first_post" id=""value="premier message"></textarea>
        <!-- <input type="text" name="first_post"> -->

        <button value="submit" name="submit">Valider </button> <br>
    </form>
</section>