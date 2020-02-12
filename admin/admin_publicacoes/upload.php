<?php
    // Where the file is going to be placed
    $target_path = "./uploads/";

    /* Add the original filename to our target path.
    Result is "uploads/filename.extension" */
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
    echo "<head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script><head>";

    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
        if (isset($_POST['inputNomePDF']) && $_POST['inputNomePDF'] !== '') {
            if (rename($target_path, "./uploads/".$_POST['inputNomePDF'].".pdf")) {
                echo "<script>Swal.fire(
                        'Sucesso!',
                        'A publicação foi adicionada com sucesso!',
                        'success'
                        ).then(function() {
                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor.php';
                        });</script>";
                echo "<script>alert('AAAAAAAA TO COM DEPRESSAO');</script>";
            }else{
                echo "<script>Swal.fire({
                        icon: 'Erro',
                        title: 'Oops...',
                        text: 'Não foi possivel renomear a publicação, tente novamente mais tarde!',
                        }).then(function() {
                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor.php';
                        });</script>";
            }       
        }
    }else{
        echo "<script>Swal.fire({
                    icon: 'Erro',
                    title: 'Oops...',
                    text: 'Não foi possivel realizar o upload da publicação, tente novamente mais tarde!',
                    }).then(function() {
                        window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor.php';
                    });</script>";
    }
?>