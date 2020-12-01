<?php 
include '../inc/head.inc.php'; 
include '../inc/header.inc.php'; ?>
<main>
    <a href="../public/index.php?page=NewFriend" class="btn btn-info active" style="float:right; margin-right:40px">Ajouter de nouveaux amis</a><br><br>
    <form class="form-inline" method="POST">
    <input name="recherche" class="form-control mr-sm-0" type="search" placeholder="Rechercher" aria-label="Search" >
        
        <button name="button" class="btn btn-outline-success my-2 my-sm-0 active" type="submit">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
            </svg>
        </button>
    </form>
    <br><br>
    <h2>Mes amis</h2>
    <br>
    <table>
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Statut</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($var[1] as $friendA):
            ?>
            <tr>
                <td name="pseudo"> <?=$friendA['pseudo']?> </td>
<<<<<<< HEAD
                <td><?php echo $co ?></td>
                <td><button name="deleteA"> <a href="index.php?page=friend&id=<?= $friendA['id'] ?>" > Supprimer</a></button></td>            
=======
                <td><?php echo 'connecté' // $co ?></td>
                <td><button name="deleteA" > <a href="index.php?page=friend&id=<?= $friendA['id'] ?>" > Supprimer</a></button></td>            
>>>>>>> 8f4e40fb16fda84d74a53b499d490b59abeff7f3
            </tr>
            <?php 
             endforeach;
              foreach($var[2] as $friendB):
            ?>
            <tr>
                <td name="pseudo"> <?=$friendB['pseudo']?> </td>
                <td><?php echo 'connecté' // $co ?></td>
                <td><button name="deleteB" > <a href="index.php?page=friend&id=<?= $friendB['id'] ?>"> Supprimer</a></button></td>            
            </tr>
            <?php 
             endforeach ;?>
        </tbody>
    </table>
</main>
<?php include '../inc/footer.inc.php' ?>