<?php
    include('selectionner-produit.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body ​>
  <main style="margin : 50px;">
    <form method="POST" action="insert.php">
        <?php foreach ($dbdata as $menu): ?>
            <div class="menu-item" style="text-align: center;">
                <h3 class="menu-item-contenu" style="text-align: center;" >
                        <?php echo $menu['nom'] ?>
                </h3>
                <p style="text-align: center;">
                <?php echo $menu['contenu'] ?>
                </p>
                <div class="container mt-5" style="width: 300px;">
                    <input type="number" placeholder="0" min="0" max="1000" step="1" data-prefix="<?php echo $menu['prix'] ?>DT" name="<?php echo $menu['id_produit'] ?>">
                </div>
            </div>
                </br></br>
        <?php endforeach ?>
        </br></br>
        <div style="text-align: center;">

            <?php 
                    $id_user=$_GET['id_user'];
                    $full_name=$_GET['full_name'];
                    $img=$_GET['img'];
                    
            ?>
            <input type="hidden" style="text-align: center;" name="id_user" value="<?php echo $id_user ?>">
            <input type="hidden"style="text-align: center;"  name="full_name" value="<?php echo $full_name ?>">
            <input type="hidden" style="text-align: center;" name="img" value="<?php echo $img ?>">
            <button type="submit" style="text-align: center;" class="btn btn-primary" id="boutonenvoyer">Envoyer</button>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="bootstrap-input-spinner.js"></script>
    <script>
        $('input[type=number]').inputSpinner({
            groupClass: 'input-group-lg',
            buttonClass:'btn_success',
            buttonWidth: '5rem'
        });
    </script>
  </main>
</body>
</html>
